<template>
    <DefaultLayout>
        <div
            class="rounded-xl px-6 pt-6 overflow-y-auto h-[calc(100vh-6rem)] scrollbar-thin scrollbar-thumb-[#725DFF] scrollbar-track-gray-200">
            <div class="grid  grid-cols-4 gap-4">
                <div class="col-span-3">
                    <h1 class="text-2xl font-bold text-gray-800">List Class</h1>
                    <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div v-for="classItem in joinedClasses" :key="classItem.id"
                            class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition cursor-pointer">
                            <!-- Image -->
                            <img :src="classItem.image" alt="Class Banner"
                                class="w-full h-40 object-cover rounded-t-xl">

                            <!-- Info -->
                            <div class="p-4">
                                <h3 class="text-lg font-semibold text-gray-800 mb-1">{{ classItem.name }}</h3>
                                <p class="text-sm text-gray-500 mb-2">👩‍🏫 Mentor: {{ classItem.mentor }}</p>
                                <p class="text-xs text-gray-400">👥 {{ classItem.students }} students joined</p>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-span-1">
                    <button @click="openModal"
                        class=" bg-indigo-500 font-semibold text-white py-2 px-4 rounded-2xl w-full outline-none focus:outline-none hover:bg-indigo-600 transition">
                        <img :src="AddCircleIcon" alt="Add Class" class="inline-block mr-2">
                        Join Class</button>

                    <div class="mt-6 space-y-6">
                        <!-- Upcoming Classes -->
                        <div class="bg-white rounded-xl shadow-md p-4 mb-6">
                            <h2 class="text-lg font-semibold text-gray-800 mb-3 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-[#725DFF]" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                Upcoming Classes
                            </h2>

                            <ul class="space-y-2 text-sm text-gray-600">
                                <li>
                                    <span class="font-medium text-gray-800">Tue 14 Jul, 10:00</span> — Tailwind Basics
                                </li>
                                <li>
                                    <span class="font-medium text-gray-800">Thu 16 Jul, 14:00</span> — Project Q&A
                                </li>
                                <li>
                                    <span class="font-medium text-gray-800">Sat 18 Jul, 09:00</span> — Final Review
                                </li>
                            </ul>
                        </div>

                    </div>





                    <div class="bg-white rounded-xl shadow-md p-4">
                        <h2 class="text-lg font-semibold text-gray-800 mb-4">👩 Mentors</h2>

                        <div class="space-y-6">
                            <div v-for="mentor in mentors" :key="mentor.id"
                                class="relative flex items-center gap-4 group">
                                <!-- Avatar -->
                                <img :src="mentor.avatar" alt="Mentor Avatar"
                                    class="w-16 h-16 object-cover rounded-full border shadow" />

                                <!-- Info -->
                                <div>
                                    <p class="text-sm font-semibold text-gray-800">{{ mentor.name }}</p>
                                    <p class="text-xs text-gray-500">{{ mentor.title }}</p>
                                </div>

                                <!-- Send Button Popup -->
                                <div class="">
                                    <button
                                        class="bg-[#725DFF] text-white text-xs px-3 py-1 rounded-full shadow hover:bg-[#5a48cc] outline-none focus:outline-none transition duration-200"
                                        @click.stop="toggleChat(mentor.id)">
                                        Send Message
                                    </button>
                                </div>

                                <!-- Chat Box -->
                                <div v-if="activeChat === mentor.id" :ref="el => chatBox[mentor.id] = el"
                                    class="absolute right-0 top-full w-64 bg-white border rounded-xl shadow-lg z-10 p-4">
                                    <div class="flex items-center justify-between mb-2">
                                        <div class="text-sm font-semibold mb-2 text-gray-700">
                                            Chat with {{ mentor.name }}
                                        </div>
                                        <button class="text-gray-400 hover:text-red-500" @click="closeChat"
                                            title="Close">
                                            ❌
                                        </button>
                                    </div>
                                    <textarea ref="chatInput" v-model="message" rows="3" placeholder="Type a message..."
                                        class="w-full text-sm p-2 border rounded resize-none focus:outline-none focus:ring-2 focus:ring-[#725DFF]"></textarea>

                                    <button @click="sendMessage(mentor)"
                                        class="mt-2 bg-[#725DFF] text-white w-full py-1 rounded hover:bg-[#5a48cc] text-sm">
                                        Send
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>




                </div>
            </div>
        </div>
        <!-- MODAL JOIN CLASS -->
        <div v-if="showModal" class="fixed inset-0 bg-black/40 backdrop-blur-sm flex items-center justify-center z-50">
            <div class="bg-white rounded-2xl p-6 w-full max-w-md shadow-2xl relative">

                <!-- Header -->
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-bold text-gray-800">Join a Class</h2>
                    <button @click="closeModal" class="text-gray-400 hover:text-gray-600 text-xl">&times;</button>
                </div>

                <!-- Input Field -->
                <p class="text-sm text-gray-500 mb-2">Enter class code, email or phone number:</p>
                <input v-model="joinInput" type="text" placeholder="e.g., ABC123 or johndoe@gmail.com"
                    class="w-full border border-gray-200 rounded-xl px-4 py-2 mb-4 focus:ring-2 focus:ring-[#725DFF] focus:outline-none transition" />

                <!-- Action Buttons -->
                <div class="flex justify-end gap-3">
                    <button @click="closeModal"
                        class="px-4 py-2 bg-gray-100 text-gray-600 rounded-xl hover:bg-gray-300 transition outline-none focus:outline-none">Cancel</button>
                    <button @click="submitJoin"
                        class="px-4 py-2 bg-[#725DFF] text-white font-semibold rounded-xl hover:bg-[#5a48cc] transition">
                        Join Class
                    </button>
                </div>

            </div>
        </div>


    </DefaultLayout>
