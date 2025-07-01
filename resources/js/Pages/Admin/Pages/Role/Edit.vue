<template>
    <layout-authen>
        <div class="container mx-auto px-4 py-6">
            <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded bg-white">
                <div class="rounded-t mb-0 px-4 py-3 border-0">
                    <h3 class="font-semibold text-lg text-blueGray-700">
                        Edit Role
                    </h3>
                </div>
                <div v-if="can('Edit role')" class="block w-full px-4 py-6">
                    <form @submit.prevent="handleSubmit">
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
                            <label class="block text-blueGray-600 text-sm font-bold mb-2">
                                Permissions
                            </label>
                            <div class="mb-2">
                                <input type="checkbox" id="checkAll" :checked="isAllChecked" @change="toggleAll"
                                    class="mr-2" />
                                <label for="checkAll" class="font-semibold text-blueGray-700 text-sm">
                                    Chọn tất cả
                                </label>
                            </div>
                            <div class="grid grid-cols-2 gap-2">
                                <div v-for="permission in permissions" :key="permission.id" class="flex items-center">
                                    <input  type="checkbox" :id="'perm-' + permission.id" :value="permission.name"
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
                                Update Role
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </layout-authen>
</template>

<script setup>
import { ref, computed } from 'vue';
import { usePage } from '@inertiajs/vue3';
import axios from 'axios';
import LayoutAuthen from '@/Layouts/admin/AuthenticatedLayout.vue';
import { is, can } from 'laravel-permission-to-vuejs';

const page = usePage();
const permissions = ref(page.props.permissions || []);
const role = page.props.role || {};
const rolePermissions = page.props.rolePermissions || [];
console.log(rolePermissions);
console.log(permissions);

const form = ref({
    name: role.name || '',
    description: role.description || '',
    permissions: [...rolePermissions],
});
const loading = ref(false);
const error = ref(null);


// Check if all permissions are selected
const isAllChecked = computed(() =>
    permissions.value.length > 0 &&
    form.value.permissions.length === permissions.value.length
);

// Check if all permissions are selected
const toggleAll = () => {
    if (isAllChecked.value) {
        form.value.permissions = [];
    } else {
        form.value.permissions = permissions.value.map(p => p.name);
    }
};

const handleSubmit = async () => {
    loading.value = true;
    error.value = null;
    try {
        await axios.put(`http://localhost:8000/api/roles/${role.id}`, form.value, {
            headers: {
                Authorization: 'Bearer ' + localStorage.getItem('token'),
            },
        });
        localStorage.setItem('role_created', '1');
        window.location.href = '/admin/roles';
    } catch (err) {
        error.value = err.response?.data?.message || 'Failed to update role. Please try again.';
    } finally {
        loading.value = false;
    }
};

const resetForm = () => {
    form.value = {
        name: role.name || '',
        description: role.description || '',
        permissions: [...rolePermissions],
    };
    error.value = null;
};


</script>
