<template>

    <div class="fixed top-0 left-0 h-full w-64 bg-white">
        <div class="flex items-center justify-center h-16  text-2xl font-semibold sticky top-0 bg-white z-10">
            <img :src="logo" alt="Logo" class="h-8 w-8 mr-2" />
            <span>StudyHub</span>
        </div>
        <div class=" overflow-y-auto h-[calc(100vh-4rem)] scrollbar-thin scrollbar-thumb-[#725DFF] scrollbar-track-gray-200">
            <nav class="mt-4 ml-4">
                <div class="py-2 px-4">
                    <div class="text-gray-400 text-sm font-regular uppercase">
                        General
                    </div>
                    <ul class="space-y-2">
                        <li>
                            <a href="#"
                                class="block px-6 py-3 font-regular text-black hover:bg-[#F1EFFF] hover:text-[#725DFF] hover:font-semibold rounded-2xl"
                                @mouseover="dashboardIcon = DashboardFill" @mouseleave="dashboardIcon = Dashboard">
                                <img :src="dashboardIcon" alt="Dashboard Icon" class="inline-block mr-3" />
                                <span class="inline-block">Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="block px-6 py-3 font-regular text-black hover:bg-[#F1EFFF] hover:text-[#725DFF] hover:font-semibold rounded-2xl"
                                @mouseover="calendarIcon = CalendarFill" @mouseleave="calendarIcon = Calendar">
                                <img :src="calendarIcon" alt="Calendar Icon" class="inline-block mr-3" />
                                <span class="inline-block">Calendar</span>
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="block px-6 py-3 font-regular text-black hover:bg-[#F1EFFF] hover:text-[#725DFF] hover:font-semibold rounded-2xl"
                                @mouseover="messageIcon = MessageFill" @mouseleave="messageIcon = Message">
                                <img :src="messageIcon" alt="Message Icon" class="inline-block mr-3" />
                                <span class="inline-block">Messages</span>
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="block px-6 py-3 font-regular text-black hover:bg-[#F1EFFF] hover:text-[#725DFF] hover:font-semibold rounded-2xl"
                                @mouseover="feedIcon = FeedFill" @mouseleave="feedIcon = Feed">
                                <img :src="feedIcon" alt="Feed Icon" class="inline-block mr-3" />
                                <span class="inline-block">Blog</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="py-2 px-4">
                    <div class="text-gray-400 text-sm font-regular uppercase">
                        Courses
                    </div>
                    <ul class="space-y-2">
                        <li>
                            <a href="#"
                                class="block px-6 py-3 font-regular text-black hover:bg-[#F1EFFF] hover:text-[#725DFF] hover:font-semibold rounded-2xl"
                                @mouseover="discoverIcon = DiscoverFill" @mouseleave="discoverIcon = Discover">
                                <img :src="discoverIcon" alt="Dashboard Icon" class="inline-block mr-3" />
                                <span class="inline-block">Discover</span>
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="block px-6 py-3 font-regular text-black hover:bg-[#F1EFFF] hover:text-[#725DFF] hover:font-semibold rounded-2xl"
                                @mouseover="noteBookIcon = NoteBookFill" @mouseleave="noteBookIcon = NoteBook">
                                <img :src="noteBookIcon" alt="Calendar Icon" class="inline-block mr-3" />
                                <span class="inline-block">My Courses</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="py-2 px-4">
                    <div class="text-gray-400 text-sm font-regular uppercase">
                        Class
                    </div>
                    <ul class="space-y-2">
                        <li>
                            <a href="#"
                                class="block px-6 py-3 font-regular text-black hover:bg-[#F1EFFF] hover:text-[#725DFF] hover:font-semibold rounded-2xl"
                                @mouseover="usersGroupIcon = UsersGroupFill" @mouseleave="usersGroupIcon = UsersGroup">
                                <img :src="usersGroupIcon" alt="Dashboard Icon" class="inline-block mr-3" />
                                <span class="inline-block">My Class</span>
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="block px-6 py-3 font-regular text-black hover:bg-[#F1EFFF] hover:text-[#725DFF] hover:font-semibold rounded-2xl"
                                @mouseover="bookmarkIcon = BookmarkFill" @mouseleave="bookmarkIcon = Bookmark">
                                <img :src="bookmarkIcon" alt="Dashboard Icon" class="inline-block mr-3" />
                                <span class="inline-block">Examination</span>
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="block px-6 py-3 font-regular text-black hover:bg-[#F1EFFF] hover:text-[#725DFF] hover:font-semibold rounded-2xl"
                                @mouseover="bookIcon = BookFill" @mouseleave="bookIcon = Book">
                                <img :src="bookIcon" alt="Dashboard Icon" class="inline-block mr-3" />
                                <span class="inline-block">Exercise</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="py-2 px-4">
                    <div class="text-gray-400 text-sm font-regular uppercase">
                        Other
                    </div>
                    <ul class="space-y-2">
                        <li>
                            <a href="#"
                                class="block px-6 py-3 font-regular text-black hover:bg-[#F1EFFF] hover:text-[#725DFF] hover:font-semibold rounded-2xl"
                                @mouseover="infoCircleIcon = InfoCircleFill" @mouseleave="infoCircleIcon = InfoCircle">
                                <img :src="infoCircleIcon" alt="Dashboard Icon" class="inline-block mr-3" />
                                <span class="inline-block">Support</span>
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="block px-6 py-3 font-regular text-black hover:bg-[#F1EFFF] hover:text-[#725DFF] hover:font-semibold rounded-2xl"
                                @mouseover="settingIcon = SettingFill" @mouseleave="settingIcon = Setting">
                                <img :src="settingIcon" alt="Dashboard Icon" class="inline-block mr-3" />
                                <span class="inline-block">Setting</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
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
import Discover from '../../css/assets/icon/Global.svg';
import DiscoverFill from '../../css/assets/icon/GlobalFill.svg';
import NoteBook from '../../css/assets/icon/Notebook.svg';
import NoteBookFill from '../../css/assets/icon/NotebookFill.svg';
import UsersGroup from '../../css/assets/icon/UsersGroup.svg';
import UsersGroupFill from '../../css/assets/icon/UsersGroupFill.svg';
import Bookmark from '../../css/assets/icon/bookmark.svg';
import BookmarkFill from '../../css/assets/icon/bookmarkFill.svg';
import Book from '../../css/assets/icon/book.svg';
import BookFill from '../../css/assets/icon/bookFill.svg';
import Setting from '../../css/assets/icon/Settings.svg';
import SettingFill from '../../css/assets/icon/SettingsFill.svg';
import Feed from '../../css/assets/icon/feed.svg';
import FeedFill from '../../css/assets/icon/feedFill.svg';


import InfoCircle from '../../css/assets/icon/InfoCircle.svg';
import InfoCircleFill from '../../css/assets/icon/InfoCircleFill.svg';

import { ref } from 'vue';
const dashboardIcon = ref(Dashboard);
const calendarIcon = ref(Calendar);
const messageIcon = ref(Message);
const discoverIcon = ref(Discover);
const noteBookIcon = ref(NoteBook);
const usersGroupIcon = ref(UsersGroup);
const bookmarkIcon = ref(Bookmark);
const bookIcon = ref(Book);
const settingIcon = ref(Setting);
const infoCircleIcon = ref(InfoCircle);
const feedIcon = ref(Feed);

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
