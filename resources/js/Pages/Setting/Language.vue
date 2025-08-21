<template>
    <SettingLayout>
        <div class="py-6 px-6 space-y-10">
            <section>
                <h1 class="text-xl font-semibold">Language</h1>
                <p class="text-sm text-gray-500 mt-1">
                    Select the language for the interface and notifications.
                </p>

                <!-- Custom Select -->
                <div class="mt-6 relative w-72">
                    <button @click="isOpen = !isOpen" class="w-full flex justify-between items-center border rounded-lg px-4 py-2 bg-white shadow-sm
                   focus:ring-2 focus:ring-[#725DFF] focus:border-[#725DFF] transition">
                        <span>{{ selectedLabel }}</span>
                        <svg :class="{ 'rotate-180': isOpen }"
                            class="w-5 h-5 text-gray-500 transform transition-transform duration-200" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <!-- Dropdown -->
                    <ul v-if="isOpen"
                        class="absolute z-10 mt-2 w-full bg-white border rounded-lg shadow-lg overflow-hidden">
                        <li v-for="lang in languages" :key="lang.value" @click="selectLanguage(lang)"
                            class="px-4 py-2 cursor-pointer hover:bg-[#f5f3ff] flex justify-between items-center"
                            :class="form.language === lang.value ? 'bg-[#ede9fe] text-[#5a4bd1] font-semibold' : ''">
                            {{ lang.label }}
                            <span v-if="form.language === lang.value" class="text-[#5a4bd1]">✔</span>
                        </li>
                    </ul>
                </div>
            </section>

            <div class="w-full mt-8 flex justify-end">
                <button @click="saveLanguage"
                    class="w-40 bg-[#725DFF] hover:bg-[#5a4bd1] text-white font-semibold py-2 px-4 rounded-md shadow-md transition">
                    Save Changes
                </button>
            </div>
        </div>
    </SettingLayout>
</template>

<script setup>
import { ref, computed } from 'vue'
import SettingLayout from '@/Layouts/SettingLayout.vue'

const languages = [
    { value: 'en', label: 'English' },
    { value: 'vi', label: 'Tiếng Việt' },
    { value: 'jp', label: '日本語 (Japanese)' },
    { value: 'kr', label: '한국어 (Korean)' },
    { value: 'fr', label: 'Français' },
    { value: 'es', label: 'Español' }
]

const form = ref({
    language: 'en'
})

const isOpen = ref(false)

const selectedLabel = computed(() => {
    const lang = languages.find(l => l.value === form.value.language)
    return lang ? lang.label : 'Select language'
})

const selectLanguage = (lang) => {
    form.value.language = lang.value
    isOpen.value = false
}

const saveLanguage = () => {
    console.log('Saved Language:', form.value.language)
    // TODO: gọi API hoặc lưu vào localStorage
}
</script>
