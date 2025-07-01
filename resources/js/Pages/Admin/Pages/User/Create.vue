<template>
    <layout-authen>
        <div v-if="can('Create User')" class="container mx-auto px-4 py-6">
            <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded bg-white">
                <div class="rounded-t mb-0 px-4 py-3 border-0">
                    <div class="flex flex-wrap items-center">
                        <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                            <h3 class="font-semibold text-lg text-blueGray-700">
                                Create New User
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="block w-full px-4 py-6">
                    <form @submit.prevent="handleSubmit">
                        <div v-if="error" class="mb-4 text-red-500 text-sm">
                            {{ error }}
                        </div>
                        <div class="mb-4">
                            <label class="block text-blueGray-600 text-sm font-bold mb-2" for="name">
                                Name
                            </label>
                            <input id="name" v-model="form.name" type="text"
                                class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full"
                                placeholder="Enter user name" required />
                        </div>
                        <div class="mb-4">
                            <label class="block text-blueGray-600 text-sm font-bold mb-2" for="email">
                                Email
                            </label>
                            <input id="email" v-model="form.email" type="email"
                                class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full"
                                placeholder="Enter user email" required />
                        </div>
                        <div class="mb-4">
                            <label class="block text-blueGray-600 text-sm font-bold mb-2" for="password">
                                Password
                            </label>
                            <input id="password" v-model="form.password" type="password"
                                class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full"
                                placeholder="Enter password" required />
                        </div>
                        <div class="mb-4">
                            <label class="block text-blueGray-600 text-sm font-bold mb-2" for="google_id">
                                Google ID
                            </label>
                            <input id="google_id" v-model="form.google_id" type="text"
                                class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full"
                                placeholder="Enter Google ID (optional)" />
                        </div>
                        <div class="mb-4">
                            <label class="block text-blueGray-600 text-sm font-bold mb-2" for="facebook_id">
                                Facebook ID
                            </label>
                            <input id="facebook_id" v-model="form.facebook_id" type="text"
                                class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full"
                                placeholder="Enter Facebook ID (optional)" />
                        </div>
                        <div class="mb-4">
                            <label class="block text-blueGray-600 text-sm font-bold mb-2">
                                Roles
                            </label>
                            <!-- Checkbox chọn tất cả -->
                            <div class="mb-2">
                                <input type="checkbox" id="checkAll" :checked="isAllChecked" @change="toggleAll"
                                    class="mr-2" />
                                <label for="checkAll" class="font-semibold text-blueGray-700 text-sm">
                                    Select All
                                </label>
                            </div>
                            <!-- Luôn luôn hiển thị tất cả roles -->
                            <div class="grid grid-cols-2 gap-2">
                                <div v-for="role in roles" :key="role.id" class="flex items-center">
                                    <input type="checkbox" :id="'role-' + role.id" :value="role.id"
                                        v-model="form.roles" class="mr-2" />
                                    <label :for="'role-' + role.id" class="text-gray-700 text-sm">
                                        {{ role.name }}
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
                                Create User
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
    name: 'UserCreate',
    components: { LayoutAuthen },
    setup() {
        const form = ref({
            name: '',
            email: '',
            password: '',
            google_id: '',
            facebook_id: '',
            roles: []
        });
        const loading = ref(false);
        const error = ref(null);
        const roles = ref([]);

        onMounted(async () => {
            try {
                const res = await axios.get('http://localhost:8000/api/roles/all', {
                    headers: {
                        Authorization: 'Bearer ' + localStorage.getItem('token'),
                    },
                });
                roles.value = res.data || [];
            } catch (err) {
                error.value = 'Failed to load roles.';
            }
        });

        const isAllChecked = computed(() =>
            roles.value.length > 0 &&
            form.value.roles.length === roles.value.length
        );

        const toggleAll = () => {
            if (isAllChecked.value) {
                form.value.roles = [];
            } else {
                form.value.roles = roles.value.map(r => r.id);
            }
        };

        const handleSubmit = async () => {
            loading.value = true;
            error.value = null;
            try {
                await axios.post('http://localhost:8000/api/users', form.value, {
                    headers: {
                        Authorization: 'Bearer ' + localStorage.getItem('token'),
                    },
                });
                localStorage.setItem('user_created', '1');
                window.location.href = '/admin/users';
            } catch (err) {
                error.value = err.response?.data?.message || 'Failed to create user. Please try again.';
            } finally {
                loading.value = false;
            }
        };

        const resetForm = () => {
            form.value = {
                name: '',
                email: '',
                password: '',
                google_id: '',
                facebook_id: '',
                roles: []
            };
            error.value = null;
        };

        return {
            form,
            loading,
            error,
            roles,
            handleSubmit,
            resetForm,
            isAllChecked,
            toggleAll,
        };
    },
};
</script>
