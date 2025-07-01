<template>
    <layout-authen>
        <div v-if="can('Edit category course')" class="container mx-auto px-4 py-6">
            <h2 class="text-2xl font-bold mb-4">Edit Category</h2>
            <form @submit.prevent="submitForm" class="space-y-4" novalidate>
                <div>
                    <label for="category_name" class="block text-sm font-medium text-gray-700">Category Name</label>
                    <input v-model="form.category_name" id="category_name" type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                </div>
                <div>
                    <label for="category_description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea v-model="form.category_description" id="category_description" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required></textarea>
                </div>
                <button type="submit" class="px-4 py-2 bg-emerald-500 text-white rounded hover:bg-emerald-600">Update</button>
            </form>
            <div v-if="success" class="mt-4 text-green-600">{{ success }}</div>
            <div v-if="error" class="mt-4 text-red-600">{{ error }}</div>
        </div>
    </layout-authen>
</template>

<script>
import { Link, usePage } from '@inertiajs/vue3';
import { ref, onMounted } from 'vue';
import axios from 'axios';
import LayoutAuthen from "@/Layouts/admin/AuthenticatedLayout.vue";
import { is, can } from 'laravel-permission-to-vuejs';

export default {
    name: 'CategoryCourseEdit',
    components: {
        LayoutAuthen,
        Link
    },
    setup() {
        const page = usePage();
        const id = page.props.categoryId;
        const user_id = ref(page.props.user_id || '');
        const form = ref({
            user_id: user_id.value,
            category_name: '',
            category_description: ''
        });
        const success = ref(null);
        const error = ref(null);

        const fetchCategory = async () => {
            try {
                const response = await axios.get(`http://localhost:8000/api/category-courses/${id}`);
                form.value = response.data;
            } catch (err) {
                error.value = err.response?.data?.message || 'Failed to load category. Please try again.';
                console.error('Error fetching category:', err);
            }
        };

        const submitForm = async () => {
            try {
                await axios.put(`http://localhost:8000/api/category-courses/${id}`, form.value);
                success.value = 'Category updated successfully.';
                error.value = null;
                localStorage.setItem('category_updated', '1');
                window.location.href = '/admin/category-courses';
            } catch (err) {
                error.value = err.response?.data?.message || 'Failed to update category. Please try again.';
                success.value = null;
                console.error('Error updating category:', err);
            }
        };

        onMounted(() => {
            fetchCategory();
        });

        return {
            form,
            submitForm,
            success,
            error,
            can
        };
    },
};
</script>
