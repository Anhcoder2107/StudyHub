<template>
    <layout-authen>
        <div v-if="can('Edit class')" class="container mx-auto px-4 py-6">
            <h2 class="text-2xl font-bold mb-4">Edit Class</h2>
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
    name: 'ClassEdit',
    components: {
        LayoutAuthen,
        Link
    },
    setup() {
        const page = usePage();
        const id = page.props.class_id || '';
        const user_id = ref(page.props.user_id || '');
        const form = ref({
            user_id: user_id.value,
            name: '',
            description: '',
            start_time: '',
            end_time: '',
        });
        const success = ref(null);
        const error = ref(null);

        const fetchClass = async () => {
            try {
                const response = await axios.get(`http://localhost:8000/api/classes/${id}`);
                form.value = response.data;
            } catch (err) {
                error.value = err.response?.data?.message || 'Failed to load class. Please try again.';
                console.error('Error fetching class:', err);
            }
        };

        const submitForm = async () => {
            try {
                await axios.put(`http://localhost:8000/api/classes/${id}`, form.value);
                success.value = 'Class updated successfully.';
                error.value = null;
                localStorage.setItem('class_updated', '1');
                window.location.href = '/admin/classes';
            } catch (err) {
                error.value = err.response?.data?.message || 'Failed to update class. Please try again.';
                success.value = null;
                console.error('Error updating class:', err);
            }
        };

        onMounted(() => {
            fetchClass();
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
