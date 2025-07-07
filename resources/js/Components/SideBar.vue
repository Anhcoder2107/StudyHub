<template>

    <div class="fixed top-0 left-0 h-full w-64 bg-white">
        <div class="flex items-center justify-center h-16  text-2xl font-semibold">
            <img :src="logo" alt="Logo" class="h-8 w-8 mr-2" />
            <span>StudyHub</span>
        </div>
        <nav class="mt-4">
            <div class="py-2 px-4">
                <div class="text-gray-400 text-sm font-regular uppercase">
                    General
                </div>
                <ul class="space-y-2">
                    <li>
                        <a href="#"
                            class="block px-6 py-3 font-regular text-black hover:bg-[#F1EFFF] hover:text-[#725DFF] hover:font-semibold rounded-2xl"
                            @mouseover="dashboardIcon = DashboardFill"
                            @mouseleave="dashboardIcon = Dashboard">
                            <img :src="dashboardIcon" alt="Dashboard Icon" class="inline-block mr-3"/>
                            <span class="inline-block">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="block px-6 py-3 font-regular text-black hover:bg-[#F1EFFF] hover:text-[#725DFF] hover:font-semibold rounded-2xl"
                            @mouseover="calendarIcon = CalendarFill"
                            @mouseleave="calendarIcon = Calendar">
                            <img :src="calendarIcon" alt="Calendar Icon" class="inline-block mr-3" />
                            <span class="inline-block">Calendar</span>
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="block px-6 py-3 font-regular text-black hover:bg-[#F1EFFF] hover:text-[#725DFF] hover:font-semibold rounded-2xl"
                            @mouseover="messageIcon = MessageFill"
                            @mouseleave="messageIcon = Message">
                            <img :src="messageIcon" alt="Message Icon" class="inline-block mr-3" />
                            <span class="inline-block">Messages</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="py-2 px-4">
                <div class="text-gray-400 text-sm font-regular uppercase">
                    General
                </div>
                <ul class="space-y-2">
                    <li>
                        <a href="#"
                            class="block px-6 py-3 font-regular text-black hover:bg-[#F1EFFF] hover:text-[#725DFF] hover:text-blue-500 hover:font-semibold hover:fill-blue-500 rounded-2xl"
                            @mouseover="dashboardIcon = DashboardFill"
                            @mouseleave="dashboardIcon = Dashboard">
                            <img :src="Dashboard" alt="Dashboard Icon" class="inline-block mr-3"/>
                            <span class="inline-block">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="block px-6 py-3 font-regular text-black hover:bg-[#F1EFFF] hover:text-[#725DFF] hover:font-semibold rounded-2xl"
                            @mouseover="calendarIcon = CalendarFill"
                            @mouseleave="calendarIcon = Calendar">
                            <img :src="Calendar" alt="Calendar Icon" class="inline-block mr-3" />
                            <span class="inline-block">Calendar</span>
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="block px-6 py-3 font-regular text-black hover:bg-[#F1EFFF] hover:text-[#725DFF] hover:font-semibold rounded-2xl"
                            @mouseover="messageIcon = MessageFill"
                            @mouseleave="messageIcon = Message">
                            <img :src="Message" alt="Message Icon" class="inline-block mr-3" />
                            <span class="inline-block">Messages</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</template>

<script setup>
import logo from '../../css/assets/icon/logo.svg';
import Dashboard from '../../css/assets/icon/dashboard.svg';
import DashboardFill from '../../css/assets/icon/dashboardFill.svg';
import Calendar from '../../css/assets/icon/Calendar.svg';
import CalendarFill from '../../css/assets/icon/CalendarFill.svg';
import Message from '../../css/assets/icon/Message.svg';
import MessageFill from '../../css/assets/icon/MessageFill.svg';

import { ref } from 'vue';
const dashboardIcon = ref(Dashboard);
const calendarIcon = ref(Calendar);
const messageIcon = ref(Message);

</script>
