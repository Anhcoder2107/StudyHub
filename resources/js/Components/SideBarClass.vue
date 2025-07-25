<template>
    <nav class="">
        <div class="">

        </div>

    </nav>

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

<style>
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
