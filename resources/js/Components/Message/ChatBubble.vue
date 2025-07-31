<template>
    <div :class="['max-w-lg mb-4', isSelf ? 'ml-auto text-right flex justify-end' : 'flex']">
        <div :class="['flex gap-3 items-start', isSelf ? 'flex-row-reverse text-right' : '']">
            <img :src="imageProfile || defaultProfile" alt="Avatar" class="w-8 h-8 rounded-full mt-1" />
            <div>
                <p class="text-sm font-semibold mb-1" v-if="!isSelf">{{ name }}</p>
                <div class="p-3 rounded-xl shadow-sm inline-block"
                    :class="isSelf ? 'bg-[#725DFF] text-white' : 'bg-white text-black'">
                    <p v-if="message" class="text-sm whitespace-pre-line">{{ message }}</p>
                    <img v-if="image" :src="image" class="mt-2 max-w-xs rounded-lg border" />
                </div>
                <p class="text-xs text-gray-400 mt-1">{{ time }}</p>
            </div>
        </div>
    </div>
</template>

<script setup>
const props = defineProps({
    name: String,
    message: String,
    time: String,
    isSelf: Boolean,
    imageProfile: String,
    image: String
})

import defaultProfile from '../../../css/assets/image/profile.jpg';
</script>
