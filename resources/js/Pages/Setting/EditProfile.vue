<template>
    <SettingLayout>
        <div class="px-6 overflow-y-auto h-[calc(100vh-4rem)] scrollbar-thin scrollbar-thumb-[#725DFF] scrollbar-track-gray-200">
            <div class="py-4">
                <h1 class="text-xl font-semibold">Edit Profile</h1>
            </div>
            <div class=" py-8 flex flex-row flex-start justify-between border-b border-gray-200 ">
                <div class="title ">
                    <h2 class="text-lg font-semibold">Profile Information</h2>
                    <p class="mt-2 text-gray-600">Update your profile information</p>
                </div>
                <div class="w-96 ">
                    <form @submit.prevent="updateProfile">
                        <div class="mb-2">
                            <input type="text" id="name" v-model="form.name"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                required>
                        </div>
                        <div>
                            <select id="role" v-model="form.role"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                <option selected value="user">User</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>
                    </form>
                </div>
            </div>
            <div class="py-8 flex flex-row flex-start justify-between border-b border-gray-200">
                <div class="title">
                    <h2 class="text-lg font-semibold">Profile Picture</h2>
                    <p class="mt-2 text-gray-600">Upload a profile picture</p>
                </div>
                <div class="w-96 flex flex-col items-center">
                    <div class="relative w-24 h-24">
                        <img :src="previewImage || '/images/profile.png'" alt="Profile Picture"
                            class="w-24 h-24 rounded-full object-cover border border-gray-300" />
                        <label for="profile_picture"
                            class="absolute bottom-0 right-0 bg-[#725DFF] hover:bg-[#5a4bd1] text-white p-1 rounded-full cursor-pointer shadow-md transition"
                            title="Change photo">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-cloud-upload-icon lucide-cloud-upload">
                                <path d="M12 13v8" />
                                <path d="M4 14.899A7 7 0 1 1 15.71 8h1.79a4.5 4.5 0 0 1 2.5 8.242" />
                                <path d="m8 17 4-4 4 4" />
                            </svg>
                            <input type="file" id="profile_picture" @change="handleFileUpload" accept="image/*"
                                class="hidden" />
                        </label>
                    </div>
                </div>
            </div>
            <div class="py-8 flex flex-row flex-start justify-between">
                <div class="title">
                    <h2 class="text-lg font-semibold">Social Profile </h2>
                    <p class="mt-2 text-gray-600">Update a profile social</p>
                </div>
                <div class="w-96">
                    <form @submit.prevent="updateProfile">
                        <div class="mb-2">
                            <div class="flex">
                                <span
                                    class="inline-flex items-center px-3 text-sm text-gray-400 border rounded-e-0 border-gray-300 border-e-0 rounded-s-md">
                                    twitter.com/
                                </span>
                                <input type="text" id="website-admin"
                                    class="rounded-none rounded-e-lg bg-gray-50 border text-black focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="elonmusk">
                            </div>
                        </div>
                        <div class="mb-2">
                            <div class="flex">
                                <span
                                    class="inline-flex items-center px-3 text-sm text-gray-400 border rounded-e-0 border-gray-300 border-e-0 rounded-s-md">
                                    facebook.com/
                                </span>
                                <input type="text" id="website-admin"
                                    class="rounded-none rounded-e-lg bg-gray-50 border text-black focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="elonmusk">
                            </div>
                        </div>
                        <div class="mb-2">
                            <div class="flex">
                                <span
                                    class="inline-flex items-center px-3 text-sm text-gray-400 border rounded-e-0 border-gray-300 border-e-0 rounded-s-md">
                                    instagram.com/
                                </span>
                                <input type="text" id="website-admin"
                                    class="rounded-none rounded-e-lg bg-gray-50 border text-black focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="elonmusk">
                            </div>
                        </div>
                        <div class="mb-2">
                            <div class="flex">
                                <span
                                    class="inline-flex items-center px-3 text-sm text-gray-400 border rounded-e-0 border-gray-300 border-e-0 rounded-s-md">
                                    linkedin.com/
                                </span>
                                <input type="text" id="website-admin"
                                    class="rounded-none rounded-e-lg bg-gray-50 border text-black focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="elonmusk">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="w-full mt-4 flex justify-end">
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
import { useForm } from '@inertiajs/vue3';


const previewImage = ref(null);
const form = useForm({
    name: '',
});
const updateProfile = () => {
    form.post('/profile/update', {
        onSuccess: () => {
            // Handle success, e.g., show a success message
        },
        onError: () => {
            // Handle error, e.g., show an error message
        }
    });
};

const handleFileUpload = (event) => {
    const file = event.target.files[0];
    if (file) {
        form.profile_picture = file;

        const reader = new FileReader();
        reader.onload = (e) => {
            previewImage.value = e.target.result;
        };
        reader.readAsDataURL(file);
    }
};

</script>
