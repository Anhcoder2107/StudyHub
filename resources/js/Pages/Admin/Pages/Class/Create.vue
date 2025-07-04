<template>
    <layout-authen>
        <div v-if="can('Create class')" class="container mx-auto px-4 py-6">
            <h2 class="text-2xl font-bold mb-4">Create New Class</h2>
            <form @submit.prevent="submitForm" class="space-y-4" novalidate>
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Class Name</label>
                    <input v-model="form.name" id="name" type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                </div>
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea v-model="form.description" id="description" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required></textarea>
                </div>
                <div>
                    <label for="start_time" class="block text-sm font-medium text-gray-700">Start Time</label>
                    <input v-model="form.start_time" id="start_time" type="datetime-local" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                </div>
                <div>
                    <label for="end_time" class="block text-sm font-medium text-gray-700">End Time</label>
                    <input v-model="form.end_time" id="end_time" type="datetime-local" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
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
import { ref, onMounted, computed } from 'vue';
import axios from 'axios';
import LayoutAuthen from "@/Layouts/admin/AuthenticatedLayout.vue";
import { can } from 'laravel-permission-to-vuejs';
import { usePage } from '@inertiajs/vue3';

export default {
    name: 'ClassCreate',
    components: {
        LayoutAuthen,
        Link
    },
    setup() {
        const page = usePage();
        const userId = computed(() => page.props.user_id || '');
        const form = ref({
            user_id: userId.value,
            name: '',
            description: '',
            start_time: '',
            end_time: ''
        });
        const success = ref(null);
        const error = ref(null);

        const submitForm = async () => {
            try {
                await axios.post('http://localhost:8000/api/classes', {
                    ...form.value,
                    created_at: new Date().toISOString(),
                    updated_at: new Date().toISOString()
                });
                success.value = 'Class created successfully.';
                error.value = null;
                localStorage.setItem('class_created', '1');
                window.location.href = '/admin/classes';
            } catch (err) {
                error.value = err.response?.data?.message || 'Failed to create class. Please try again.';
                success.value = null;
                console.error('Error creating class:', err);
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
            userId
        };
    },
};
</script>
