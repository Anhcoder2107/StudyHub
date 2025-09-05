<template>
    <DefaultLayout>
        <div
            class="p-6   overflow-y-auto h-[calc(100vh-6rem)] scrollbar-thin scrollbar-thumb-[#725DFF] scrollbar-track-gray-200">
            <!-- Payment List -->
            <div class="bg-white rounded-2xl shadow">
                <!-- Row -->
                <div v-for="(payment, index) in payments" :key="index"
                    class="flex items-center justify-between gap-6 px-6 py-4 hover:bg-gray-50 transition">
                    <!-- Course Info -->
                    <div class="flex items-center gap-4 flex-1 min-w-0">
                        <img :src="payment.image" alt="course"
                            class="w-12 h-12 rounded-lg object-cover flex-shrink-0" />
                        <div class="truncate">
                            <h3 class="font-medium text-gray-800 text-sm leading-tight truncate">
                                {{ payment.title }}
                            </h3>
                            <p class="text-xs text-gray-500">
                                {{ payment.modules }} Modules • {{ payment.videos }} Videos
                            </p>
                        </div>
                    </div>

                    <!-- Price -->
                    <div class="w-28 text-sm shrink-0">
                        <p class="text-gray-500">Price</p>
                        <p class="font-medium">${{ payment.price }}</p>
                    </div>

                    <!-- Date / Time -->
                    <div class="w-40 text-sm shrink-0">
                        <p class="text-gray-500">
                            {{ payment.date ? "Date" : "Time Remaining" }}
                        </p>
                        <p :class="[
                            payment.date
                                ? 'text-gray-700'
                                : payment.status === 'Pending'
                                    ? 'text-red-500'
                                    : 'text-green-600'
                        ]" class="font-medium">
                            {{ payment.date || payment.timeRemaining }}
                        </p>
                    </div>

                    <!-- Status -->
                    <div class="w-40 flex items-center justify-between shrink-0">
                        <div>
                            <p class="text-gray-500 text-sm">Status</p>
                            <p :class="{
                                'text-yellow-500 font-semibold': payment.status === 'Pending',
                                'text-green-500 font-semibold': payment.status === 'Succeed',
                                'text-red-500 font-semibold': payment.status === 'Failed'
                            }">
                                {{ payment.status }}
                            </p>
                        </div>

                        <!-- Menu -->
                        <button class="ml-4 p-2 hover:bg-gray-100 rounded-full">
                            <Icon name="EllipsisVertical" class="w-5 h-5 text-gray-500" />
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </DefaultLayout>
</template>

<script setup>
import DefaultLayout from "@/Layouts/DefaultLayout.vue";
import Icon from "@/Components/LucideIcon.vue";
import course from '../../../css/assets/image/course.jpg';


const payments = [
    {
        title: "Envato Mastery: Build a Passive Income from Selling Template",
        modules: 16,
        videos: 41,
        price: 59.5,
        timeRemaining: "01:01:32",
        status: "Pending",
        image: course
    },
    {
        title: "Learn from Basic: React Javascript",
        modules: 21,
        videos: 50,
        price: 59.5,
        timeRemaining: "00:09:15",
        status: "Pending",
        image: course
    },
    {
        title: "Master Class: React JS and Tailwind CSS",
        modules: 19,
        videos: 45,
        price: 59.5,
        date: "19/11/2023",
        status: "Failed",
        image: course
    },
    {
        title: "Full-Stack Laravel React JS: Build Streaming Website",
        modules: 12,
        videos: 30,
        price: 59.5,
        date: "20/10/2023",
        status: "Succeed",
        image: course
    },
    {
        title: "Full-Stack Laravel React JS: Build Streaming Website",
        modules: 12,
        videos: 30,
        price: 59.5,
        date: "20/10/2023",
        status: "Succeed",
        image: course
    },
    {
        title: "Full-Stack Laravel React JS: Build Streaming Website",
        modules: 12,
        videos: 30,
        price: 59.5,
        date: "20/10/2023",
        status: "Succeed",
        image: course
    },
    {
        title: "Full-Stack Laravel React JS: Build Streaming Website",
        modules: 12,
        videos: 30,
        price: 59.5,
        date: "20/10/2023",
        status: "Succeed",
        image: course
    },
    {
        title: "Full-Stack Laravel React JS: Build Streaming Website",
        modules: 12,
        videos: 30,
        price: 59.5,
        date: "20/10/2023",
        status: "Succeed",
        image: course
    },
    {
        title: "Full-Stack Laravel React JS: Build Streaming Website",
        modules: 12,
        videos: 30,
        price: 59.5,
        date: "20/10/2023",
        status: "Succeed",
        image: course
    },
    {
        title: "Full-Stack Laravel React JS: Build Streaming Website",
        modules: 12,
        videos: 30,
        price: 59.5,
        date: "20/10/2023",
        status: "Succeed",
        image: course
    },
    {
        title: "Full-Stack Laravel React JS: Build Streaming Website",
        modules: 12,
        videos: 30,
        price: 59.5,
        date: "20/10/2023",
        status: "Succeed",
        image: course
    },
    {
        title: "Full-Stack Laravel React JS: Build Streaming Website",
        modules: 12,
        videos: 30,
        price: 59.5,
        date: "20/10/2023",
        status: "Succeed",
        image: course
    },
    {
        title: "Full-Stack Laravel React JS: Build Streaming Website",
        modules: 12,
        videos: 30,
        price: 59.5,
        date: "20/10/2023",
        status: "Succeed",
        image: course
    },
    {
        title: "Full-Stack Laravel React JS: Build Streaming Website",
        modules: 12,
        videos: 30,
        price: 59.5,
        date: "20/10/2023",
        status: "Succeed",
        image: course
    }
];
</script>
