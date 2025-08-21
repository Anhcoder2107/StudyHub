<template>
    <SettingLayout>
        <div class="py-6 px-6">
            <!-- Push Notification: text & toggle trên cùng một hàng -->
            <div class="">
                <div class="pr-6">
                    <h1 class="text-xl font-semibold">Push Notification</h1>
                </div>
                <div class="flex items-start justify-between gap-6">
                    <p class="mt-2 text-gray-400 text-sm">
                        Receive push notifications to stay updated on activities even when you're away from Courses.
                        You have the flexibility to disable them at any time. This preference applies to any account
                        accessed through this browser.
                    </p>

                    <!-- TOGGLE -->

                    <label class="inline-flex items-center cursor-pointer">
                        <input type="checkbox" value="" class="sr-only peer" v-model="form.pushNotification">
                        <div class="relative w-11 h-6 bg-gray-200 focus:outline-none dark:peer-focus:ring-blue-800 rounded-full
                         peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full
                         peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px]
                         after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all
                         dark:border-gray-600 peer-checked:bg-[#725DFF] dark:peer-checked:bg-[#725DFF]">
                        </div>
                    </label>
                </div>
            </div>

            <hr class="my-6" />

            <!-- Email Notification: text & toggle trên cùng một hàng -->
            <div class="">
                <div class="pr-6">
                    <h1 class="text-xl font-semibold">Email Notification</h1>
                </div>
                <div class="flex items-start justify-between gap-6">
                    <p class="mt-2 text-gray-400 text-sm">
                        Get emails to find out what's going on when you’re not on Courses. You can turn them off
                        anytime.
                    </p>

                    <!-- TOGGLE -->
                    <label class="inline-flex items-center cursor-pointer">
                        <input type="checkbox" value="" class="sr-only peer" v-model="form.emailNotification">
                        <div class="relative w-11 h-6 bg-gray-200 focus:outline-none dark:peer-focus:ring-blue-800 rounded-full
                         peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full
                         peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px]
                         after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all
                         dark:border-gray-600 peer-checked:bg-[#725DFF] dark:peer-checked:bg-[#725DFF]">
                        </div>
                    </label>
                </div>
            </div>

            <!-- Danh sách tùy chọn email -->
            <div class="mt-6 space-y-3" :class="!form.emailNotification ? 'opacity-50' : ''">
                <div v-for="(label, key) in notificationOptions" :key="key"
                    class="flex items-center justify-between border-b border-gray-100 pb-2">
                    <span>{{ label }}</span>
                    <input type="checkbox" v-model="form.options[key]" :disabled="!form.emailNotification"
                        class="w-4 h-4 text-[#725DFF] rounded focus:ring-[#725DFF] disabled:cursor-not-allowed" />
                </div>
            </div>

            <!-- Save -->
            <div class="w-full mt-8 flex justify-end">
                <button @click="saveChanges"
                    class="w-40 bg-[#725DFF] hover:bg-[#5a4bd1] text-white font-semibold py-2 px-4 rounded-md shadow-md transition">
                    Save Changes
                </button>
            </div>
        </div>
    </SettingLayout>
</template>

<script setup>
import SettingLayout from '@/Layouts/SettingLayout.vue'
import { ref } from 'vue'

const notificationOptions = {
    messages: 'Messages mentions',
    reminder: 'Reminder schedules',
    payment: 'Payment courses',
    suggest: 'Courses that you might like',
    promo: 'Our interesting promo',
    updates: 'Courses Updates',
    renewal: 'Subscription Renewal Notices',
    certificate: 'Certification Achievements',
    feedback: 'Feedback Requests'
}

const form = ref({
    pushNotification: false,
    emailNotification: true,
    options: {
        messages: true,
        reminder: true,
        payment: true,
        suggest: false,
        promo: false,
        updates: true,
        renewal: false,
        certificate: true,
        feedback: true
    }
})

const saveChanges = () => {
    console.log('Saved form:', form.value)
    // TODO: gọi API lưu thay đổi
}
</script>
