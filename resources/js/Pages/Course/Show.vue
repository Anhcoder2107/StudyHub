<script setup>

import PlayCircle from '../../../../resources/css/assets/icon/PlayCircle.svg';
import PlayCircleFill from '../../../../resources/css/assets/icon/PlayCircleFill.svg';
import alticon from '../../../../resources/css/assets/icon/alt.svg';
import AltDown from '../../../../resources/css/assets/icon/altdown.svg';
import AltRight from '../../../../resources/css/assets/icon/altright.svg';

import basket from '../../../../resources/css/assets/icon/shopping.svg';
import search from '../../../../resources/css/assets/icon/search.svg';
import bell from '../../../../resources/css/assets/icon/Bell.svg';
import user from '../../../../resources/css/assets/image/profile.jpg';
import logo from '../../../../resources/css/assets/icon/logo.svg';



import { ref } from 'vue';

const chapters = ref([
    { id: 1, isOpen: true, icon: alticon },
    { id: 2, isOpen: true, icon: alticon },
    { id: 3, isOpen: true, icon: alticon },
]);

const toggleChapter = (chapterId) => {
    const chapter = chapters.value.find(ch => ch.id === chapterId);
    if (chapter) {
        chapter.isOpen = !chapter.isOpen;
        chapter.icon = chapter.isOpen ? alticon : AltDown;
    }
};
</script>

<template>
    <div class="min-h-screen bg-neutral-100">
        <div class="fixed top-24 left-6 h-full w-80 bg-white rounded-xl p-2">
            <div class="dark-mode flex items-center justify-between px-4 py-2">
                <span class="text-gray-400 text-sm">Dark Mode</span>
                <label class="inline-flex items-center cursor-pointer">
                    <input type="checkbox" value="" class="sr-only peer">
                    <div
                        class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300
             dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full
             rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute
             after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5
             after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600 dark:peer-checked:bg-blue-600">
                    </div>
                </label>
            </div>
            <div class="title text-xl font-semibold px-4 py-2">
                Modules
            </div>
            <div class="overflow-y-auto h-[calc(100vh-12rem)]">
                <div v-for="chapter in chapters" :key="chapter.id"
                    class="chapter bg-gray-50 rounded-xl py-4 px-4 mb-4 pb-2 mt-2 ml-4 mr-4">
                    <div class="title mb-4">
                        <div class="flex items-center justify-between">
                            <span class="font-semibold">
                                Introduction
                            </span>
                            <button @click="toggleChapter(chapter.id)" class="outline-none focus:outline-none dropup">
                                <img :src="chapter.icon" alt="Toggle Icon"
                                    class="w-6 h-6 transition-transform duration-300"
                                    :class="{ 'rotate-180': !chapter.isOpen }">
                            </button>
                        </div>
                        <span class="text-gray-400 text-sm font-regular">
                            2 Course
                        </span>
                    </div>
                    <div class="list-course" :class="{ 'hidden': !chapter.isOpen }"
                        :style="{ 'max-height': chapter.isOpen ? '1000px' : '0', 'overflow': 'hidden', 'transition': 'max-height 0.3s ease-in-out' }">
                        <div class="item flex items-center gap-4 mb-2 bg-[#725DFF] p-2 rounded-2xl">
                            <img :src="PlayCircle" alt="">
                            <div class="">
                                <div class="name text-white">Lesson 1</div>
                                <div class="time text-gray-300 text-sm">2 minutes</div>
                            </div>
                        </div>
                        <div class="item flex items-center gap-4 mb-2 bg-[#F1EFFF] p-2 rounded-2xl">
                            <img :src="PlayCircleFill" alt="">
                            <div class="">
                                <div class="name text-black">Lesson 1</div>
                                <div class="time text-[#A192FF] text-sm">2 minutes</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex items-center justify-between px-6 py-4 h-20 rounded-2xl bg-white ml-6 mr-6 ">
            <div class="getting-text flex items-center gap-6 flex-row">
                <div class="text-xl font-semibold ">
                    <div class="logo flex items-center">
                        <img :src="logo" alt="Logo" class="w-8 h-8 inline-block mr-2">
                        StudyHub
                    </div>

                </div>
                 <div class="text-base font-regular text-gray-400">
                        My Courses
                        <span>
                            <img :src="AltRight" alt="Arrow Right Icon" class="inline-block w-4 h-4">
                        </span>
                        <span class="text-black font-semibold text-xl">
                            Course Name
                        </span>
                    </div>
            </div>
            <div class="navbar-right flex items-center justify-between gap-6 ">
                <div class="px-2 py-1 flex items-center justify-center">
                    <img :src="search" alt="Search Icon" class="search-icon">
                </div>
                <div class="px-2 py-1 flex items-center justify-center">
                    <img :src="basket" alt="Basket Icon" class="basket-icon">
                </div>
                <div class="px-2 py-1 flex items-center justify-center">
                    <img :src="bell" alt="Notification Icon" class="notification-icon">
                </div>
                <div class="rounded-full overflow-hidden flex items-center justify-center"
                    style="width:46px; height:46px;">
                    <img :src="user" alt="User Icon" class="w-full h-full object-cover rounded-full">
                </div>
            </div>
        </div>

        <div class="ml-80 fixed top-6 left-4 right-0 rounded-2xl">
            <div class="watching bg-white p-6 pb-2 rounded-2xl mx-6 mt-[4.5rem] h-auto">
                <div class="">
                    <iframe src="https://www.youtube.com/embed/2-qgKFB2FuM?si=PHbRaLxDnfItWrBe" frameborder="0"
                        class="w-full h-[40rem] rounded-2xl"></iframe>
                </div>
                <div class="mt-4 p-2 flex items-center justify-between bg-[#F8F9FA] rounded-2xl">
                    <div class="item flex items-center gap-4   p-2 rounded-2xl">
                        <div class="">
                            <div class="name font-semibold text-xl">Name Course</div>
                            <div class="time text-gray-400 text-sm flex items-center gap-4">
                                <span>Course 1</span>
                                <span>-</span>
                                <span>2 minutes</span>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center gap-4  justify-end">
                        <button
                            class="bg-[#F1EFFF] rounded-xl px-6 py-4 text-[#725DFF] font-semibold outline-none focus:outline-none">
                            Discussion Room
                        </button>
                        <button
                            class="bg-[#725DFF] rounded-xl py-4 px-6 text-white font-semibold outline-none focus:outline-none">
                            Next Video
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</template>

<style scoped>
.transition-transform {
    transition: transform 0.3s ease-in-out;
}

.list-course>* {
    transition: opacity 0.2s ease-in-out;
}

.list-course.hidden>* {
    opacity: 0;
}

.list-course>* {
    transition: opacity 0.2s ease-in-out;
}

.list-course.hidden>* {
    opacity: 0;
}
</style>
