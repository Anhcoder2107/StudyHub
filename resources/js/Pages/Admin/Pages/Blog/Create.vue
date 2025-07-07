<template>
    <layout-authen>
        <div v-if="can('Create blog')" class="container mx-auto px-4 py-6">
            <h2 class="text-2xl font-bold mb-4">Create New Blog</h2>
            <form @submit.prevent="submitForm" class="space-y-4" enctype="multipart/form-data" novalidate>
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
                    <input id="image" @input="form.image = $event.target.files[0]" type="file" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                </div>
                <button type="submit" class="px-4 py-2 bg-emerald-500 text-white rounded hover:bg-emerald-600">Submit</button>
            </form>
            <div v-if="success" class="mt-4 text-green-600">{{ success }}</div>
            <div v-if="error" class="mt-4 text-red-600">{{ error }}</div>
        </div>
    </layout-authen>
</template>

<script>
import { Link, router } from '@inertiajs/vue3';
import { ref, onMounted, computed, reactive } from 'vue';
import axios from 'axios';
import LayoutAuthen from "@/Layouts/admin/AuthenticatedLayout.vue";
import { can } from 'laravel-permission-to-vuejs';
import { usePage } from '@inertiajs/vue3';

export default {
    name: 'BlogCreate',
    components: {
        LayoutAuthen,
        Link
    },
    setup() {
        const page = usePage();
        const userId = computed(() => page.props.user_id || '');
        const form = reactive({
            user_id: userId.value,
            title: '',
            content: '',
            image: null
        });
        const success = ref(null);
        const error = ref(null);


        const submitForm = async () => {
            try {
                router.post('http://localhost:8000/api/blogs', form, {
                    forceFormData: true,
                });
                success.value = 'Blog created successfully.';
                error.value = null;
                localStorage.setItem('blog_created', '1');
                window.location.href = '/admin/blogs';
            } catch (err) {
                error.value = err.response?.data?.message || 'Failed to create blog. Please try again.';
                success.value = null;
                console.error('Error creating blog:', err);
            }
        };

        onMounted(() => {
        });

        return {
            form,
            submitForm,
            success,
            error,
            can,
            userId,
        };
    },
};
</script>
