<template>
    <div class="rounded-4xl bg-white">
        <div class=" overflow-y-auto h-[calc(100vh-4rem)] scrollbar-thin scrollbar-thumb-[#725DFF] scrollbar-track-gray-200">
            <nav class="">
                <div class="">
                    <div class="text-gray-400 text-sm font-regular uppercase">
                        Profile
                    </div>
                    <ul class="space-y-2">
                        <li>
                            <Link href="/settings"
                                class="block px-6 py-3 font-regular text-black hover:bg-[#F1EFFF] hover:text-[#725DFF] hover:font-semibold rounded-2xl">
                                <Icon name="UserRound" class="inline-block mr-3" />
                                <span class="inline-block">Edit Profile</span>
                            </Link>
                        </li>
                        <li>
                            <Link href="/settings/change-password"
                                class="block px-6 py-3 font-regular text-black hover:bg-[#F1EFFF] hover:text-[#725DFF] hover:font-semibold rounded-2xl">
                                <Icon name="Lock" class="inline-block mr-3" />
                                <span class="inline-block">Change Password</span>
                            </Link>
                        </li>
                        <li>
                            <Link href="/messages"
                                class="block px-6 py-3 font-regular text-black hover:bg-[#F1EFFF] hover:text-[#725DFF] hover:font-semibold rounded-2xl">
                                <Icon name="MessageSquareDot" class="inline-block mr-3" />
                                <span class="inline-block">Notifications</span>
                            </Link>
                        </li>
                        <li>
                            <a href="#"
                                class="block px-6 py-3 font-regular text-black hover:bg-[#F1EFFF] hover:text-[#725DFF] hover:font-semibold rounded-2xl">
                                <Icon name="Gift" class="inline-block mr-3" />
                                <span class="inline-block">Subscription</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="mt-6">
                    <div class="text-gray-400 text-sm font-regular uppercase">
                        Preference
                    </div>
                    <ul class="space-y-2">
                        <li>
                            <Link href="/courses/discover"
                                class="block px-6 py-3 font-regular text-black hover:bg-[#F1EFFF] hover:text-[#725DFF] hover:font-semibold rounded-2xl">
                                <Icon name="Languages" class="inline-block mr-3" />
                                <span class="inline-block">Language</span>
                            </Link>
                        </li>
                        <li>
                            <Link href="/courses"
                                class="block px-6 py-3 font-regular text-black hover:bg-[#F1EFFF] hover:text-[#725DFF] hover:font-semibold rounded-2xl">
                                <Icon name="Palette" class="inline-block mr-3" />
                                <span class="inline-block">Themes</span>
                            </Link>
                        </li>
                    </ul>
                </div>
                <div class="mt-6">
                    <div class="text-gray-400 text-sm font-regular uppercase">
                        Apps
                    </div>
                    <ul class="space-y-2">
                        <li>
                            <Link href="/classes"
                                class="block px-6 py-3 font-regular text-black hover:bg-[#F1EFFF] hover:text-[#725DFF] hover:font-semibold rounded-2xl">
                                <Icon name="Share2" class="inline-block mr-3" />
                                <span class="inline-block">Social Media</span>
                            </Link>
                        </li>
                        <li>
                            <a href="#"
                                class="block px-6 py-3 font-regular text-black hover:bg-[#F1EFFF] hover:text-[#725DFF] hover:font-semibold rounded-2xl">
                                <Icon name="Blocks" class="inline-block mr-3" />
                                <span class="inline-block">Apps Intergration</span>
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

import Icon from '@/Components/LucideIcon.vue';
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
