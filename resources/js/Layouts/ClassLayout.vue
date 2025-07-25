<template>
    <DefaultLayout>
        <div ref="scrollContainer"
            class="rounded-xl px-6 pt-6 overflow-y-auto h-[calc(100vh-6rem)] scrollbar-thin scrollbar-thumb-[#725DFF] scrollbar-track-gray-200">
            <div class="p-6 grid grid-cols-5 gap-6 ">
                <div class="bg-white rounded-xl shadow-lg p-6 col-span-1 border-r border-gray-200 h-fit ">
                    <div class="sidebar-content">
                        <h2 class="text-lg font-semibold mb-4">Class Navigation</h2>
                    </div>

                    <div class="">
                        <ul class="space-y-2">
                            <li>
                                <Link href="/classes/dashboard" :class="[
                                    'block px-6 py-3 rounded-2xl transition font-regular',
                                    currentUrl.includes('/classes/dashboard')
                                        ? 'bg-[#F1EFFF] text-[#725DFF] font-semibold'
                                        : 'text-[#808080] hover:bg-[#F1EFFF] hover:text-[#725DFF] hover:font-semibold'
                                ]">
                                Dashboard
                                </Link>
                            </li>

                            <li>
                                <Link href="/classes/calendar" :class="[
                                    'block px-6 py-3 rounded-2xl transition font-regular',
                                    currentUrl.includes('/calendar')
                                        ? 'bg-[#F1EFFF] text-[#725DFF] font-semibold'
                                        : 'text-[#808080] hover:bg-[#F1EFFF] hover:text-[#725DFF] hover:font-semibold'
                                ]">
                                Calendar
                                </Link>
                            </li>
                            <li>
                                <Link href="/classes/exams" :class="[
                                    'block px-6 py-3 rounded-2xl transition font-regular',
                                    currentUrl.includes('/exam')
                                        ? 'bg-[#F1EFFF] text-[#725DFF] font-semibold'
                                        : 'text-[#808080] hover:bg-[#F1EFFF] hover:text-[#725DFF] hover:font-semibold'
                                ]">
                                Exam
                                </Link>
                            </li>
                            <li>
                                <Link href="/classes/exercises" :class="[
                                    'block px-6 py-3 rounded-2xl transition font-regular',
                                    currentUrl.includes('/exercises')
                                        ? 'bg-[#F1EFFF] text-[#725DFF] font-semibold'
                                        : 'text-[#808080] hover:bg-[#F1EFFF] hover:text-[#725DFF] hover:font-semibold'
                                ]">
                                Excercises
                                </Link>
                            </li>
                            <li>
                                <Link href="/classes/members" :class="[
                                    'block px-6 py-3 rounded-2xl transition font-regular',
                                    currentUrl.includes('/members')
                                        ? 'bg-[#F1EFFF] text-[#725DFF] font-semibold'
                                        : 'text-[#808080] hover:bg-[#F1EFFF] hover:text-[#725DFF] hover:font-semibold'
                                ]">
                                Members
                                </Link>
                            </li>
                        </ul>

                    </div>
                </div>
                <div class="col-span-4">
                    <slot />
                </div>
            </div>
        </div>
    </DefaultLayout>
</template>

<script setup>
import DefaultLayout from '@/Layouts/DefaultLayout.vue'
import { computed } from 'vue'
import { usePage, Link } from '@inertiajs/vue3'

const currentUrl = computed(() => usePage().url)

</script>



<style>
.post button {
    transition: color 0.2s ease;
}

.scrollbar-thin::-webkit-scrollbar {
    width: 6px;
}

.scrollbar-thin::-webkit-scrollbar-track {
    background: #E5E7EB;
}

.scrollbar-thin::-webkit-scrollbar-thumb {
    background: #725DFF;
    border-radius: 3px;
}

.scrollbar-thin {
    scrollbar-width: thin;
    scrollbar-color: #725DFF #E5E7EB;
}
</style>
