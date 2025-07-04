<template>
    <layout-authen>
        <div v-if="can('Edit blog')" class="container mx-auto px-4 py-6">
            <h2 class="text-2xl font-bold mb-4">Edit Blog</h2>
            <form @submit.prevent="submitForm" class="space-y-4" novalidate>
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                    <input v-model="form.title" id="title" type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                </div>
                <div>
                    <label for="content" class="block text-sm font-medium text-gray-700">Content</label>
                    <textarea v-model="form.content" id="content" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required></textarea>
                </div>
                <div>
                    <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
                    <input v-model="form.image" id="image" type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
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
import { can } from 'laravel-permission-to-vuejs';

export default {
    name: 'BlogEdit',
    components: {
        LayoutAuthen,
        Link
    },
    setup() {
        const page = usePage();
        const id = page.props.blog_id || '';
        const user_id = ref(page.props.user_id || '');
        const form = ref({
            user_id: user_id.value,
            title: '',
            content: '',
            image: '',
        });
        const success = ref(null);
        const error = ref(null);

        const fetchBlog = async () => {
            try {
                const response = await axios.get(`http://localhost:8000/api/blogs/${id}`);
                form.value = response.data;
            } catch (err) {
                error.value = err.response?.data?.message || 'Failed to load blog. Please try again.';
                console.error('Error fetching blog:', err);
            }
        };

        const submitForm = async () => {
            try {
                await axios.put(`http://localhost:8000/api/blogs/${id}`, form.value);
                success.value = 'Blog updated successfully.';
                error.value = null;
                localStorage.setItem('blog_updated', '1');
                window.location.href = '/admin/blogs';
            } catch (err) {
                error.value = err.response?.data?.message || 'Failed to update blog. Please try again.';
                success.value = null;
                console.error('Error updating blog:', err);
            }
        };

        onMounted(() => {
            fetchBlog();
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
