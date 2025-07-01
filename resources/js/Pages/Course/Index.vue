<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>
<template>
    <AuthenticatedLayout>
        <div>
            <h1 class="text-2xl font-bold text-black">Courses</h1>
            <div class="mt-4">
                <Link href="/course/create" class="bg-blue-500 text-black px-4 py-2 rounded">Create Course</Link>
            </div>
            <div class="mt-4">
                <table class="min-w-full border-collapse border border-gray-200">
                    <thead>
                        <tr>
                            <th class="border border-gray-200 px-4 py-2">ID</th>
                            <th class="border border-gray-200 px-4 py-2">Name</th>
                            <th class="border border-gray-200 px-4 py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Loop through courses and display them here -->
                        <tr v-for="course in courses" :key="course.id">
                            <td class="border border-gray-200 px-4 py-2">{{ course.id }}</td>
                            <td class="border border-gray-200 px-4 py-2">{{ course.course_name }}</td>
                            <td class="border border-gray-200 px-4 py-2">
                                <Link :href="`/course/${course.id}/edit`" class="text-blue-500">Edit</Link>
                                <Link :href="`/course/${course.id}`" class="text-red-500 ml-2">Delete</Link>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </AuthenticatedLayout>
</template>

<script>
    export default {
        props: {
            courses: {
                type: Array,
                required: true,
            },
        },

    }
</script>

<style scoped>

</style>
