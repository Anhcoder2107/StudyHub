<script setup>
import DefaultLayout from '@/Layouts/DefaultLayout.vue';

import banner from '../../../css/assets/image/Banner2.jpg';
import course from '../../../css/assets/image/course.jpg';
import user from '../../../css/assets/image/profile.jpg';
import star from '../../../css/assets/icon/Star.svg';
</script>

<template>
    <DefaultLayout>
        <div class="rounded-xl px-6 pt-6">
            <div class="w-full h-80 rounded-xl overflow-hidden ">
                <img class="w-full h-full object-cover" :src="banner" alt="">
            </div>

            <div class="flex items-center justify-between mt-6">
                <div class="list-course">
                    <ul class="flex items-center gap-6 text-gray-500">
                        <li class="text-white font-semibold bg-[#725DFF] px-4 py-2 rounded-xl">
                            Trending Courses
                        </li>
                        <li class="text-gray-400 px-4 py-2 rounded-xl">
                            IT & Software
                        </li>
                        <li class="text-gray-400 px-4 py-2 rounded-xl">
                            Design
                        </li>
                        <li class="text-gray-400 px-4 py-2 rounded-xl">
                            Maketing
                        </li>
                        <li class="text-gray-400 px-4 py-2 rounded-xl">
                            Science
                        </li>
                        <li class="text-gray-400 px-4 py-2 rounded-xl">
                            Law
                        </li>
                    </ul>
                </div>
                <div class="">
                    <select class="border-none focus:border-none outline-none focus:outline-none rounded-xl w-full"
                        name="" id="">
                        <option value="">All</option>
                        <option value="popular">Popular</option>
                        <option value="newest">Newest</option>
                        <option value="price_low_to_high">Price: Low to High</option>
                        <option value="price_high_to_low">Price: High to Low</option>
                    </select>
                </div>
            </div>

            <div
                class="overflow-y-auto h-[calc(100vh-32rem)] scrollbar-thin scrollbar-thumb-[#725DFF] scrollbar-track-gray-200">
                <div class="mt-6">
                    <div class="flex flex-wrap gap-6 ">
                        <div class="bg-white rounded-xl p-4 h-full">
                            <img :src="course" alt="Course Image" class="w-80 h-40 object-cover rounded-lg mb-2">
                            <div class="title flex items-center justify-between">
                                <h3 class="text-lg font-semibold w-48">Learn from Basic: React Javascript</h3>
                                <div class="star flex items-center gap-1">
                                    <img :src="star" alt="">
                                    <img :src="star" alt="">
                                    <img :src="star" alt="">
                                    <img :src="star" alt="">
                                    <img :src="star" alt="">
                                </div>
                            </div>
                            <div class="mt-4 flex items-center justify-between">
                                <span class="text-gray-400 flex items-center gap-2">
                                    <img class="w-6 h-6 object-cover rounded-full" :src="user" alt="">
                                    Anhcoder 2005
                                </span>
                                <button class="text-[#725DFF] px-4 py-2 font-bold text-2xl ">$100</button>
                            </div>
                        </div>
                        <div class="bg-white rounded-xl p-4 h-full">
                            <img :src="course" alt="Course Image" class="w-80 h-40 object-cover rounded-lg mb-4">
                            <div class="title flex items-center justify-between">
                                <h3 class="text-lg font-semibold w-48">Learn from Basic: React Javascript</h3>
                                <div class="star flex items-center gap-1">
                                    <img :src="star" alt="">
                                    <img :src="star" alt="">
                                    <img :src="star" alt="">
                                    <img :src="star" alt="">
                                    <img :src="star" alt="">
                                </div>
                            </div>
                            <div class="mt-4 flex items-center justify-between">
                                <span class="text-gray-400 flex items-center gap-2">
                                    <img class="w-6 h-6 object-cover rounded-full" :src="user" alt="">
                                    Anhcoder 2005
                                </span>
                                <button class="text-[#725DFF] px-4 py-2 font-bold text-2xl ">$100</button>
                            </div>
                        </div>
                        <div class="bg-white rounded-xl p-4 h-full">
                            <img :src="course" alt="Course Image" class="w-80 h-40 object-cover rounded-lg mb-4">
                            <div class="title flex items-center justify-between">
                                <h3 class="text-lg font-semibold w-48">Learn from Basic: React Javascript</h3>
                                <div class="star flex items-center gap-1">
                                    <img :src="star" alt="">
                                    <img :src="star" alt="">
                                    <img :src="star" alt="">
                                    <img :src="star" alt="">
                                    <img :src="star" alt="">
                                </div>
                            </div>
                            <div class="mt-4 flex items-center justify-between">
                                <span class="text-gray-400 flex items-center gap-2">
                                    <img class="w-6 h-6 object-cover rounded-full" :src="user" alt="">
                                    Anhcoder 2005
                                </span>
                                <button class="text-[#725DFF] px-4 py-2 font-bold text-2xl ">$100</button>
                            </div>
                        </div>
                        <div class="bg-white rounded-xl p-4 h-full">
                            <img :src="course" alt="Course Image" class="w-80 h-40 object-cover rounded-lg mb-4">
                            <div class="title flex items-center justify-between">
                                <h3 class="text-lg font-semibold w-48">Learn from Basic: React Javascript</h3>
                                <div class="star flex items-center gap-1">
                                    <img :src="star" alt="">
                                    <img :src="star" alt="">
                                    <img :src="star" alt="">
                                    <img :src="star" alt="">
                                    <img :src="star" alt="">
                                </div>
                            </div>
                            <div class="mt-4 flex items-center justify-between">
                                <span class="text-gray-400 flex items-center gap-2">
                                    <img class="w-6 h-6 object-cover rounded-full" :src="user" alt="">
                                    Anhcoder 2005
                                </span>
                                <button class="text-[#725DFF] px-4 py-2 font-bold text-2xl ">$100</button>
                            </div>
                        </div>
                        <div class="bg-white rounded-xl p-4 h-full">
                            <img :src="course" alt="Course Image" class="w-80 h-40 object-cover rounded-lg mb-4">
                            <div class="title flex items-center justify-between">
                                <h3 class="text-lg font-semibold w-48">Learn from Basic: React Javascript</h3>
                                <div class="star flex items-center gap-1">
                                    <img :src="star" alt="">
                                    <img :src="star" alt="">
                                    <img :src="star" alt="">
                                    <img :src="star" alt="">
                                    <img :src="star" alt="">
                                </div>
                            </div>
                            <div class="mt-4 flex items-center justify-between">
                                <span class="text-gray-400 flex items-center gap-2">
                                    <img class="w-6 h-6 object-cover rounded-full" :src="user" alt="">
                                    Anhcoder 2005
                                </span>
                                <button class="text-[#725DFF] px-4 py-2 font-bold text-2xl ">$100</button>
                            </div>
                        </div>
                        <div class="bg-white rounded-xl p-4 h-full">
                            <img :src="course" alt="Course Image" class="w-80 h-40 object-cover rounded-lg mb-4">
                            <div class="title flex items-center justify-between">
                                <h3 class="text-lg font-semibold w-48">Learn from Basic: React Javascript</h3>
                                <div class="star flex items-center gap-1">
                                    <img :src="star" alt="">
                                    <img :src="star" alt="">
                                    <img :src="star" alt="">
                                    <img :src="star" alt="">
                                    <img :src="star" alt="">
                                </div>
                            </div>
                            <div class="mt-4 flex items-center justify-between">
                                <span class="text-gray-400 flex items-center gap-2">
                                    <img class="w-6 h-6 object-cover rounded-full" :src="user" alt="">
                                    Anhcoder 2005
                                </span>
                                <button class="text-[#725DFF] px-4 py-2 font-bold text-2xl ">$100</button>
                            </div>
                        </div>
                        <div class="bg-white rounded-xl p-4 h-full">
                            <img :src="course" alt="Course Image" class="w-80 h-40 object-cover rounded-lg mb-4">
                            <div class="title flex items-center justify-between">
                                <h3 class="text-lg font-semibold w-48">Learn from Basic: React Javascript</h3>
                                <div class="star flex items-center gap-1">
                                    <img :src="star" alt="">
                                    <img :src="star" alt="">
                                    <img :src="star" alt="">
                                    <img :src="star" alt="">
                                    <img :src="star" alt="">
                                </div>
                            </div>
                            <div class="mt-4 flex items-center justify-between">
                                <span class="text-gray-400 flex items-center gap-2">
                                    <img class="w-6 h-6 object-cover rounded-full" :src="user" alt="">
                                    Anhcoder 2005
                                </span>
                                <button class="text-[#725DFF] px-4 py-2 font-bold text-2xl ">$100</button>
                            </div>
                        </div>
                        <div class="bg-white rounded-xl p-4 h-full">
                            <img :src="course" alt="Course Image" class="w-80 h-40 object-cover rounded-lg mb-4">
                            <div class="title flex items-center justify-between">
                                <h3 class="text-lg font-semibold w-48">Learn from Basic: React Javascript</h3>
                                <div class="star flex items-center gap-1">
                                    <img :src="star" alt="">
                                    <img :src="star" alt="">
                                    <img :src="star" alt="">
                                    <img :src="star" alt="">
                                    <img :src="star" alt="">
                                </div>
                            </div>
                            <div class="mt-4 flex items-center justify-between">
                                <span class="text-gray-400 flex items-center gap-2">
                                    <img class="w-6 h-6 object-cover rounded-full" :src="user" alt="">
                                    Anhcoder 2005
                                </span>
                                <button class="text-[#725DFF] px-4 py-2 font-bold text-2xl ">$100</button>
                            </div>
                        </div>
                        <div class="bg-white rounded-xl p-4 h-full">
                            <img :src="course" alt="Course Image" class="w-80 h-40 object-cover rounded-lg mb-4">
                            <div class="title flex items-center justify-between">
                                <h3 class="text-lg font-semibold w-48">Learn from Basic: React Javascript</h3>
                                <div class="star flex items-center gap-1">
                                    <img :src="star" alt="">
                                    <img :src="star" alt="">
                                    <img :src="star" alt="">
                                    <img :src="star" alt="">
                                    <img :src="star" alt="">
                                </div>
                            </div>
                            <div class="mt-4 flex items-center justify-between">
                                <span class="text-gray-400 flex items-center gap-2">
                                    <img class="w-6 h-6 object-cover rounded-full" :src="user" alt="">
                                    Anhcoder 2005
                                </span>
                                <button class="text-[#725DFF] px-4 py-2 font-bold text-2xl ">$100</button>
                            </div>
                        </div>
                        <div class="bg-white rounded-xl p-4 h-full">
                            <img :src="course" alt="Course Image" class="w-80 h-40 object-cover rounded-lg mb-4">
                            <div class="title flex items-center justify-between">
                                <h3 class="text-lg font-semibold w-48">Learn from Basic: React Javascript</h3>
                                <div class="star flex items-center gap-1">
                                    <img :src="star" alt="">
                                    <img :src="star" alt="">
                                    <img :src="star" alt="">
                                    <img :src="star" alt="">
                                    <img :src="star" alt="">
                                </div>
                            </div>
                            <div class="mt-4 flex items-center justify-between">
                                <span class="text-gray-400 flex items-center gap-2">
                                    <img class="w-6 h-6 object-cover rounded-full" :src="user" alt="">
                                    Anhcoder 2005
                                </span>
                                <button class="text-[#725DFF] px-4 py-2 font-bold text-2xl ">$100</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </DefaultLayout>
</template>

<style scoped>
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
