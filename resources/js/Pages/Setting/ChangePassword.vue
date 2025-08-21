<template>
    <SettingLayout>
        <div class="py-6">
            <div class=" pr-6">
                <h1 class="text-xl font-semibold">Change Password</h1>
                <p class="mt-2 text-gray-400 text-sm">To change your password, please fill in the fields below. Your
                    password
                    must contain at least 8 characters, it must also include at least 1 upper case letter, one lower
                    case letter, one number, and one special character.</p>
            </div>
            <form @submit.prevent="updateProfile">
                <div class="pr-6">
                    <div class=" py-8 flex flex-row flex-center justify-between ">
                        <div class="title ">
                            <h2 class="text-lg font-semibold">Current Password</h2>
                            <p class="mt-2 text-gray-600">This will help us to verified that this is really you</p>
                        </div>
                        <div class="w-96">
                            <div class="mb-2">
                                <div class="flex">
                                    <span
                                        class="inline-flex items-center px-3 text-sm text-gray-400 border rounded-e-0 border-gray-300 border-e-0 rounded-s-md">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="lucide lucide-lock-icon lucide-lock">
                                            <rect width="18" height="11" x="3" y="11" rx="2" ry="2" />
                                            <path d="M7 11V7a5 5 0 0 1 10 0v4" />
                                        </svg>
                                    </span>
                                    <input type="text" id="website-admin"
                                        class="rounded-none rounded-e-lg bg-gray-50 border text-black block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white outline-none focus:outline-none"
                                        placeholder="***********">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pr-6">
                    <div class=" py-8 flex flex-row flex-center justify-between ">
                        <div class="title ">
                            <h2 class="text-lg font-semibold">New Password</h2>
                            <p class="mt-2 text-gray-600">Following our password guidelines will ensures a strong and
                                protected login experience.</p>
                        </div>
                        <div class="w-96">
                            <div class="mb-2">
                                <div class="flex ">
                                    <span
                                        class="inline-flex items-center px-3 text-sm text-gray-400 border rounded-e-0 border-gray-300 border-e-0 rounded-s-md">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="lucide lucide-lock-icon lucide-lock">
                                            <rect width="18" height="11" x="3" y="11" rx="2" ry="2" />
                                            <path d="M7 11V7a5 5 0 0 1 10 0v4" />
                                        </svg>
                                    </span>
                                    <input type="text" id="website-admin"
                                        class="rounded-none rounded-tr-lg bg-gray-50 border text-black block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white outline-none focus:outline-none"
                                        placeholder="***********">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pr-6">
                    <div class=" py-8 flex flex-row flex-center justify-between ">
                        <div class="title ">
                            <h2 class="text-lg font-semibold">Confirm Password</h2>
                            <p class="mt-2 text-gray-600">Ensure this password matches with the previous one</p>
                        </div>
                        <div class="w-96">
                            <div class="mb-2">
                                <div class="flex">
                                    <span
                                        class="inline-flex items-center px-3 text-sm text-gray-400 border rounded-e-0 border-gray-300 border-e-0 rounded-s-md">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="lucide lucide-lock-icon lucide-lock">
                                            <rect width="18" height="11" x="3" y="11" rx="2" ry="2" />
                                            <path d="M7 11V7a5 5 0 0 1 10 0v4" />
                                        </svg>
                                    </span>
                                    <input type="text" id="website-admin"
                                        class="rounded-none rounded-e-lg bg-gray-50 border text-black block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white outline-none focus:outline-none"
                                        placeholder="***********">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <div class="w-full mt-6 pr-6 flex justify-end">
                <div class="">
                    <button @click="updateProfile"
                        class="w-40 bg-[#725DFF] hover:bg-[#5a4bd1] text-white font-semibold py-2 px-4 rounded-md shadow-md transition">
                        Save Changes
                    </button>
                </div>
            </div>
        </div>
    </SettingLayout>
</template>

<script setup>
import SettingLayout from '@/Layouts/SettingLayout.vue';

import { ref } from 'vue';
const form = ref({
    name: '',
    email: '',
    current_password: '',
    new_password: '',
    confirm_password: ''
});
const updateProfile = () => {
    // Logic to update the password
    console.log('Updating password with:', form.value);
};
</script>
