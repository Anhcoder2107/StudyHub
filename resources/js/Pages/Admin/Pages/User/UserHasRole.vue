<template>
    <layout-authen>
        <div v-if="showToast" id="toast-success"
            class="fixed top-6 right-6 flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow-sm dark:text-gray-400 dark:bg-gray-800 z-50"
            role="alert">
            <div
                class="inline-flex items-center justify-center shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                    viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                </svg>
                <span class="sr-only">Check icon</span>
            </div>
            <div class="ms-3 text-sm font-normal">User roles updated successfully.</div>
            <button type="button"
                class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700"
                @click="showToast = false" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
            </button>
        </div>
        <div v-if="can('Browse user') && can('Edit user') && can('Browse role')" class="container mx-auto px-4 py-6">
            <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded bg-white">
                <div class="rounded-t mb-0 px-4 py-3 border-0">
                    <div class="flex flex-wrap items-center">
                        <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                            <h3 class="font-semibold text-lg text-blueGray-700">
                                User Role Management
                            </h3>
                        </div>
                        <div class="relative px-4">
                            <Link :href="route('admin.users.index')"
                                class="px-6 py-3 bg-blue-500 text-white rounded shadow hover:bg-blue-600">
                                Back to Users
                            </Link>
                        </div>
                    </div>
                </div>
                <div v-if="loading" class="text-center py-6">
                    <span class="text-blueGray-600 text-lg">Loading user details...</span>
                </div>
                <div v-else-if="error" class="text-center py-6 text-sm text-red-600">
                    {{ error }}
                </div>
                <div v-else class="block w-full px-4 py-6">
                    <div class="mb-4">
                        <label class="block text-blueGray-600 text-sm font-bold mb-2">Name</label>
                        <p class="text-blueGray-700 text-sm">{{ user.name }}</p>
                    </div>
                    <div class="mb-4">
                        <label class="block text-blueGray-600 text-sm font-bold mb-2">Email</label>
                        <p class="text-blueGray-700 text-sm">{{ user.email }}</p>
                    </div>
                    <div class="mb-4">
                        <label class="block text-blueGray-600 text-sm font-bold mb-2">Google ID</label>
                        <p class="text-blueGray-700 text-sm">{{ user.google_id || 'N/A' }}</p>
                    </div>
                    <div class="mb-4">
                        <label class="block text-blueGray-600 text-sm font-bold mb-2">Facebook ID</label>
                        <p class="text-blueGray-700 text-sm">{{ user.facebook_id || 'N/A' }}</p>
                    </div>
                    <div class="mb-4">
                        <label class="block text-blueGray-600 text-sm font-bold mb-2">Roles</label>
                        <p class="text-blueGray-700 text-sm">{{ user.roles && user.roles.length ? user.roles.map(r => r.name).join(', ') : 'No roles assigned' }}</p>
                    </div>
                    <div class="flex justify-end">
                        <button @click="openRoleModal"
                            class="px-6 py-3 bg-emerald-500 text-white rounded shadow hover:bg-emerald-600">
                            Edit Roles
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal for editing roles -->
        <div v-if="showModal && can('Edit user') && can('Browse role')" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
            <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-semibold text-blueGray-700">Edit Roles for {{ user.name }}</h3>
                    <button @click="closeRoleModal"
                        class="text-gray-400 hover:text-gray-900 p-1.5 rounded-lg hover:bg-gray-100">
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </div>
                <div v-if="modalError" class="mb-4 text-red-500 text-sm">
                    {{ modalError }}
                </div>
                <div class="mb-4">
                    <label class="block text-blueGray-600 text-sm font-bold mb-2">Roles</label>
                    <div class="grid grid-cols-1 gap-2">
                        <div v-for="role in roles" :key="role.id" class="flex items-center">
                            <input type="checkbox" :id="'role-' + role.id" :value="role.id" v-model="selectedUserRoles"
                                class="mr-2" />
                            <label :for="'role-' + role.id" class="text-blueGray-700 text-sm">
                                {{ role.name }}
                            </label>
                        </div>
                    </div>
                </div>
                <div class="flex justify-end">
                    <button @click="closeRoleModal"
                        class="px-6 py-3 bg-blue-500 text-white rounded shadow hover:bg-blue-600 mr-2">
                        Cancel
                    </button>
                    <button @click="saveRoles"
                        class="px-6 py-3 bg-emerald-500 text-white rounded shadow hover:bg-emerald-600"
                        :disabled="modalLoading">
                        Save Roles
                    </button>
                </div>
            </div>
        </div>
    </layout-authen>
</template>

<script>
import { ref, onMounted } from 'vue';
import { Link, usePage } from '@inertiajs/vue3';
import axios from 'axios';
import LayoutAuthen from '@/Layouts/admin/AuthenticatedLayout.vue';
import { is, can } from 'laravel-permission-to-vuejs';

export default {
    name: 'UserRoleEdit',
    components: {
        LayoutAuthen,
        Link,
    },
    setup() {
        const page = usePage();
        const userId = page.props.id || null; // Get user ID from props or route
        const user = page.props.user || null;
        const roles = ref([]);
        const loading = ref(true);
        const error = ref(null);
        const showToast = ref(false);
        const showModal = ref(false);
        const selectedUserRoles = ref([]);
        const modalLoading = ref(false);
        const modalError = ref(null);

        const fetchUser = async () => {
            loading.value = true;
            error.value = null;
            try {
                const response = await axios.get(`http://localhost:8000/api/users/${userId}`, {
                    headers: { Authorization: `Bearer ${localStorage.getItem('token')}` },
                });
                user.value = response.data;
                selectedUserRoles.value = response.data.roles ? response.data.roles.map(r => r.id) : [];
            } catch (err) {
                error.value = 'Failed to load user details. Please try again later.';
                console.error('Error fetching user:', err);
            } finally {
                loading.value = false;
            }
        };

        const fetchRoles = async () => {
            try {
                const response = await axios.get('http://localhost:8000/api/roles/all', {
                    headers: { Authorization: `Bearer ${localStorage.getItem('token')}` },
                });
                roles.value = response.data || [];
            } catch (err) {
                error.value = 'Failed to load roles.';
                console.error('Error fetching roles:', err);
            }
        };

        const openRoleModal = () => {
            selectedUserRoles.value = user.value.roles ? user.value.roles.map(r => r.id) : [];
            showModal.value = true;
        };

        const closeRoleModal = () => {
            showModal.value = false;
            modalError.value = null;
        };

        const saveRoles = async () => {
            modalLoading.value = true;
            modalError.value = null;
            try {
                await axios.put(`http://localhost:8000/api/users/${userId}`, {
                    roles: selectedUserRoles.value,
                }, {
                    headers: { Authorization: `Bearer ${localStorage.getItem('token')}` },
                });
                showToast.value = true;
                setTimeout(() => { showToast.value = false; }, 3000);
                closeRoleModal();
                fetchUser();
            } catch (err) {
                modalError.value = err.response?.data?.message || 'Failed to update roles.';
            } finally {
                modalLoading.value = false;
            }
        };

        onMounted(() => {
            fetchUser();
            fetchRoles();
            if (localStorage.getItem('user_roles_updated') === '1') {
                showToast.value = true;
                setTimeout(() => { showToast.value = false; }, 3000);
                localStorage.removeItem('user_roles_updated');
            }
        });

        return {
            user,
            roles,
            loading,
            error,
            showToast,
            showModal,
            selectedUserRoles,
            modalLoading,
            modalError,
            openRoleModal,
            closeRoleModal,
            saveRoles,
        };
    },
};
</script>
