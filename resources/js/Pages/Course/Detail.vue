<template>
    <DefaultLayout>
        <div class="rounded-xl px-6 pt-6 overflow-y-auto h-[calc(100vh-6rem)] scrollbar-thin scrollbar-thumb-[#725DFF] scrollbar-track-gray-200">
            <div class="grid  grid-cols-4 gap-4">
                <div class="info col-span-3 mb-6">
                    <div class="info-content bg-white rounded-xl p-4">
                        <div class="name">
                            <h1 class="text-2xl font-bold">Course Name</h1>
                        </div>
                        <div class="image h-96">
                            <img :src="course" alt="Course Image" class="rounded-lg mt-4 h-full w-full object-cover">
                        </div>
                        <div class="mt-6 border-b ">
                            <nav class="flex space-x-8" aria-label="Tabs">
                                <button v-for="tab in tabs" :key="tab" @click="activeTab = tab" :class="[
                                    activeTab === tab
                                        ? 'text-indigo-600'
                                        : 'border-transparent text-gray-500 hover:text-gray-700 ',
                                    'whitespace-nowrap pb-4 px-1 border-b-2 font-medium text-sm outline-none focus:outline-none transition-all duration-300 ease-in-out'
                                ]">
                                    {{ tab }}
                                </button>
                            </nav>
                        </div>

                        <!-- Tabs Content -->
                        <div class="mt-4">
                            <div v-if="activeTab === 'Description'">
                                <p class="text-gray-600">
                                    Welcome to the Master Class: React JS and Tailwind CSS! 🚀 This course is designed to take you from zero to hero in modern web development.
                                    You will learn how to build dynamic, responsive web applications using React JS and style them beautifully with Tailwind CSS.
                                    By the end of this course, you will have a solid understanding of React's component-based architecture, state management, and how to create stunning user interfaces with Tailwind CSS.
                                    Whether you're a beginner or looking to enhance your skills, this course has something for everyone.
                                    Join us on this exciting journey and unlock the power of React JS and Tailwind CSS!
                                </p>
                                <p>
                                    This course covers the following topics:
                                    <ul class="list-disc pl-5 mt-2">
                                        <li>Introduction to React JS</li>
                                        <li>Components and Props</li>
                                        <li>State and Lifecycle</li>
                                        <li>Handling Events</li>
                                        <li>Conditional Rendering</li>
                                        <li>Lists and Keys</li>
                                        <li>Forms in React</li>
                                        <li>React Router for Navigation</li>
                                        <li>Introduction to Tailwind CSS</li>
                                        <li>Responsive Design with Tailwind CSS</li>
                                    </ul>
                                </p>
                                <p>
                                    <strong>Course Duration:</strong> 6 weeks
                                </p>
                                <p>
                                    <strong>Prerequisites:</strong> Basic understanding of HTML, CSS, and JavaScript.
                                </p>
                                <p>
                                    <strong>Who is this course for?</strong> This course is ideal for web developers who want to learn React JS and Tailwind CSS, as well as anyone interested in modern web development practices.
                                </p>
                                <p>
                                    <strong>What will you learn?</strong> By the end of this course, you will have a solid understanding of React's component-based architecture, state management, and how to create stunning user interfaces with Tailwind CSS.
                                </p>
                            </div>
                            <div v-else-if="activeTab === 'Tools'">
                                <p class="text-gray-600">List of tools and frameworks used in this course...</p>
                            </div>
                            <div v-else-if="activeTab === 'Reviews'">
                                <p class="text-gray-600">⭐ 4.9/5 - See what others are saying...</p>
                            </div>
                            <div v-else-if="activeTab === 'Classmates'">
                                <p class="text-gray-600">Meet your peers taking this course.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-span-1">
                    <div class="contact-content bg-white rounded-xl p-4">
                        <div class="bg-white rounded-xl">
                            <h2 class="text-lg font-semibold mb-4 text-gray-800">Overview</h2>
                            <div class="grid grid-cols-2 gap-4 text-center text-sm text-gray-600 mb-4">
                                <div class="flex flex-col items-center bg-[#F1EFFF] p-3 rounded-lg">
                                    <img :src="UsersGroupFill" alt="Users Group Icon">
                                    <div class="flex items-end ">
                                        <div class="text-xl font-bold text-gray-900">52</div>
                                        <div class="text-gray-400 ml-1">Enrolled</div>
                                    </div>
                                </div>
                                <div class="flex flex-col items-center bg-[#F1EFFF] p-3 rounded-lg">
                                    <img :src="NoteBookFill" alt="Notebook Icon">
                                    <div class="flex items-end ">
                                        <div class="text-xl font-bold text-gray-900">16</div>
                                        <div class="text-gray-400 ml-1">Modules</div>
                                    </div>
                                </div>
                                <div class="flex flex-col items-center bg-[#F1EFFF] p-3 rounded-lg">
                                    <img :src="PlayCircleFill" alt="Play Circle Icon">
                                    <div class="flex items-end ">
                                        <div class="text-xl font-bold text-gray-900">41</div>
                                        <div class="text-gray-400 ml-1">Videos</div>
                                    </div>
                                </div>
                                <div class="flex flex-col items-center bg-[#F1EFFF] p-3 rounded-lg">
                                    <img :src="StarFill" alt="Star Icon">
                                    <div class="flex items-end ">
                                        <div class="text-xl font-bold text-gray-900">50</div>
                                        <div class="text-gray-400 ml-1">Reviews</div>
                                    </div>
                                </div>
                            </div>

                            <div class="border-t pt-2">
                                <div class="flex items-center justify-item-center justify-between mb-2">
                                    <div class="text-sm text-[#725DFF]">Price</div>
                                    <div class="text-3xl font-bold text-indigo-600 ">$59.5</div>

                                </div>
                                <div class="grid gap-4 grid-cols-5">
                                    <button
                                        class="col-span-1 w-full bg-[#F1EFFF] text-white font-medium rounded-lg flex items-center justify-center">
                                        <img :src="basket" alt="">
                                    </button>

                                    <button
                                        class="col-span-4 w-full bg-indigo-500 text-white font-medium py-2 rounded-lg hover:bg-indigo-600 transition">
                                        Checkout
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-xl p-4 mt-4">
                        <h2 class="text-lg font-semibold mb-4 text-gray-800 ">About Mentor</h2>
                        <div class="flex items-center">
                            <div class=" rounded-full overflow-hidden">
                                <img :src="profile" alt="Mentor Profile" class="w-12 h-12 object-cover">
                            </div>
                            <div class="ml-4">
                                <div class="text-gray-800 font-semibold">John Doe</div>
                                <div class="text-gray-500 text-sm">Senior Developer</div>
                            </div>
                        </div>
                        <div class="">
                            <p class="text-gray-600 mt-2">
                                John is a seasoned developer with over 10 years of experience in web development...
                            </p>
                            <p class="text-gray-600 mt-2">
                                He has a strong background in JavaScript and has worked with various frameworks...
                            </p>
                            <p class="text-gray-600 mt-2">
                                John is passionate about teaching and enjoys sharing his knowledge with others.
                            </p>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl p-4 mt-4">
                        <h2 class="text-lg font-semibold mb-4 text-gray-800">Modules</h2>
                        <div class="list-modules">
                            <div class="module-item flex flex-col justify-between ">
                                <div class="flex items-center py-4 px-4 bg-[#F1EFFF] rounded-lg mb-2">
                                    <img :src="PlayCircleFill" alt="Module Icon" class="w-6 h-6 mr-2">
                                    <span class="text-gray-800">Module 1: Introduction to React</span>
                                </div>
                                <div class="flex items-center py-4 px-4 bg-[#F1EFFF] rounded-lg mb-2">
                                    <img :src="PlayCircleFill" alt="Module Icon" class="w-6 h-6 mr-2">
                                    <span class="text-gray-800">Module 2: React Components</span>
                                </div>
                                <div class="flex items-center py-4 px-4 bg-[#F1EFFF] rounded-lg mb-2">
                                    <img :src="PlayCircleFill" alt="Module Icon" class="w-6 h-6 mr-2">
                                    <span class="text-gray-800">Module 3: State Management</span>
                                </div>
                                <div class="flex items-center py-4 px-4 bg-[#F1EFFF] rounded-lg mb-2">
                                    <img :src="PlayCircleFill" alt="Module Icon" class="w-6 h-6 mr-2">
                                    <span class="text-gray-800">Module 4: React Hooks</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </DefaultLayout>
</template>

<script setup>
import DefaultLayout from '@/Layouts/DefaultLayout.vue';
import { ref } from 'vue';
import course from '../../../../resources/css/assets/image/course.jpg';
import UsersGroupFill from '../../../../resources/css/assets/icon/UsersGroupFill.svg';
import NoteBookFill from '../../../../resources/css/assets/icon/NotebookFill.svg';
import PlayCircleFill from '../../../../resources/css/assets/icon/PlayCircleFill2.svg';
import StarFill from '../../../../resources/css/assets/icon/StarFill.svg';
import basket from "../../../../resources/css/assets/icon/shopping2.svg";
import profile from "../../../../resources/css/assets/image/profile.jpg";




const tabs = ['Description', 'Tools', 'Reviews', 'Classmates'];
const activeTab = ref('Description');



</script>
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
