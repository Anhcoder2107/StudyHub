<template>
    <ClassLayout>

        <div class="bg-white rounded-xl shadow p-6">
            <h2 class="text-xl font-semibold mb-4 text-[#725DFF]">Danh sách bài thi</h2>

            <div v-if="exams.length" class="space-y-4">
                <div v-for="exam in exams" :key="exam.id"
                    class="border border-gray-200 rounded-lg p-4 hover:shadow transition">
                    <div class="flex justify-between items-center mb-2">
                        <h3 class="text-lg font-semibold text-gray-800">{{ exam.title }}</h3>
                        <button class="text-sm bg-[#725DFF] text-white px-3 py-1 rounded hover:bg-[#5a48cc] transition">
                            Bắt đầu
                        </button>
                    </div>
                    <p class="text-gray-600 text-sm">📅 {{ exam.startDate }} → {{ exam.endDate }}</p>
                    <p class="text-gray-500 text-sm">📝 Số câu hỏi: {{ exam.questions }} | ⏱ Thời gian: {{
                        exam.duration }} phút</p>
                </div>
            </div>

            <div v-else class="text-gray-500 italic">Hiện chưa có bài thi nào.</div>
        </div>

    </ClassLayout>
</template>
<script setup>
import ClassLayout from '@/Layouts/ClassLayout.vue'
import { ref, nextTick } from 'vue';
import { Link, usePage } from '@inertiajs/vue3'
import { computed } from 'vue'

const currentUrl = computed(() => usePage().url)


const exams = ref([
    {
        id: 1,
        title: 'Thi giữa kỳ Toán 12',
        startDate: '20/07/2025',
        endDate: '25/07/2025',
        questions: 40,
        duration: 60,
    },
    {
        id: 2,
        title: 'Kiểm tra 15 phút Vật Lý',
        startDate: '18/07/2025',
        endDate: '19/07/2025',
        questions: 10,
        duration: 15,
    },
])


</script>
