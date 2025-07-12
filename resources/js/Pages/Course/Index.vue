<script setup>
import DefaultLayout from '@/Layouts/DefaultLayout.vue';
import { Head } from '@inertiajs/vue3';
import imageProfile from '../../../css/assets/image/profile.jpg';
import NotebookCourses from '../../../css/assets/icon/NotebookCourses.svg';
import UsersGroupCourses from '../../../css/assets/icon/UsersGroupCourses.svg';
import UnionCourses from '../../../css/assets/icon/UnionCourses.svg';
import Soundwave from '../../../css/assets/icon/Soundwave.svg';



import { ref } from 'vue';
const NotebookCoursesIcon = ref(NotebookCourses);
const UsersGroupCoursesIcon = ref(UsersGroupCourses);
const UnionCoursesIcon = ref(UnionCourses);
const SoundwaveIcon = ref(Soundwave);
const progressValue = ref(79);


</script>
<template>
    <DefaultLayout>
        <div class="watching bg-white p-6 rounded-xl mx-6 mt-4">
            <div class="title flex items-center gap-2 mb-4">
                <img :src="SoundwaveIcon" alt="">
                <span class="text-2xl font-semibold">Continue Watching</span>
            </div>

            <div class="list-course flex gap-4 overflow-x-auto">
                <div class="card">
                    <div class="video">
                        <iframe class="rounded-xl" src="https://www.youtube.com/embed/2-qgKFB2FuM?si=PHbRaLxDnfItWrBe" frameborder="0"></iframe>
                    </div>
                    <div class="cart-name mt-2">
                        <span class="text-lg font-semibold">Name course</span>
                        <div class="info flex items-center gap-2 text-sm text-[#BDC1C6]">
                            <span class="uppercase">Chapter 1</span>
                            <span>-</span>
                            <span class="uppercase">Part 1</span>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="video">
                        <iframe class="rounded-xl" src="https://www.youtube.com/embed/2-qgKFB2FuM?si=PHbRaLxDnfItWrBe" frameborder="0"></iframe>
                    </div>
                    <div class="cart-name mt-2">
                        <span class="text-lg font-semibold">Name course</span>
                        <div class="info flex items-center gap-2 text-sm text-[#BDC1C6]">
                            <span class="uppercase">Chapter 1</span>
                            <span>-</span>
                            <span class="uppercase">Part 1</span>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="video">
                        <iframe class="rounded-xl" src="https://www.youtube.com/embed/2-qgKFB2FuM?si=PHbRaLxDnfItWrBe" frameborder="0"></iframe>
                    </div>
                    <div class="cart-name mt-2">
                        <span class="text-lg font-semibold">Name course</span>
                        <div class="info flex items-center gap-2 text-sm text-[#BDC1C6]">
                            <span class="uppercase">Chapter 1</span>
                            <span>-</span>
                            <span class="uppercase">Part 1</span>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="video">
                        <iframe class="rounded-xl" src="https://www.youtube.com/embed/2-qgKFB2FuM?si=PHbRaLxDnfItWrBe" frameborder="0"></iframe>
                    </div>
                    <div class="cart-name mt-2">
                        <span class="text-lg font-semibold">Name course</span>
                        <div class="info flex items-center gap-2 text-sm text-[#BDC1C6]">
                            <span class="uppercase">Chapter 1</span>
                            <span>-</span>
                            <span class="uppercase">Part 1</span>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="video">
                        <iframe class="rounded-xl" src="https://www.youtube.com/embed/2-qgKFB2FuM?si=PHbRaLxDnfItWrBe" frameborder="0"></iframe>
                    </div>
                    <div class="cart-name mt-2">
                        <span class="text-lg font-semibold">Name course</span>
                        <div class="info flex items-center gap-2 text-sm text-[#BDC1C6]">
                            <span class="uppercase">Chapter 1</span>
                            <span>-</span>
                            <span class="uppercase">Part 1</span>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="video">
                        <iframe class="rounded-xl" src="https://www.youtube.com/embed/2-qgKFB2FuM?si=PHbRaLxDnfItWrBe" frameborder="0"></iframe>
                    </div>
                    <div class="cart-name mt-2">
                        <span class="text-lg font-semibold">Name course</span>
                        <div class="info flex items-center gap-2 text-sm text-[#BDC1C6]">
                            <span class="uppercase">Chapter 1</span>
                            <span>-</span>
                            <span class="uppercase">Part 1</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mb-12 rounded-xl mx-6 mt-4">
            <div class="title-filter flex items-center justify-between mb-4">
                <div class="title flex gap-2 flex-col items-start">
                    <span class="text-2xl font-regular">Enrolled Courses</span>
                    <span class="text-base font-regular text-[#BDC1C6]">Dive in, learn, and let your potential
                        unfold!</span>
                </div>
                <div class="filter flex items-center gap-4 h-full">
                    <div class=" relative">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M11.5 2.75C6.66751 2.75 2.75 6.66751 2.75 11.5C2.75 16.3325 6.66751 20.25 11.5 20.25C16.3325 20.25 20.25 16.3325 20.25 11.5C20.25 6.66751 16.3325 2.75 11.5 2.75ZM1.25 11.5C1.25 5.83908 5.83908 1.25 11.5 1.25C17.1609 1.25 21.75 5.83908 21.75 11.5C21.75 17.1609 17.1609 21.75 11.5 21.75C5.83908 21.75 1.25 17.1609 1.25 11.5ZM19.4697 19.4697C19.7626 19.1768 20.2374 19.1768 20.5303 19.4697L22.5303 21.4697C22.8232 21.7626 22.8232 22.2374 22.5303 22.5303C22.2374 22.8232 21.7626 22.8232 21.4697 22.5303L19.4697 20.5303C19.1768 20.2374 19.1768 19.7626 19.4697 19.4697Z"
                                    fill="#BDC1C6" />
                            </svg>
                        </div>
                        <input type="text" placeholder="Search for courses..."
                            class="w-full pl-10 px-12 py-2 border-[#BDC1C6] rounded-lg outline-none focus:ring-2 focus:ring-blue-500 text-base text-[#BDC1C6] font-regular focus:outline-none focus:text-black">
                    </div>
                    <div class="ml-4">
                        <select
                            class="w-full px-4 py-2 border-transparent rounded-lg outline-none focus:ring-2 focus:ring-blue-500 focus:outline-none focus:border-transparent ">
                            <option value="">All Course</option>
                            <option value="web-development">Web Development</option>
                            <option value="data-science">Data Science</option>
                            <option value="design">Design</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="overflow-y-auto h-[calc(100vh-34rem)] ">
                <div class="mb-6">
                    <div class="course-item bg-white p-4 rounded-3xl flex gap-4 items-center justify-between ">
                        <div class="pr-12 pl-2">
                            <div class="name-course">
                                <span class="text-xl  font-semibold">Course Name</span>
                            </div>
                            <div class="flex items-center gap-6 py-2">
                                <span class="text-base text-[#BDC1C6]">Mentor</span>
                                <div class="name-mentor">
                                    <img :src="imageProfile" alt="Mentor Image"
                                        class="w-6 h-6 rounded-full inline-block mr-2">
                                    <span class="text-sm font-semibold">Mentor Name</span>
                                </div>
                            </div>
                        </div>
                        <div class="duration">
                            <span class="text-sm font-regular text-[#BDC1C6]">
                                Duration
                            </span>
                            <div class="duration-time text-lg font-semibold">
                                6h 30m
                            </div>
                        </div>
                        <div class="progress flex items-center gap-4">
                            <span class="text-lg font-semibold">79%</span>
                            <div class="progress-bar w-32 h-1 bg-gray-300">
                                <div class="progress-fill" :style="{ width: progressValue + '%' }"></div>
                            </div>
                        </div>
                        <div class="info flex items-center gap-12 pr-4">
                            <div class="group">
                                <img :src="UsersGroupCoursesIcon" alt="Group Icon" class="w-8 h-8 inline-block mr-2">
                                <span class="text-lg font-semibold">5</span>
                            </div>
                            <div class="book">
                                <img :src="NotebookCoursesIcon" alt="Notebook Icon" class="w-8 h-8 inline-block mr-2">
                                <span class="text-lg font-semibold">10</span>
                            </div>
                            <div class="union">
                                <img :src="UnionCoursesIcon" alt="Union Icon" class="w-8 h-8 inline-block mr-2">
                                <span class="text-lg font-semibold">3</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-6">
                    <div class="course-item bg-white p-4 rounded-3xl flex gap-4 items-center justify-between ">
                        <div class="pr-12 pl-2">
                            <div class="name-course">
                                <span class="text-xl  font-semibold">Course Name</span>
                            </div>
                            <div class="flex items-center gap-6 py-2">
                                <span class="text-base text-[#BDC1C6]">Mentor</span>
                                <div class="name-mentor">
                                    <img :src="imageProfile" alt="Mentor Image"
                                        class="w-6 h-6 rounded-full inline-block mr-2">
                                    <span class="text-sm font-semibold">Mentor Name</span>
                                </div>
                            </div>
                        </div>
                        <div class="duration">
                            <span class="text-sm font-regular text-[#BDC1C6]">
                                Duration
                            </span>
                            <div class="duration-time text-lg font-semibold">
                                6h 30m
                            </div>
                        </div>
                        <div class="progress flex items-center gap-4">
                            <span class="text-lg font-semibold">79%</span>
                            <div class="progress-bar w-32 h-1 bg-gray-300">
                                <div class="progress-fill" :style="{ width: progressValue + '%' }"></div>
                            </div>
                        </div>
                        <div class="info flex items-center gap-12 pr-4">
                            <div class="group">
                                <img :src="UsersGroupCoursesIcon" alt="Group Icon" class="w-8 h-8 inline-block mr-2">
                                <span class="text-lg font-semibold">5</span>
                            </div>
                            <div class="book">
                                <img :src="NotebookCoursesIcon" alt="Notebook Icon" class="w-8 h-8 inline-block mr-2">
                                <span class="text-lg font-semibold">10</span>
                            </div>
                            <div class="union">
                                <img :src="UnionCoursesIcon" alt="Union Icon" class="w-8 h-8 inline-block mr-2">
                                <span class="text-lg font-semibold">3</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-6">
                    <div class="course-item bg-white p-4 rounded-3xl flex gap-4 items-center justify-between ">
                        <div class="pr-12 pl-2">
                            <div class="name-course">
                                <span class="text-xl  font-semibold">Course Name</span>
                            </div>
                            <div class="flex items-center gap-6 py-2">
                                <span class="text-base text-[#BDC1C6]">Mentor</span>
                                <div class="name-mentor">
                                    <img :src="imageProfile" alt="Mentor Image"
                                        class="w-6 h-6 rounded-full inline-block mr-2">
                                    <span class="text-sm font-semibold">Mentor Name</span>
                                </div>
                            </div>
                        </div>
                        <div class="duration">
                            <span class="text-sm font-regular text-[#BDC1C6]">
                                Duration
                            </span>
                            <div class="duration-time text-lg font-semibold">
                                6h 30m
                            </div>
                        </div>
                        <div class="progress flex items-center gap-4">
                            <span class="text-lg font-semibold">79%</span>
                            <div class="progress-bar w-32 h-1 bg-gray-300">
                                <div class="progress-fill" :style="{ width: progressValue + '%' }"></div>
                            </div>
                        </div>
                        <div class="info flex items-center gap-12 pr-4">
                            <div class="group">
                                <img :src="UsersGroupCoursesIcon" alt="Group Icon" class="w-8 h-8 inline-block mr-2">
                                <span class="text-lg font-semibold">5</span>
                            </div>
                            <div class="book">
                                <img :src="NotebookCoursesIcon" alt="Notebook Icon" class="w-8 h-8 inline-block mr-2">
                                <span class="text-lg font-semibold">10</span>
                            </div>
                            <div class="union">
                                <img :src="UnionCoursesIcon" alt="Union Icon" class="w-8 h-8 inline-block mr-2">
                                <span class="text-lg font-semibold">3</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-6">
                    <div class="course-item bg-white p-4 rounded-3xl flex gap-4 items-center justify-between ">
                        <div class="pr-12 pl-2">
                            <div class="name-course">
                                <span class="text-xl  font-semibold">Course Name</span>
                            </div>
                            <div class="flex items-center gap-6 py-2">
                                <span class="text-base text-[#BDC1C6]">Mentor</span>
                                <div class="name-mentor">
                                    <img :src="imageProfile" alt="Mentor Image"
                                        class="w-6 h-6 rounded-full inline-block mr-2">
                                    <span class="text-sm font-semibold">Mentor Name</span>
                                </div>
                            </div>
                        </div>
                        <div class="duration">
                            <span class="text-sm font-regular text-[#BDC1C6]">
                                Duration
                            </span>
                            <div class="duration-time text-lg font-semibold">
                                6h 30m
                            </div>
                        </div>
                        <div class="progress flex items-center gap-4">
                            <span class="text-lg font-semibold">79%</span>
                            <div class="progress-bar w-32 h-1 bg-gray-300">
                                <div class="progress-fill" :style="{ width: progressValue + '%' }"></div>
                            </div>
                        </div>
                        <div class="info flex items-center gap-12 pr-4">
                            <div class="group">
                                <img :src="UsersGroupCoursesIcon" alt="Group Icon" class="w-8 h-8 inline-block mr-2">
                                <span class="text-lg font-semibold">5</span>
                            </div>
                            <div class="book">
                                <img :src="NotebookCoursesIcon" alt="Notebook Icon" class="w-8 h-8 inline-block mr-2">
                                <span class="text-lg font-semibold">10</span>
                            </div>
                            <div class="union">
                                <img :src="UnionCoursesIcon" alt="Union Icon" class="w-8 h-8 inline-block mr-2">
                                <span class="text-lg font-semibold">3</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-6">
                    <div class="course-item bg-white p-4 rounded-3xl flex gap-4 items-center justify-between ">
                        <div class="pr-12 pl-2">
                            <div class="name-course">
                                <span class="text-xl  font-semibold">Course Name</span>
                            </div>
                            <div class="flex items-center gap-6 py-2">
                                <span class="text-base text-[#BDC1C6]">Mentor</span>
                                <div class="name-mentor">
                                    <img :src="imageProfile" alt="Mentor Image"
                                        class="w-6 h-6 rounded-full inline-block mr-2">
                                    <span class="text-sm font-semibold">Mentor Name</span>
                                </div>
                            </div>
                        </div>
                        <div class="duration">
                            <span class="text-sm font-regular text-[#BDC1C6]">
                                Duration
                            </span>
                            <div class="duration-time text-lg font-semibold">
                                6h 30m
                            </div>
                        </div>
                        <div class="progress flex items-center gap-4">
                            <span class="text-lg font-semibold">79%</span>
                            <div class="progress-bar w-32 h-1 bg-gray-300">
                                <div class="progress-fill" :style="{ width: progressValue + '%' }"></div>
                            </div>
                        </div>
                        <div class="info flex items-center gap-12 pr-4">
                            <div class="group">
                                <img :src="UsersGroupCoursesIcon" alt="Group Icon" class="w-8 h-8 inline-block mr-2">
                                <span class="text-lg font-semibold">5</span>
                            </div>
                            <div class="book">
                                <img :src="NotebookCoursesIcon" alt="Notebook Icon" class="w-8 h-8 inline-block mr-2">
                                <span class="text-lg font-semibold">10</span>
                            </div>
                            <div class="union">
                                <img :src="UnionCoursesIcon" alt="Union Icon" class="w-8 h-8 inline-block mr-2">
                                <span class="text-lg font-semibold">3</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-6">
                    <div class="course-item bg-white p-4 rounded-3xl flex gap-4 items-center justify-between ">
                        <div class="pr-12 pl-2">
                            <div class="name-course">
                                <span class="text-xl  font-semibold">Course Name</span>
                            </div>
                            <div class="flex items-center gap-6 py-2">
                                <span class="text-base text-[#BDC1C6]">Mentor</span>
                                <div class="name-mentor">
                                    <img :src="imageProfile" alt="Mentor Image"
                                        class="w-6 h-6 rounded-full inline-block mr-2">
                                    <span class="text-sm font-semibold">Mentor Name</span>
                                </div>
                            </div>
                        </div>
                        <div class="duration">
                            <span class="text-sm font-regular text-[#BDC1C6]">
                                Duration
                            </span>
                            <div class="duration-time text-lg font-semibold">
                                6h 30m
                            </div>
                        </div>
                        <div class="progress flex items-center gap-4">
                            <span class="text-lg font-semibold">79%</span>
                            <div class="progress-bar w-32 h-1 bg-gray-300">
                                <div class="progress-fill" :style="{ width: progressValue + '%' }"></div>
                            </div>
                        </div>
                        <div class="info flex items-center gap-12 pr-4">
                            <div class="group">
                                <img :src="UsersGroupCoursesIcon" alt="Group Icon" class="w-8 h-8 inline-block mr-2">
                                <span class="text-lg font-semibold">5</span>
                            </div>
                            <div class="book">
                                <img :src="NotebookCoursesIcon" alt="Notebook Icon" class="w-8 h-8 inline-block mr-2">
                                <span class="text-lg font-semibold">10</span>
                            </div>
                            <div class="union">
                                <img :src="UnionCoursesIcon" alt="Union Icon" class="w-8 h-8 inline-block mr-2">
                                <span class="text-lg font-semibold">3</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-6">
                    <div class="course-item bg-white p-4 rounded-3xl flex gap-4 items-center justify-between ">
                        <div class="pr-12 pl-2">
                            <div class="name-course">
                                <span class="text-xl  font-semibold">Course Name</span>
                            </div>
                            <div class="flex items-center gap-6 py-2">
                                <span class="text-base text-[#BDC1C6]">Mentor</span>
                                <div class="name-mentor">
                                    <img :src="imageProfile" alt="Mentor Image"
                                        class="w-6 h-6 rounded-full inline-block mr-2">
                                    <span class="text-sm font-semibold">Mentor Name</span>
                                </div>
                            </div>
                        </div>
                        <div class="duration">
                            <span class="text-sm font-regular text-[#BDC1C6]">
                                Duration
                            </span>
                            <div class="duration-time text-lg font-semibold">
                                6h 30m
                            </div>
                        </div>
                        <div class="progress flex items-center gap-4">
                            <span class="text-lg font-semibold">79%</span>
                            <div class="progress-bar w-32 h-1 bg-gray-300">
                                <div class="progress-fill" :style="{ width: progressValue + '%' }"></div>
                            </div>
                        </div>
                        <div class="info flex items-center gap-12 pr-4">
                            <div class="group">
                                <img :src="UsersGroupCoursesIcon" alt="Group Icon" class="w-8 h-8 inline-block mr-2">
                                <span class="text-lg font-semibold">5</span>
                            </div>
                            <div class="book">
                                <img :src="NotebookCoursesIcon" alt="Notebook Icon" class="w-8 h-8 inline-block mr-2">
                                <span class="text-lg font-semibold">10</span>
                            </div>
                            <div class="union">
                                <img :src="UnionCoursesIcon" alt="Union Icon" class="w-8 h-8 inline-block mr-2">
                                <span class="text-lg font-semibold">3</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-6">
                    <div class="course-item bg-white p-4 rounded-3xl flex gap-4 items-center justify-between ">
                        <div class="pr-12 pl-2">
                            <div class="name-course">
                                <span class="text-xl  font-semibold">Course Name</span>
                            </div>
                            <div class="flex items-center gap-6 py-2">
                                <span class="text-base text-[#BDC1C6]">Mentor</span>
                                <div class="name-mentor">
                                    <img :src="imageProfile" alt="Mentor Image"
                                        class="w-6 h-6 rounded-full inline-block mr-2">
                                    <span class="text-sm font-semibold">Mentor Name</span>
                                </div>
                            </div>
                        </div>
                        <div class="duration">
                            <span class="text-sm font-regular text-[#BDC1C6]">
                                Duration
                            </span>
                            <div class="duration-time text-lg font-semibold">
                                6h 30m
                            </div>
                        </div>
                        <div class="progress flex items-center gap-4">
                            <span class="text-lg font-semibold">79%</span>
                            <div class="progress-bar w-32 h-1 bg-gray-300">
                                <div class="progress-fill" :style="{ width: progressValue + '%' }"></div>
                            </div>
                        </div>
                        <div class="info flex items-center gap-12 pr-4">
                            <div class="group">
                                <img :src="UsersGroupCoursesIcon" alt="Group Icon" class="w-8 h-8 inline-block mr-2">
                                <span class="text-lg font-semibold">5</span>
                            </div>
                            <div class="book">
                                <img :src="NotebookCoursesIcon" alt="Notebook Icon" class="w-8 h-8 inline-block mr-2">
                                <span class="text-lg font-semibold">10</span>
                            </div>
                            <div class="union">
                                <img :src="UnionCoursesIcon" alt="Union Icon" class="w-8 h-8 inline-block mr-2">
                                <span class="text-lg font-semibold">3</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-6">
                    <div class="course-item bg-white p-4 rounded-3xl flex gap-4 items-center justify-between ">
                        <div class="pr-12 pl-2">
                            <div class="name-course">
                                <span class="text-xl  font-semibold">Course Name</span>
                            </div>
                            <div class="flex items-center gap-6 py-2">
                                <span class="text-base text-[#BDC1C6]">Mentor</span>
                                <div class="name-mentor">
                                    <img :src="imageProfile" alt="Mentor Image"
                                        class="w-6 h-6 rounded-full inline-block mr-2">
                                    <span class="text-sm font-semibold">Mentor Name</span>
                                </div>
                            </div>
                        </div>
                        <div class="duration">
                            <span class="text-sm font-regular text-[#BDC1C6]">
                                Duration
                            </span>
                            <div class="duration-time text-lg font-semibold">
                                6h 30m
                            </div>
                        </div>
                        <div class="progress flex items-center gap-4">
                            <span class="text-lg font-semibold">79%</span>
                            <div class="progress-bar w-32 h-1 bg-gray-300">
                                <div class="progress-fill" :style="{ width: progressValue + '%' }"></div>
                            </div>
                        </div>
                        <div class="info flex items-center gap-12 pr-4">
                            <div class="group">
                                <img :src="UsersGroupCoursesIcon" alt="Group Icon" class="w-8 h-8 inline-block mr-2">
                                <span class="text-lg font-semibold">5</span>
                            </div>
                            <div class="book">
                                <img :src="NotebookCoursesIcon" alt="Notebook Icon" class="w-8 h-8 inline-block mr-2">
                                <span class="text-lg font-semibold">10</span>
                            </div>
                            <div class="union">
                                <img :src="UnionCoursesIcon" alt="Union Icon" class="w-8 h-8 inline-block mr-2">
                                <span class="text-lg font-semibold">3</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-6">
                    <div class="course-item bg-white p-4 rounded-3xl flex gap-4 items-center justify-between ">
                        <div class="pr-12 pl-2">
                            <div class="name-course">
                                <span class="text-xl  font-semibold">Course Name</span>
                            </div>
                            <div class="flex items-center gap-6 py-2">
                                <span class="text-base text-[#BDC1C6]">Mentor</span>
                                <div class="name-mentor">
                                    <img :src="imageProfile" alt="Mentor Image"
                                        class="w-6 h-6 rounded-full inline-block mr-2">
                                    <span class="text-sm font-semibold">Mentor Name</span>
                                </div>
                            </div>
                        </div>
                        <div class="duration">
                            <span class="text-sm font-regular text-[#BDC1C6]">
                                Duration
                            </span>
                            <div class="duration-time text-lg font-semibold">
                                6h 30m
                            </div>
                        </div>
                        <div class="progress flex items-center gap-4">
                            <span class="text-lg font-semibold">79%</span>
                            <div class="progress-bar w-32 h-1 bg-gray-300">
                                <div class="progress-fill" :style="{ width: progressValue + '%' }"></div>
                            </div>
                        </div>
                        <div class="info flex items-center gap-12 pr-4">
                            <div class="group">
                                <img :src="UsersGroupCoursesIcon" alt="Group Icon" class="w-8 h-8 inline-block mr-2">
                                <span class="text-lg font-semibold">5</span>
                            </div>
                            <div class="book">
                                <img :src="NotebookCoursesIcon" alt="Notebook Icon" class="w-8 h-8 inline-block mr-2">
                                <span class="text-lg font-semibold">10</span>
                            </div>
                            <div class="union">
                                <img :src="UnionCoursesIcon" alt="Union Icon" class="w-8 h-8 inline-block mr-2">
                                <span class="text-lg font-semibold">3</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </DefaultLayout>
