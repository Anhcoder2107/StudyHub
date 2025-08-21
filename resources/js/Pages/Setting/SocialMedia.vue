<template>
  <SettingLayout>
    <div class="py-6 px-6 space-y-10">
      <section>
        <h1 class="text-xl font-semibold">Social Media</h1>
        <p class="text-sm text-gray-500 mt-1">
          Connect your social media accounts to easily log in and share activities.
        </p>

        <div class="mt-6 space-y-4">
          <div
            v-for="account in accounts"
            :key="account.name"
            class="flex justify-between items-center border rounded-lg p-4 shadow-sm hover:shadow-md transition"
          >
            <div class="flex items-center space-x-3">
              <img :src="account.icon" class="w-6 h-6" />
              <span class="font-medium">{{ account.name }}</span>
            </div>
            <button
              @click="toggleConnection(account)"
              class="px-4 py-1 rounded-md font-semibold shadow-sm transition"
              :class="account.connected
                ? 'bg-red-100 text-red-600 hover:bg-red-200'
                : 'bg-green-100 text-green-600 hover:bg-green-200'"
            >
              {{ account.connected ? 'Disconnect' : 'Connect' }}
            </button>
          </div>
        </div>
      </section>
    </div>
  </SettingLayout>
</template>

<script setup>
import { ref } from 'vue'
import SettingLayout from '@/Layouts/SettingLayout.vue'

const accounts = ref([
  { name: 'Google', icon: 'https://cdn-icons-png.flaticon.com/512/281/281764.png', connected: true },
  { name: 'Facebook', icon: 'https://cdn-icons-png.flaticon.com/512/733/733547.png', connected: false },
  { name: 'GitHub', icon: 'https://cdn-icons-png.flaticon.com/512/733/733609.png', connected: false },
])

const toggleConnection = (account) => {
  account.connected = !account.connected
  console.log(`${account.name} connection:`, account.connected)
}
</script>
