<template>

    <div class="fixed top-0 left-0 h-full w-64 bg-white">
        <div class="flex items-center justify-center h-16  text-2xl font-semibold sticky top-0 bg-white z-10">
            <img :src="logo" alt="Logo" class="h-8 w-8 mr-2" />
            <span>StudyHub</span>
        </div>
        <div
            class=" overflow-y-auto h-[calc(100vh-4rem)] scrollbar-thin scrollbar-thumb-[#725DFF] scrollbar-track-gray-200">
            <nav class="mt-4 ml-4">
                <div class="py-2 px-4">
                    <div class="text-gray-400 text-sm font-regular uppercase">
                        General
                    </div>
                    <ul class="space-y-2">
                        <li>
                            <Link href="/dashboard" :class="[
                                'block px-6 py-3 font-regular rounded-2xl',
                                isActive('/dashboard')
                                    ? 'bg-[#F1EFFF] text-[#725DFF] font-semibold'
                                    : 'text-black hover:bg-[#F1EFFF] hover:text-[#725DFF] hover:font-semibold'
                            ]" @mouseover="dashboardIcon = DashboardFill" @mouseleave="dashboardIcon = Dashboard">
                            <img :src="isActive('/dashboard') || dashboardIcon === DashboardFill ? DashboardFill : Dashboard"
                                alt="Dashboard Icon" class="inline-block mr-3" />
                            <span class="inline-block">Dashboard</span>
                            </Link>
                        </li>
                        <li>
                            <Link href="/calendar" :class="[
                                'block px-6 py-3 font-regular rounded-2xl',
                                isActive('/calendar')
                                    ? 'bg-[#F1EFFF] text-[#725DFF] font-semibold'
                                    : 'text-black hover:bg-[#F1EFFF] hover:text-[#725DFF] hover:font-semibold'
                            ]" @mouseover="calendarIcon = CalendarFill" @mouseleave="calendarIcon = Calendar">
                            <img :src="isActive('/calendar') || calendarIcon === CalendarFill ? CalendarFill : Calendar"
                                alt="Calendar Icon" class="inline-block mr-3" />
                            <span class="inline-block">Calendar</span>
                            </Link>
                        </li>
                        <li>
                            <Link href="/messages" :class="[
                                'block px-6 py-3 font-regular rounded-2xl',
                                isActive('/messages')
                                    ? 'bg-[#F1EFFF] text-[#725DFF] font-semibold'
                                    : 'text-black hover:bg-[#F1EFFF] hover:text-[#725DFF] hover:font-semibold'
                            ]" @mouseover="messageIcon = MessageFill" @mouseleave="messageIcon = Message">
                            <img :src="isActive('/messages') || messageIcon === MessageFill ? MessageFill : Message"
                                alt="Message Icon" class="inline-block mr-3" />
                            <span class="inline-block">Messages</span>
                            </Link>
                        </li>
                        <li>
                            <a href="#" :class="[
                                'block px-6 py-3 font-regular rounded-2xl',
                                isActive('#')
                                    ? 'bg-[#F1EFFF] text-[#725DFF] font-semibold'
                                    : 'text-black hover:bg-[#F1EFFF] hover:text-[#725DFF] hover:font-semibold'
                            ]" @mouseover="feedIcon = FeedFill" @mouseleave="feedIcon = Feed">
                                <img :src="getIcon(FeedFill, Feed, '#')" alt="Feed Icon" class="inline-block mr-3" />
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
                            <Link href="/courses/discover" :class="[
                                'block px-6 py-3 font-regular rounded-2xl',
                                isActive('/courses/discover')
                                    ? 'bg-[#F1EFFF] text-[#725DFF] font-semibold'
                                    : 'text-black hover:bg-[#F1EFFF] hover:text-[#725DFF] hover:font-semibold'
                            ]" @mouseover="discoverIcon = DiscoverFill" @mouseleave="discoverIcon = Discover">
                            <img :src="isActive('/courses/discover') || discoverIcon === DiscoverFill ? DiscoverFill : Discover"
                                alt="Dashboard Icon" class="inline-block mr-3" />
                            <span class="inline-block">Discover</span>
                            </Link>
                        </li>
                        <li>
                            <Link href="/courses" :class="[
                                'block px-6 py-3 font-regular rounded-2xl',
                                isActive('/courses')
                                    ? 'bg-[#F1EFFF] text-[#725DFF] font-semibold'
                                    : 'text-black hover:bg-[#F1EFFF] hover:text-[#725DFF] hover:font-semibold'
                            ]" @mouseover="noteBookIcon = NoteBookFill" @mouseleave="noteBookIcon = NoteBook">
                            <img :src="isActive('/courses') || noteBookIcon === NoteBookFill ? NoteBookFill : NoteBook"
                                alt="Calendar Icon" class="inline-block mr-3" />
                            <span class="inline-block">My Courses</span>
                            </Link>
                        </li>
                    </ul>
                </div>
                <div class="py-2 px-4">
                    <div class="text-gray-400 text-sm font-regular uppercase">
                        Class
                    </div>
                    <ul class="space-y-2">
                        <li>
                            <Link href="/classes" :class="[
                                'block px-6 py-3 font-regular rounded-2xl',
                                isActive('/classes')
                                    ? 'bg-[#F1EFFF] text-[#725DFF] font-semibold'
                                    : 'text-black hover:bg-[#F1EFFF] hover:text-[#725DFF] hover:font-semibold'
                            ]" @mouseover="usersGroupIcon = UsersGroupFill"
                                @mouseleave="usersGroupIcon = UsersGroup">
                            <img :src="isActive('/classes') || usersGroupIcon === UsersGroupFill ? UsersGroupFill : UsersGroup"
                                alt="Dashboard Icon" class="inline-block mr-3" />
                            <span class="inline-block">My Class</span>
                            </Link>
                        </li>
                        <li>
                            <a href="#" :class="[
                                'block px-6 py-3 font-regular rounded-2xl',
                                isActive('/examination')
                                    ? 'bg-[#F1EFFF] text-[#725DFF] font-semibold'
                                    : 'text-black hover:bg-[#F1EFFF] hover:text-[#725DFF] hover:font-semibold'
                            ]" @mouseover="bookmarkIcon = BookmarkFill" @mouseleave="bookmarkIcon = Bookmark">
                                <img :src="isActive('/examination') || bookmarkIcon === BookmarkFill ? BookmarkFill : Bookmark"
                                    alt="Dashboard Icon" class="inline-block mr-3" />
                                <span class="inline-block">Examination</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" :class="[
                                'block px-6 py-3 font-regular rounded-2xl',
                                isActive('#')
                                    ? 'bg-[#F1EFFF] text-[#725DFF] font-semibold'
                                    : 'text-black hover:bg-[#F1EFFF] hover:text-[#725DFF] hover:font-semibold'
                            ]" @mouseover="bookIcon = BookFill" @mouseleave="bookIcon = Book">
                                <img :src="isActive('#') || bookIcon === BookFill ? BookFill : Book"
                                    alt="Dashboard Icon" class="inline-block mr-3" />
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
                            <Link href="/support" :class="[
                                'block px-6 py-3 font-regular rounded-2xl',
                                isActive('/support')
                                    ? 'bg-[#F1EFFF] text-[#725DFF] font-semibold'
                                    : 'text-black hover:bg-[#F1EFFF] hover:text-[#725DFF] hover:font-semibold'
                            ]" @mouseover="infoCircleIcon = InfoCircleFill"
                                @mouseleave="infoCircleIcon = InfoCircle">
                            <img :src="isActive('/support') || infoCircleIcon === InfoCircleFill ? InfoCircleFill : InfoCircle"
                                alt="Support Icon" class="inline-block mr-3" />
                            <span class="inline-block">Support</span>
                            </Link>
                        </li>
                        <li>
                            <Link href="/settings" :class="[
                                'block px-6 py-3 font-regular rounded-2xl',
                                isActive('/settings')
                                    ? 'bg-[#F1EFFF] text-[#725DFF] font-semibold'
                                    : 'text-black hover:bg-[#F1EFFF] hover:text-[#725DFF] hover:font-semibold'
                            ]" @mouseover="settingIcon = SettingFill" @mouseleave="settingIcon = Setting">
                            <img :src="isActive('/settings') || settingIcon === SettingFill ? SettingFill : Setting"
                                alt="Settings Icon" class="inline-block mr-3" />
                            <span class="inline-block">Settings</span>
                            </Link>
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
import { Link } from '@inertiajs/vue3';

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

import { usePage } from '@inertiajs/vue3';
import { computed } from 'vue';
const page = usePage();
const currentUrl = computed(() => page.url);
// console.log(page.url);
const isActive = (path) => currentUrl.value === path;

const getIcon = (activeIcon, inactiveIcon, path) =>
    isActive(path) ? activeIcon : inactiveIcon;


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
