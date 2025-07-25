<template>
  <div :class="['max-w-lg mb-4', isSelf ? 'ml-auto text-right flex justify-end' : 'flex']">
    <div class="flex gap-3 items-start" :class="{ 'flex-row-reverse text-right': isSelf }">

      <!-- Avatar -->
      <img :src="imageProfile || defaultProfile" alt="Avatar" class="w-8 h-8 rounded-full mt-1" />

      <!-- Nội dung -->
      <div>
        <p class="text-sm font-semibold mb-1">{{ name }}</p>
        <div
          class="p-3 rounded-xl shadow-sm inline-block"
          :class="isSelf ? 'bg-[#725DFF] text-white' : 'bg-white text-black'"
        >
          <p class="text-sm whitespace-pre-line">{{ message }}</p>
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
  imageProfile: String
})

import defaultProfile from '../../../css/assets/image/profile.jpg';
</script>
