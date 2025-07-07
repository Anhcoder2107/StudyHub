<template>
    <layout-authen>
        <div v-if="can('Browse role')" class="container mx-auto px-4 py-6">
            <div class="flex justify-between items-center mb-4">
                <h3 class="font-semibold text-lg text-blueGray-700">Role Management</h3>
                <Link :href="route('admin.roles.create')"
                    class="px-6 py-3 bg-emerald-500 text-white rounded shadow hover:bg-emerald-600 transition duration-200">
                    Create Role
                </Link>
            </div>
            <div v-if="loading" class="text-center py-6">
                <span class="text-blueGray-600 text-lg">Loading roles...</span>
            </div>
            <div v-else-if="error" class="text-center py-6 text-sm text-red-600">
                {{ error }}
            </div>
            <card-table v-else :color="'light'" :title="'Role List'"
                :name-table="['ID', 'Role Name', 'Guard', 'Created At', 'Updated At']" :data-table="roleData"
                :show-actions="true" :actions="(row, index) => [
                    { label: 'Edit', action: () => handleEdit(row) },
                    { label: 'Delete', action: () => handleDelete(row) },
                    { label: 'View Permissions', action: () => showRolePermissions(row) },
                ]" />
            <!-- Pagination -->
            <div v-if="pagination && pagination.last_page > 1" class="flex justify-center mt-6 space-x-2">
                <button class="px-3 py-1 rounded bg-gray-200 hover:bg-gray-300"
                    :disabled="pagination.current_page === 1" @click="changePage(pagination.current_page - 1)">
                    Prev
                </button>
                <button v-for="page in pagination.last_page" :key="page" class="px-3 py-1 rounded"
                    :class="pagination.current_page === page ? 'bg-emerald-500 text-white' : 'bg-gray-200 hover:bg-gray-300'"
                    @click="changePage(page)">
                    {{ page }}
                </button>
                <button class="px-3 py-1 rounded bg-gray-200 hover:bg-gray-300"
                    :disabled="pagination.current_page === pagination.last_page"
                    @click="changePage(pagination.current_page + 1)">
                    Next
                </button>
            </div>
        </div>
        <!-- Modal hiển thị permissions -->
        <Modal :show="showModal" :maxWidth="'md'" @close="closeModal">
            <div class="p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-semibold text-blueGray-700">Permissions for {{ selectedRole.name }}</h3>
                    <button @click="closeModal" class="text-blueGray-500 hover:text-blueGray-700 text-xl font-bold">×</button>
                </div>
                <div v-if="modalLoading" class="text-center text-blueGray-500">Loading...</div>
                <div v-else-if="modalError" class="mb-4 text-red-500 text-sm">{{ modalError }}</div>
                <div v-else class="mb-4">
                    <ul class="list-disc pl-5">
                        <li v-for="permission in selectedRolePermissions" :key="permission.id"
                            class="text-blueGray-700 text-sm">
                            {{ permission.name }}
                        </li>
                    </ul>
                    <p v-if="selectedRolePermissions.length === 0" class="text-blueGray-500 text-sm">No permissions assigned.</p>
                </div>
                <div class="flex justify-end">
                    <button @click="closeModal"
                        class="px-4 py-2 bg-blueGray-500 text-white rounded hover:bg-blueGray-600">Close</button>
                </div>
            </div>
        </Modal>
    </layout-authen>
</template>

<script>
import { Link } from '@inertiajs/vue3';
import { ref, computed, onMounted } from 'vue';
import axios from 'axios';
import LayoutAuthen from "@/Layouts/admin/AuthenticatedLayout.vue";
import CardTable from "@/Components/admin/components/Cards/CardTable.vue";
import Modal from '@/Components/Modal.vue';
import { is, can } from 'laravel-permission-to-vuejs';

export default {
    name: 'RoleIndex',
    components: {
        LayoutAuthen,
        CardTable,
        Link,
        Modal
    },
    setup() {
        const roles = ref([]);
        const loading = ref(true);
        const error = ref(null);
        const pagination = ref(null);
        const showModal = ref(false);
        const selectedRole = ref({ name: '' });
        const selectedRolePermissions = ref([]);
        const modalLoading = ref(false);
        const modalError = ref(null);

        const fetchRoles = async (page = 1) => {
            loading.value = true;
            error.value = null;
            try {
                const response = await axios.get(`http://localhost:8000/api/roles?page=${page}`, {
                    headers: { Authorization: `Bearer ${localStorage.getItem('token')}` },
                });
                roles.value = response.data.data;
                pagination.value = {
                    current_page: response.data.current_page,
                    last_page: response.data.last_page,
                    per_page: response.data.per_page,
                    total: response.data.total,
                };
            } catch (err) {
                error.value = 'Failed to load roles. Please try again later.';
                console.error('Error fetching roles:', err);
            } finally {
                loading.value = false;
            }
        };

        const fetchRolePermissions = async (roleId) => {
            modalLoading.value = true;
            modalError.value = null;
            try {
                const response = await axios.get(`http://localhost:8000/api/roles/${roleId}/permissions`, {
                    headers: { Authorization: `Bearer ${localStorage.getItem('token')}` },
                });
                selectedRolePermissions.value = response.data || [];
                showModal.value = true;
            } catch (err) {
                modalError.value = 'Failed to fetch permissions. Please try again later.';
                console.error('Failed to fetch permissions:', err);
            } finally {
                modalLoading.value = false;
            }
        };

        const roleData = computed(() => {
            return roles.value.map(role => ({
                id: role.id,
                name_role: role.name || 'N/A',
                guard_name: role.guard_name || 'N/A',
                created_at: role.created_at ,
                updated_at: role.updated_at
            }));
        });

        const changePage = (page) => {
            if (page >= 1 && page <= pagination.value.last_page) {
                fetchRoles(page);
            }
        };

        const showRolePermissions = (row) => {
            selectedRole.value = { ...row }; // Copy the role object to avoid mutating the original
            fetchRolePermissions(row.id);
        };

        const handleEdit = (row) => {
            window.location.href = `/admin/roles/${row.id}/edit`;
        };

        const handleDelete = async (row) => {
            if (confirm('Are you sure you want to delete this role?')) {
            try {
                await axios.delete(`/api/roles/${row.id}`, {
                headers: { Authorization: `Bearer ${localStorage.getItem('token')}` },
                });
                fetchRoles();
            } catch (err) {
                console.error('Error deleting role:', err);
                error.value = 'Failed to delete role. Please try again later.';
            }
            }
        };

        const closeModal = () => {
            showModal.value = false;
            selectedRole.value = { name: '' };
            selectedRolePermissions.value = [];
            modalError.value = null;
        };

        onMounted(() => fetchRoles());

        return {
            roleData,
            loading,
            error,
            pagination,
            changePage,
            showModal,
            selectedRole,
            selectedRolePermissions,
            modalLoading,
            modalError,
            closeModal,
            showRolePermissions,
            handleEdit,
            handleDelete,
            can
        };
    },
};
</script>
