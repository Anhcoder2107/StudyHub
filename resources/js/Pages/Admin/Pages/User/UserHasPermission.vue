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
            <div class="ms-3 text-sm font-normal">User permissions updated successfully.</div>
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
        <div v-if="can('Browse user') && can('Edit user') && can('Browse permission')" class="container mx-auto px-4 py-6">
            <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded bg-white">
                <div class="rounded-t mb-0 px-4 py-3 border-0">
                    <div class="flex flex-wrap items-center">
                        <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                            <h3 class="font-semibold text-lg text-blueGray-700">
                                User Permission Management
                            </h3>
                        </div>
                        <div class="relative px-4">
                            <Link :href="route('users.index')"
                                class="px-6 py-3 bg-blueGray-500 text-white rounded shadow hover:bg-blueGray-600">
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
                        <label class="block text-blueGray-600 text-sm font-bold mb-2">Permissions</label>
                        <p class="text-blueGray-700 text-sm">{{ user.permissions && user.permissions.length ? user.permissions.map(p => p.name).join(', ') : 'No permissions assigned' }}</p>
                    </div>
                    <div class="flex justify-end">
                        <button @click="openPermissionModal"
                            class="px-6 py-3 bg-emerald-500 text-white rounded shadow hover:bg-emerald-600">
                            Edit Permissions
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal for editing permissions -->
        <div v-if="showModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
            <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-semibold text-blueGray-700">Edit Permissions for {{ user.name }}</h3>
                    <button @click="closePermissionModal"
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
                    <label class="block text-blueGray-600 text-sm font-bold mb-2">Permissions</label>
                    <div class="grid grid-cols-1 gap-2">
                        <div v-for="permission in permissions" :key="permission.id" class="flex items-center">
                            <input type="checkbox" :id="'perm-' + permission.id" :value="permission.id" v-model="selectedUserPermissions"
                                class="mr-2" />
                            <label :for="'perm-' + permission.id" class="text-blueGray-700 text-sm">
                                {{ permission.name }}
                            </label>
                        </div>
                    </div>
                </div>
                <div class="flex justify-end">
                    <button @click="closePermissionModal"
                        class="px-6 py-3 bg-blueGray-500 text-white rounded shadow hover:bg-blueGray-600 mr-2">
                        Cancel
                    </button>
                    <button @click="savePermissions"
                        class="px-6 py-3 bg-emerald-500 text-white rounded shadow hover:bg-emerald-600"
                        :disabled="modalLoading">
                        Save Permissions
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
    name: 'UserPermissionEdit',
    components: {
        LayoutAuthen,
        Link,
    },
    setup() {
        const page = usePage();
        const userId = page.props.id || null; // Get user ID from props or route
        const user = ref({});
        const permissions = ref([]);
        const loading = ref(true);
        const error = ref(null);
        const showToast = ref(false);
        const showModal = ref(false);
        const selectedUserPermissions = ref([]);
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
                selectedUserPermissions.value = response.data.permissions ? response.data.permissions.map(p => p.id) : [];
            } catch (err) {
                error.value = 'Failed to load user details. Please try again later.';
                console.error('Error fetching user:', err);
            } finally {
                loading.value = false;
            }
        };

        const fetchPermissions = async () => {
            try {
                const response = await axios.get('http://localhost:8000/api/permissions/all', {
                    headers: { Authorization: `Bearer ${localStorage.getItem('token')}` },
                });
                permissions.value = response.data || [];
            } catch (err) {
                error.value = 'Failed to load permissions.';
                console.error('Error fetching permissions:', err);
            }
        };

        const openPermissionModal = () => {
            selectedUserPermissions.value = user.value.permissions ? user.value.permissions.map(p => p.id) : [];
            showModal.value = true;
        };

        const closePermissionModal = () => {
            showModal.value = false;
            modalError.value = null;
        };

        const savePermissions = async () => {
            modalLoading.value = true;
            modalError.value = null;
            try {
                await axios.put(`http://localhost:8000/api/users/${userId}/permissions`, {
                    permissions: selectedUserPermissions.value,
                }, {
                    headers: { Authorization: `Bearer ${localStorage.getItem('token')}` },
                });
                showToast.value = true;
                setTimeout(() => { showToast.value = false; }, 3000);
                closePermissionModal();
                fetchUser();
            } catch (err) {
                modalError.value = err.response?.data?.message || 'Failed to update permissions.';
            } finally {
                modalLoading.value = false;
            }
        };

        onMounted(() => {
            fetchUser();
            fetchPermissions();
            if (localStorage.getItem('user_permissions_updated') === '1') {
                showToast.value = true;
                setTimeout(() => { showToast.value = false; }, 3000);
                localStorage.removeItem('user_permissions_updated');
            }
        });

        return {
            user,
            permissions,
            loading,
            error,
            showToast,
            showModal,
            selectedUserPermissions,
            modalLoading,
            modalError,
            openPermissionModal,
            closePermissionModal,
            savePermissions,
        };
    },
};
</script>
