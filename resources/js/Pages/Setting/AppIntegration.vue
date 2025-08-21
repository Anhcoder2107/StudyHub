<template>
    <SettingLayout>
        <div class="py-6 px-6 space-y-10">
            <section>
                <h1 class="text-xl font-semibold">App Integrations</h1>
                <p class="text-sm text-gray-500 mt-1">
                    Manage third-party applications connected to your account.
                </p>

                <div class="mt-6 space-y-4">
                    <div v-for="app in apps" :key="app.name"
                        class="flex justify-between items-center border rounded-lg p-4 shadow-sm hover:shadow-md transition">
                        <div>
                            <h2 class="font-medium">{{ app.name }}</h2>
                            <p class="text-xs text-gray-500">{{ app.description }}</p>
                        </div>
                        <button @click="revokeAccess(app)"
                            class="px-4 py-1 rounded-md font-semibold shadow-sm transition bg-red-100 text-red-600 hover:bg-red-200">
                            Revoke
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

const apps = ref([
    { name: 'Slack', description: 'Send notifications to Slack workspace' },
    { name: 'Zoom', description: 'Sync meetings with your calendar' },
    { name: 'Notion', description: 'Export notes and tasks to Notion' },
])

const revokeAccess = (app) => {
    console.log(`Revoked access for ${app.name}`)
    apps.value = apps.value.filter(a => a.name !== app.name)
}
</script>
