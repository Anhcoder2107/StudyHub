<template>
    <layout-authen>
        <div class="container mx-auto px-4 py-6">
            <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded bg-white">
                <div class="rounded-t mb-0 px-4 py-3 border-0">
                    <div class="flex flex-wrap items-center">
                        <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                            <h3 class="font-semibold text-lg text-blueGray-700">
                                Create New Permission
                            </h3>
                        </div>
                    </div>
                </div>
                <div v-if="can('Create permission')" class="block w-full px-4 py-6">
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
                                placeholder="Enter permission name" />
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
                                class="px-6 py-3 bg-blue-500 text-white rounded shadow hover:bg-blue-600 mr-2"
                                @click="resetForm">
                                Reset
                            </button>
                            <button type="submit"
                                class="px-6 py-3 bg-emerald-500 text-white rounded shadow hover:bg-emerald-600">
                                Create Permission
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </layout-authen>
</template>

<script>
import { ref } from 'vue';
import { useRouter } from 'vue-router';
import axios from 'axios';
import LayoutAuthen from '@/Layouts/admin/AuthenticatedLayout.vue';
import { is, can } from 'laravel-permission-to-vuejs'
// import { useToast } from 'vue-toastification';
export default {
    name: 'PermissionCreate',
    components: {
        LayoutAuthen,
    },
    setup() {
        const router = useRouter();
        const form = ref({
            name: '',
            description: '',
        });
        const loading = ref(false);
        const error = ref(null);
        // const toast = useToast();

        const handleSubmit = async () => {
            loading.value = true;
            error.value = null;
            try {
                await axios.post('http://localhost:8000/api/permissions', form.value, {
                    headers: {
                        Authorization: 'Bearer ' + localStorage.getItem('token'),
                    },
                });
                localStorage.setItem('permission_created', '1');
                window.location.href = 'http://localhost:8000/admin/permissions';
            } catch (err) {
                error.value = err.response?.data?.message || 'Failed to create permission. Please try again.';
                console.error('Error creating permission:', err);
            } finally {
                loading.value = false;
            }
        };

        const resetForm = () => {
            form.value = {
                name: '',
                description: '',
            };
            error.value = null;
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
