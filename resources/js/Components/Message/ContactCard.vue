<template>
    <div role="button" :class="containerClass" @click="$emit('select', { name })" aria-pressed="false" tabindex="0"
        @keyup.enter="$emit('select', { name })">
        <div class="flex items-center gap-3">
            <img :src="imageProfile || defaultAvatar" alt="Avatar" class="w-10 h-10 rounded-full flex-shrink-0" />
            <div class="w-full min-w-0">
                <div class="flex justify-between items-center">
                    <h4 class="text-sm font-medium truncate mb-0">{{ name }}</h4>
                    <span class="text-xs text-gray-400 flex-shrink-0 ml-2">{{ time }}</span>
                </div>
                <div>
                    <p class="text-xs text-gray-500 truncate mb-0">{{ message }}</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { computed } from 'vue'
import defaultAvatar from '../../../css/assets/image/profile.jpg'

const props = defineProps({
    name: { type: String, required: true },
    message: { type: String, default: '' },
    time: { type: String, default: '' },
    active: { type: Boolean, default: false },
    imageProfile: { type: String, default: '' },
})

const containerClass = computed(() => {
    return [
        'p-4 cursor-pointer rounded-md transition',
        props.active ? 'bg-[#F1EFFF]' : 'hover:bg-gray-100'
    ].join(' ')
})
</script>

<style scoped>
/* giữ sạch sẽ, có thể mở rộng nếu cần */
</style>
