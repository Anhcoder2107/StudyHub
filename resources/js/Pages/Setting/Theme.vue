<template>
    <SettingLayout>
        <div class="py-6 px-6 space-y-10">
            <section>
                <h1 class="text-xl font-semibold">Theme</h1>
                <p class="text-sm text-gray-500 mt-1">
                    Choose your preferred theme. This will affect the look and feel of the platform.
                </p>

                <!-- Theme options -->
                <div class="mt-6 grid grid-cols-1 sm:grid-cols-3 gap-6">
                    <div v-for="theme in themes" :key="theme.value" @click="selectTheme(theme)"
                        class="relative cursor-pointer rounded-xl border p-4 shadow-sm transition hover:shadow-md"
                        :class="form.theme === theme.value
                            ? 'border-[#725DFF] ring-2 ring-[#725DFF]'
                            : 'border-gray-200'">
                        <!-- Preview box -->
                        <div class="w-full h-24 rounded-lg mb-3" :class="theme.previewClass"></div>

                        <!-- Label -->
                        <div class="flex justify-between items-center">
                            <span class="font-medium">{{ theme.label }}</span>
                            <span v-if="form.theme === theme.value" class="text-[#725DFF] font-bold">✔</span>
                        </div>
                    </div>
                </div>
            </section>

            <div class="w-full mt-8 flex justify-end">
                <button @click="saveTheme"
                    class="w-40 bg-[#725DFF] hover:bg-[#5a4bd1] text-white font-semibold py-2 px-4 rounded-md shadow-md transition">
                    Save Changes
                </button>
            </div>
        </div>
    </SettingLayout>
</template>

<script setup>
import { ref } from 'vue'
import SettingLayout from '@/Layouts/SettingLayout.vue'

const themes = [
    {
        value: 'light',
        label: 'Light',
        previewClass: 'bg-gradient-to-r from-white to-gray-100 border border-gray-300'
    },
    {
        value: 'dark',
        label: 'Dark',
        previewClass: 'bg-gradient-to-r from-gray-800 to-gray-900 border border-gray-700'
    },
    {
        value: 'system',
        label: 'System',
        previewClass: 'bg-gradient-to-r from-white via-gray-300 to-black border border-gray-400'
    }
]

const form = ref({
    theme: 'light'
})

const selectTheme = (theme) => {
    form.value.theme = theme.value
}

const saveTheme = () => {
    console.log('Saved Theme:', form.value.theme)
    // TODO: gọi API hoặc lưu localStorage
}
</script>