</template>

<style scoped>
.progress-bar {
    background-color: #e0e0e0;
    /* Light gray background for the track */
    border-radius: 2px;
    overflow: hidden;
}

.progress-fill {
    height: 100%;
    background-color: #4F46E5;
    /* Blue fill to match the theme */
    transition: width 0.3s ease;
    /* Smooth transition for visual feedback */
}

/* Hide the thumb and style the track as a plain progress bar */
.range-progress {
    -webkit-appearance: none;
    /* Remove default styling for Webkit browsers */
    appearance: none;
    height: 2px;
    /* Thin line like in the image */
    background: #e0e0e0;
    /* Light gray background for the track */
    outline: none;
    /* Remove outline */
}

.range-progress::-webkit-slider-thumb {
    -webkit-appearance: none;
    /* Remove default thumb in Webkit */
    appearance: none;
    width: 0;
    /* Hide the thumb */
    height: 0;
    background: transparent;
    /* Ensure no visible thumb */
}

.range-progress::-moz-range-thumb {
    width: 0;
    /* Hide the thumb in Firefox */
    height: 0;
    background: transparent;
}

.range-progress::-ms-thumb {
    width: 0;
    /* Hide the thumb in IE/Edge */
    height: 0;
    background: transparent;
}

/* Style the filled progress (optional, to match the image) */
.range-progress::-webkit-slider-runnable-track {
    background: linear-gradient(to right, #4F46E5 var(--progress), #e0e0e0 var(--progress));
    /* Blue progress */
}

.range-progress::-moz-range-track {
    background: linear-gradient(to right, #4F46E5 var(--progress), #e0e0e0 var(--progress));
}

.range-progress::-ms-track {
    background: linear-gradient(to right, #4F46E5 var(--progress), #e0e0e0 var(--progress));
}

/* Dynamically set the progress using a CSS variable */
:deep(.range-progress) {
    --progress: v-bind(progressValue + '%');
}
</style>
