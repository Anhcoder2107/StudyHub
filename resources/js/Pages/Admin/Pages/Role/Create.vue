<template>
    <layout-authen>
        <div class="container mx-auto px-4 py-6">
            <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded bg-white">
                <div class="rounded-t mb-0 px-4 py-3 border-0">
                    <div class="flex flex-wrap items-center">
                        <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                            <h3 class="font-semibold text-lg text-blueGray-700">
                                Create New Role
                            </h3>
                        </div>
                    </div>
                </div>
                <div v-if="can('Create role')" class="block w-full px-4 py-6">
                    <form @submit.prevent="handleSubmit" novalidate>
                        <div v-if="error" class="mb-4 text-red-500 text-sm">
                            {{ error }}
                        </div>
                        <div class="mb-4">
                            <label class="block text-blueGray-600 text-sm font-bold mb-2" for="roleName">
                                Role Name
                            </label>
                            <input id="roleName" v-model="form.name" type="text"
                                class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full"
                                placeholder="Enter role name" required />
                        </div>
                        <div class="mb-4">
                            <label class="block text-blueGray-600 text-sm font-bold mb-2" for="description">
                                Description
                            </label>
                            <textarea id="description" v-model="form.description"
                                class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full"
                                placeholder="Enter role description" rows="4"></textarea>
                        </div>
                        <div class="mb-4">
                            <label class="block text-blueGray-600 text-sm font-bold mb-2">
                                Permissions
                            </label>
                            <!-- Checkbox chọn tất cả -->
                            <div class="mb-2">
                                <input type="checkbox" id="checkAll" :checked="isAllChecked" @change="toggleAll"
                                    class="mr-2" />
                                <label for="checkAll" class="font-semibold text-blueGray-700 text-sm">
                                    Chọn tất cả
                                </label>
                            </div>
                            <!-- Luôn luôn hiển thị tất cả permission -->
                            <div class="grid grid-cols-2 gap-2">
                                <div v-for="permission in permissions" :key="permission.id" class="flex items-center">
                                    <input type="checkbox" :id="'perm-' + permission.id" :value="permission.id"
                                        v-model="form.permissions" class="mr-2" />
                                    <label :for="'perm-' + permission.id" class="text-blueGray-700 text-sm">
                                        {{ permission.name }}
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-end">
                            <button type="button"
                                class="px-6 py-3 bg-blue-500 text-white rounded shadow hover:bg-blue-600 mr-2"
                                @click="resetForm">
                                Reset
                            </button>
                            <button type="submit"
                                class="px-6 py-3 bg-emerald-500 text-white rounded shadow hover:bg-emerald-600"
                                :disabled="loading">
                                Create Role
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </layout-authen>
</template>

<script>
import { ref, onMounted, computed } from 'vue';
import axios from 'axios';
import LayoutAuthen from '@/Layouts/admin/AuthenticatedLayout.vue';
import { is, can } from 'laravel-permission-to-vuejs';

export default {
    name: 'RoleCreate',
    components: { LayoutAuthen },
    setup() {
        const form = ref({ name: '', description: '' });
        const loading = ref(false);
        const error = ref(null);
        const permissions = ref([]);

        onMounted(async () => {
            try {
                const res = await axios.get('http://localhost:8000/api/permissions/all', {
                    headers: {
                        Authorization: 'Bearer ' + localStorage.getItem('token'),
                    },
                });
                permissions.value = res.data || [];
            } catch (err) {
                error.value = 'Failed to load permissions.';
            }
        });
        const isAllChecked = computed(() =>
            permissions.value.length > 0 &&
            form.value.permissions.length === permissions.value.length
        );


        const toggleAll = () => {
            if (isAllChecked.value) {
                form.value.permissions = [];
            } else {
                form.value.permissions = permissions.value.map(p => p.id);
            }
        };


        const handleSubmit = async () => {
            loading.value = true;
            error.value = null;
            try {
                await axios.post('http://localhost:8000/api/roles', form.value, {
                    headers: {
                        Authorization: 'Bearer ' + localStorage.getItem('token'),
                    },
                });
                localStorage.setItem('role_created', '1');
                window.location.href = '/admin/roles';
            } catch (err) {
                error.value = err.response?.data?.message || 'Failed to create role. Please try again.';
            } finally {
                loading.value = false;
            }
        };

        const resetForm = () => {
            form.value = { name: '', description: '', permissions: [] };
            error.value = null;
        };

        return {
            form,
            loading,
            error,
            permissions,
            handleSubmit,
            resetForm,
            isAllChecked,
            toggleAll,
            is,
            can,
        };
    },
};
</script>
