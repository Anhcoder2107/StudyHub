<template>
    <ClassLayout>
        <div class="bg-white rounded-xl shadow p-6 mt-6">
            <h2 class="text-xl font-semibold mb-4 text-[#725DFF]">Danh sách thành viên</h2>

            <div v-if="members.length" class="space-y-4">
                <div v-for="member in members" :key="member.id"
                    class="flex items-center justify-between border border-gray-200 rounded-lg p-4 hover:shadow-sm transition">
                    <div class="flex items-center space-x-4">
                        <img :src="member.avatar" alt="Avatar" class="w-10 h-10 rounded-full object-cover" />
                        <div>
                            <p class="text-sm font-semibold text-gray-800">{{ member.name }}</p>
                            <p class="text-xs text-gray-500">{{ member.email }}</p>
                        </div>
                    </div>
                    <span class="text-xs px-3 py-1 rounded-full"
                        :class="member.role === 'teacher' ? 'bg-green-100 text-green-700' : 'bg-blue-100 text-blue-700'">
                        {{ member.role === 'teacher' ? 'Giáo viên' : 'Học viên' }}
                    </span>
                </div>
            </div>

            <div v-else class="text-gray-500 italic">Chưa có thành viên nào trong lớp.</div>
        </div>

    </ClassLayout>
</template>

<script setup>
import ClassLayout from '@/Layouts/ClassLayout.vue'
import { ref } from 'vue'
const members = ref([
    {
        id: 1,
        name: 'Nguyễn Văn A',
        email: 'a@student.edu',
        avatar: 'https://i.pravatar.cc/100?img=1',
        role: 'student',
    },
    {
        id: 2,
        name: 'Trần Thị B',
        email: 'b@student.edu',
        avatar: 'https://i.pravatar.cc/100?img=2',
        role: 'student',
    },
    {
        id: 3,
        name: 'Thầy C',
        email: 'c@teacher.edu',
        avatar: 'https://i.pravatar.cc/100?img=3',
        role: 'teacher',
    },
])

</script>
