<template>
    <div
        class="flex items-center justify-between px-6 py-4 h-20 rounded-2xl bg-white ml-6 mr-6 ">
        <div class="getting-text">
            <div class="text-xl font-semibold ">
                Welcome Back, Peter!
            </div>
            <div class="text-base font-regular text-gray-400">
                Let’s boost your knowledge today and learn a new things
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
            <div class="rounded-full overflow-hidden flex items-center justify-center" style="width:46px; height:46px;">
                <img :src="user" alt="User Icon" class="w-full h-full object-cover rounded-full">
            </div>
        </div>
    </div>
</template>

<script setup>
import basket from '../../css/assets/icon/shopping.svg';
import search from '../../css/assets/icon/search.svg';
import bell from '../../css/assets/icon/Bell.svg';
import user from '../../css/assets/image/profile.jpg';




</script>
