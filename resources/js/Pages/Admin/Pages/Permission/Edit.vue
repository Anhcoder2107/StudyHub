<template>
    <layout-authen>
        <div class="container mx-auto px-4 py-6">
            <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded bg-white">
                <div class="rounded-t mb-0 px-4 py-3 border-0">
                    <div class="flex flex-wrap items-center">
                        <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                            <h3 class="font-semibold text-lg text-blueGray-700">
                                Edit Permission
                            </h3>
                        </div>
                    </div>
                </div>
                <div v-if="can('Edit permission')" class="block w-full px-4 py-6">
                    <form @submit.prevent="handleSubmit">
                        <div v-if="error" class="mb-4 text-red-500 text-sm">
                            {{ error }}
                        </div>
                        <div class="mb-4">
                            <label class="block text-blueGray-600 text-sm font-bold mb-2" for="permissionName">
                                Permission Name
                            </label>
                            <input id="permissionName" v-model="form.name" type="text"
                                class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full"
                                placeholder="Enter permission name" required />
                        </div>
                        <div class="mb-4">
                            <label class="block text-blueGray-600 text-sm font-bold mb-2" for="description">
                                Description
                            </label>
                            <textarea id="description" v-model="form.description"
                                class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full"
                                placeholder="Enter permission description" rows="4"></textarea>
                        </div>
                        <div class="flex justify-end">
                            <button type="button"
                                class="px-6 py-3 bg-blue-500 text-white rounded shadow hover:bg-blueGray-600 mr-2"
                                @click="resetForm">
                                Reset
                            </button>
                            <button type="submit"
                                class="px-6 py-3 bg-emerald-500 text-white rounded shadow hover:bg-emerald-600"
                                :disabled="loading">
                                Update Permission
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </layout-authen>
</template>

<script>
import { ref, onMounted } from 'vue';
import axios from 'axios';
import { usePage } from '@inertiajs/vue3';
import LayoutAuthen from '@/Layouts/admin/AuthenticatedLayout.vue';
import { is, can } from 'laravel-permission-to-vuejs'

export default {
    name: 'PermissionEdit',
    components: { LayoutAuthen },
    setup() {
        const page = usePage();
        const id = page.props.id;
        const form = ref({ name: '', description: '' });
        const loading = ref(false);
        const error = ref(null);

        // Lấy permission theo id khi mount
        onMounted(async () => {
            loading.value = true;
            try {
                const res = await axios.get(`http://localhost:8000/api/permissions/${id}`);
                form.value = {
                    name: res.data.name,
                    description: res.data.description || '',
                };
            } catch (err) {
                error.value = 'Failed to load permission.';
            } finally {
                loading.value = false;
            }
        });

        const handleSubmit = async () => {
            loading.value = true;
            error.value = null;
            try {
                await axios.put(`http://localhost:8000/api/permissions/${id}`, form.value, {
                    headers: {
                        Authorization: 'Bearer ' + localStorage.getItem('token'),
                    },
                });
                localStorage.setItem('permission_created', '1');
                window.location.href = '/admin/permissions';
            } catch (err) {
                error.value = err.response?.data?.message || 'Failed to update permission.';
            } finally {
                loading.value = false;
            }
        };

        const resetForm = () => {
            // Reload lại dữ liệu gốc
            error.value = null;
            loading.value = true;
            axios.get(`http://localhost:8000/api/permissions/${id}`)
                .then(res => {
                    form.value = {
                        name: res.data.name,
                        description: res.data.description || '',
                    };
                })
                .catch(() => {
                    error.value = 'Failed to reload permission.';
                })
                .finally(() => {
                    loading.value = false;
                });
        };

        return {
            form,
            loading,
            error,
            handleSubmit,
            resetForm,
        };
    },
};
</script>
