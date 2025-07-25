<template>
    <div :class="['p-4  cursor-pointer', active ? 'bg-[#F1EFFF]' : 'hover:bg-gray-100']">
        <div class=" flex items-center gap-3">
            <img :src="imageProfile" alt="Avatar" class="w-10 h-10 rounded-full" />
            <div class="w-full">
                <div class="flex justify-between items-center">
                    <h4 class="text-sm font-medium">{{ name }}</h4>
                    <span class="text-xs text-gray-400">{{ time }}</span>
                </div>
                <div class="">
                    <p class="text-xs text-gray-500 truncate">{{ message }}</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
defineProps(['name', 'message', 'time', 'active'])
import imageProfile from '../../../css/assets/image/profile.jpg';

</script>
