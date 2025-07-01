<template>
    <layout-authen>
        <div v-if="can('Create category course')" class="container mx-auto px-4 py-6">
            <h2 class="text-2xl font-bold mb-4">Create New Category</h2>
            <form @submit.prevent="submitForm" class="space-y-4" novalidate>
                <div>
                    <label for="category_name" class="block text-sm font-medium text-gray-700">Category Name</label>
                    <input v-model="form.category_name" id="category_name" type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                </div>
                <div>
                    <label for="category_description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea v-model="form.category_description" id="category_description" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required></textarea>
                </div>
                <button type="submit" class="px-4 py-2 bg-emerald-500 text-white rounded hover:bg-emerald-600">Submit</button>
            </form>
            <div v-if="success" class="mt-4 text-green-600">{{ success }}</div>
            <div v-if="error" class="mt-4 text-red-600">{{ error }}</div>
        </div>
    </layout-authen>
</template>

<script>
import { Link } from '@inertiajs/vue3';
import { ref, onMounted } from 'vue';
import axios from 'axios';
import LayoutAuthen from "@/Layouts/admin/AuthenticatedLayout.vue";
import { is, can } from 'laravel-permission-to-vuejs';
import { usePage } from '@inertiajs/vue3';

export default {
    name: 'CategoryCourseCreate',
    components: {
        LayoutAuthen,
        Link
    },
    setup() {
        const page = usePage();
        const form = ref({
            category_name: '',
            category_description: ''
        });
        const success = ref(null);
        const error = ref(null);

        const submitForm = async () => {
            try {
                await axios.post('http://localhost:8000/api/category-courses', form.value);
                success.value = 'Category created successfully.';
                error.value = null;
                localStorage.setItem('category_created', '1');
                window.location.href = '/admin/category-courses';
            } catch (err) {
                error.value = err.response?.data?.message || 'Failed to create category. Please try again.';
                success.value = null;
                console.error('Error creating category:', err);
            }
        };

        onMounted(() => {
            // No category fetching needed for creation, unlike courses
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