</template>
<script setup>
import DefaultLayout from '@/Layouts/DefaultLayout.vue';
import AddCircleIcon from "../../../../resources/css/assets/icon/AddCircle.svg";
import course from "../../../../resources/css/assets/image/course.jpg";
import profile from "../../../../resources/css/assets/image/profile.jpg";
import { ref, nextTick, onMounted, onBeforeUnmount } from 'vue';


const showModal = ref(false);
const joinInput = ref("");

const openModal = () => {
    showModal.value = true;
};

const closeModal = () => {
    showModal.value = false;
    joinInput.value = "";
};

const submitJoin = () => {
    if (!joinInput.value.trim()) {
        alert("Please enter a valid code or contact info.");
        return;
    }

    // You can send the data via Inertia or Axios here
    joinedClasses.value.push({
        id: joinedClasses.value.length + 1,
        name: `New Class (${joinInput.value})`,
        mentor: "Unknown",
        students: 0,
        image: course,
    });

    closeModal(); // Close modal after submission
};

const joinedClasses = ref([
    {
        id: 1,
        name: "React & Tailwind CSS",
        mentor: "Nina Kim",
        students: 52,
        image: course,
    },
    {
        id: 2,
        name: "Node.js Fundamentals",
        mentor: "John Doe",
        students: 38,
        image: course,
    },
]);


const mentors = ref([
    {
        id: 1,
        name: 'Nina Kim',
        title: 'Frontend Developer',
        avatar: 'https://randomuser.me/api/portraits/women/44.jpg',
    },
    {
        id: 2,
        name: 'John Doe',
        title: 'Backend Developer',
        avatar: 'https://randomuser.me/api/portraits/men/32.jpg',
    },
]);



const activeChat = ref(null);
const message = ref('');
const chatInput = ref(null);
const chatBox = ref({});

const toggleChat = (id) => {
    if (activeChat.value === id) {
        activeChat.value = null;
    } else {
        activeChat.value = id;
        message.value = '';
        //focus the chat input when opening a chat

    }
};
const sendMessage = (mentor) => {
    if (message.value.trim()) {
        console.log(`Message to ${mentor.name}:`, message.value);
        message.value = '';
        activeChat.value = null;
    }
};

const closeChat = () => {
    activeChat.value = null;
};

const handleClickOutside = (event) => {
    const activeBox = chatBox.value[activeChat.value];
    if (
        activeBox &&
        !activeBox.contains(event.target)
    ) {
        closeChat();
    }
};

onMounted(() => {
    document.addEventListener('click', handleClickOutside);
});

onBeforeUnmount(() => {
    document.removeEventListener('click', handleClickOutside);
});

</script>

