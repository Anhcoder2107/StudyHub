<template>
    <layout-authen>
        <div v-if="can('Edit course')" class="container mx-auto px-4 py-6">
            <h2 class="text-2xl font-bold mb-4">Edit Course</h2>
            <form @submit.prevent="submitForm" class="space-y-4" novalidate>
                <div>
                    <label for="course_name" class="block text-sm font-medium text-gray-700">Course Name</label>
                    <input v-model="form.course_name" id="course_name" type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                </div>
                <div>
                    <label for="course_description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea v-model="form.course_description" id="course_description" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required></textarea>
                </div>
                <div>
                    <label for="category_id" class="block text-sm font-medium text-gray-700">Category</label>
                    <select v-model="form.category_id" id="category_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                        <option v-for="category in categories" :key="category.id" :value="category.id">{{ category.category_name }}</option>
                    </select>
                </div>
                <div>
                    <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                    <input v-model="form.status" id="status" type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
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
    name: 'CourseEdit',
    components: {
        LayoutAuthen,
        Link
    },
    setup() {
        const page = usePage();
        const id = page.props.courseId;
        const user_id = ref(page.props.user_id || '');
        const form = ref({
            user_id: user_id.value,
            course_name: '',
            course_description: '',
            category_id: '',
            status: ''
        });
        const categories = ref([]);
        const success = ref(null);
        const error = ref(null);

        const fetchCourse = async () => {
            try {
                const response = await axios.get(`http://localhost:8000/api/courses/${id}`);
                form.value = response.data;
            } catch (err) {
                error.value = err.response?.data?.message || 'Failed to load course. Please try again.';
                console.error('Error fetching course:', err);
            }
        };

        const fetchCategories = async () => {
            try {
                const response = await axios.get('http://localhost:8000/api/category-courses/all');
                categories.value = response.data;
            } catch (err) {
                error.value = 'Failed to load categories. Please try again.';
                console.error('Error fetching categories:', err);
            }
        };

        const submitForm = async () => {
            try {
                await axios.put(`http://localhost:8000/api/courses/${id}`, form.value);
                success.value = 'Course updated successfully.';
                error.value = null;
                localStorage.setItem('course_updated', '1');
                window.location.href = '/admin/courses';
            } catch (err) {
                error.value = err.response?.data?.message || 'Failed to update course. Please try again.';
                success.value = null;
                console.error('Error updating course:', err);
            }
        };

        onMounted(() => {
            fetchCourse();
            fetchCategories();
        });

        return {
            form,
            submitForm,
            success,
            error,
            can,
            categories
        };
    },
};
</script>
