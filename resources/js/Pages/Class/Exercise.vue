<template>
    <ClassLayout>
        <div class="bg-white rounded-xl shadow p-6">
            <h2 class="text-xl font-semibold mb-4 text-[#725DFF]">Danh sách bài tập</h2>
            <div v-if="exercises.length">
                <div v-for="exercise in exercises" :key="exercise.id" class="border-b py-4">
                    <h3 class="text-lg font-bold text-gray-800">{{ exercise.title }}</h3>
                    <p class="text-gray-600 mb-2">{{ exercise.description }}</p>
                    <div class="text-sm text-gray-500 flex justify-between items-center">
                        <span>Hạn nộp: {{ exercise.dueDate }}</span>
                        <span :class="exercise.status === 'Đã nộp' ? 'text-green-500' : 'text-red-500'">{{
                            exercise.status }}</span>
                    </div>
                </div>
            </div>
            <div v-else class="text-gray-500 italic">Chưa có bài tập nào.</div>
        </div>


    </ClassLayout>
</template>
<script setup>
import ClassLayout from '@/Layouts/ClassLayout.vue'

import { ref, nextTick, computed } from 'vue';
import { Link, usePage } from '@inertiajs/vue3'

const currentUrl = computed(() => usePage().url)

const exercises = ref([
    {
        id: 1,
        title: 'Bài tập Toán học',
        description: 'Giải hệ phương trình tuyến tính.',
        dueDate: '2025-07-20',
        status: 'Chưa làm',
    },
    {
        id: 2,
        title: 'Bài tập Vật lý',
        description: 'Phân tích chuyển động rơi tự do.',
        dueDate: '2025-07-22',
        status: 'Đã nộp',
    },
])
</script>

