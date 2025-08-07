<template>
    <DefaultLayout>
        <!-- Main container with white background and full height -->
        <div class="bg-white rounded-xl mx-6 mt-4 h-screen">
            <main class="flex-1 flex flex-col rounded-xl h-full">
                <div class="flex flex-1 overflow-hidden rounded-xl">
                    <!-- Contact List Section -->
                    <section class="w-80 space-y-4">
                        <!-- Header with title and menu icon -->
                        <div class="p-4 border-b border-r flex justify-between items-center bg-white h-20">
                            <h3 class="text-2xl font-bold">Message</h3>
                            <div class="hover:bg-[#F1EFFF] p-2 rounded-full">
                                <Icon name="EllipsisVertical" class="w-6 h-6 text-gray-500 cursor-pointer" />
                            </div>
                        </div>

                        <!-- Search bar -->
                        <div class="relative px-4">
                            <input type="text" placeholder="Search message..."
                                class="w-full px-3 py-2 rounded-lg border text-sm" />
                            <Icon name="search" class="w-4 h-4 absolute right-3 top-[45px] text-gray-400" />
                        </div>

                        <!-- Contact list with pinned and all messages -->
                        <div
                            class="overflow-y-auto max-h-[calc(100vh-17rem)] scrollbar-thin scrollbar-thumb-[#725DFF] scrollbar-track-gray-200">
                            <h4 class="text-xs font-bold text-gray-500 uppercase ml-4">Pinned Message</h4>
                            <ContactCard name="Envato Mastery" message="Karen is typing..." time="05:01 PM"
                                active="active" />

                            <h4 class="text-xs font-bold text-gray-500 uppercase mt-4 ml-4">All Message</h4>
                            <ContactCard v-for="contact in contactList" :key="contact.name" :name="contact.name"
                                :message="contact.lastMessage" :time="contact.lastSeen"
                                :active="activeContact === contact.name" @select="selectContact" />
                        </div>
                    </section>

                    <!-- Chat Section -->
                    <section
                        class="flex-1 flex flex-col bg-gray-50 relative overflow-y-auto max-h-[calc(100vh-7rem)] scrollbar-thin scrollbar-thumb-[#725DFF] scrollbar-track-gray-200">
                        <!-- Chat header with profile and action icons -->
                        <div class="p-4 border-b flex justify-between items-center bg-white h-20">
                            <div class="flex items-center gap-3">
                                <img :src="imageProfile" alt="Avatar" class="w-10 h-10 rounded-full" />
                                <div>
                                    <h3 class="text-sm font-bold">Envato Mastery</h3>
                                    <p class="text-xs text-green-500">Karen is typing...</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-2">
                                <div class="hover:bg-[#F1EFFF] p-2 rounded-full cursor-pointer">
                                    <Icon name="Users" class="w-6 h-6 text-gray-500 hover:text-[#725DFF]" />
                                </div>
                                <div class="hover:bg-[#F1EFFF] p-2 rounded-full cursor-pointer">
                                    <Icon name="Video" class="w-6 h-6 text-gray-500 hover:text-[#725DFF]" />
                                </div>
                                <div class="hover:bg-[#F1EFFF] p-2 rounded-full cursor-pointer">
                                    <Icon name="Phone" class="w-6 h-6 text-gray-500 hover:text-[#725DFF]" />
                                </div>
                                <div class="hover:bg-[#F1EFFF] p-2 rounded-full cursor-pointer" @click="toggleSidebar">
                                    <Icon name="MoreVertical"
                                        class="w-6 h-6 text-gray-500 cursor-pointer hover:text-[#725DFF] transition-colors duration-200" />
                                </div>
                            </div>
                        </div>

                        <!-- Sidebar Popup -->
                        <transition name="slide-fade">
                            <div v-if="showSidebar"
                                :class="showSidebar ? 'opacity-100 translate-x-0' : 'opacity-0 translate-x-full'"
                                class="absolute right-0 top-[5rem] bottom-0 w-64 bg-white p-4 z-[60] transition-all duration-300 ease-in-out transform  ">
                                <!-- Sidebar profile -->
                                <div class="flex items-center flex-col gap-3 mb-4">
                                    <img :src="imageProfile" alt="Avatar" class="w-12 h-12 rounded-full mb-2" />
                                    <h3>Anhcoder</h3>
                                </div>

                                <!-- Sidebar actions -->
                                <ul class="text-sm mb-6 flex items-center justify-center gap-2">
                                    <li
                                        class="flex items-center flex-col p-2 hover:text-[#725DFF] hover:bg-[#F1EFFF] rounded-full cursor-pointer transition-colors">
                                        <Icon name="Bell" class="w-4 h-4" />
                                        <span>Mute</span>
                                    </li>
                                    <li
                                        class="flex items-center flex-col p-2 hover:text-[#725DFF] hover:bg-[#F1EFFF] rounded-full cursor-pointer transition-colors">
                                        <Icon name="CircleMinus" class="w-4 h-4" />
                                        <span>Block</span>
                                    </li>
                                    <li
                                        class="flex items-center flex-col p-2 hover:text-[#725DFF] hover:bg-[#F1EFFF] rounded-full cursor-pointer transition-colors">
                                        <Icon name="Trash" class="w-4 h-4" />
                                        <span>Delete Chat</span>
                                    </li>
                                </ul>

                                <!-- Group members list -->
                                <div class="mt-auto">
                                    <h4 class="text-sm font-semibold text-gray-700 mb-2">Group Members</h4>
                                    <ul class="max-h-64 overflow-y-auto divide-y divide-gray-100">
                                        <li v-for="member in members" :key="member.id"
                                            class="px-2 py-2 flex items-center gap-3 hover:bg-[#F1EFFF] cursor-pointer transition-colors rounded-md">
                                            <img :src="member.avatar" alt="avatar" class="w-8 h-8 rounded-full" />
                                            <div>
                                                <p class="text-sm font-medium text-gray-800">{{ member.name }}</p>
                                                <p class="text-xs text-gray-500">{{ member.role }}</p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </transition>

                        <!-- Chat messages area -->
                        <div :class="[
                            showSidebar ? 'mr-64' : '',
                            'flex-1 min-h-0 overflow-y-auto p-6 space-y-4 bg-[#F1EFFF] scrollbar-thin scrollbar-thumb-[#725DFF] scrollbar-track-gray-200',
                        ]" id="chat-scroll">
                            <ChatBubble v-for="msg in messages" :key="msg.id" :name="msg.name" :message="msg.message"
                                :time="msg.time" :isSelf="msg.isSelf" :imageProfile="imageProfile" :image="msg.image" />
                        </div>

                        <!-- Message input box -->
                        <div :class="[
                            showSidebar ? 'mr-64' : '',
                            'shrink-0 border-t p-4 bg-white flex flex-col gap-2',
                        ]">
                            <!-- Image preview -->
                            <div v-if="selectedImages.length" class="flex gap-2 overflow-x-auto max-h-[5rem]">
                                <div v-for="(img, index) in selectedImages" :key="index" class="relative group">
                                    <img :src="img" class="w-16 h-16 object-cover rounded-lg border" />
                                    <button @click="selectedImages.splice(index, 1)"
                                        class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full w-5 h-5 text-xs hidden group-hover:block">
                                        ×
                                    </button>
                                </div>
                            </div>

                            <!-- Message input and action buttons -->
                            <div class="flex items-center gap-3 bg-white">
                                <input v-model="newMessage" @keyup.enter="sendMessage" type="text"
                                    placeholder="Type a message here..." :class="[
                                        'border rounded-full px-4 py-2 text-sm transition-all duration-500 ease-in-out transform w-full'
                                    ]" />
                                <div class="hover:bg-[#F1EFFF] p-2 rounded-full cursor-pointer">
                                    <Icon name="Mic" class="w-5 h-5 text-gray-500" />
                                </div>
                                <div class="hover:bg-[#F1EFFF] p-2 rounded-full cursor-pointer">
                                    <div class="relative">
                                        <div @click="showEmojiPicker = !showEmojiPicker"
                                            class="hover:bg-[#F1EFFF] ">
                                            <Icon name="Smile" class="w-5 h-5 text-gray-500" />
                                        </div>

                                        <div v-if="showEmojiPicker"
                                            class="absolute bottom-full mb-2 right-0 w-[320px] bg-white border rounded-lg shadow-lg z-50">
                                            <!-- Search -->
                                           <emoji-picker class="light" @emoji-click="e => addEmoji(e.detail.unicode)"></emoji-picker>
                                        </div>
                                    </div>


                                </div>

                                <div class="hover:bg-[#F1EFFF] p-2 rounded-full cursor-pointer">
                                    <input ref="fileInput" type="file" class="hidden" @change="handleImageSelect"
                                        accept="image/*" multiple />
                                    <div class="hover:bg-[#F1EFFF] "
                                        @click="fileInput.click()">
                                        <Icon name="Paperclip" class="w-5 h-5 text-gray-500" />
                                    </div>
                                </div>
                                <button @click="sendMessage" class="bg-[#725DFF] text-white p-2 rounded-full">
                                    <Icon name="Send" class="w-6 h-6" />
                                </button>
                            </div>
                        </div>
                    </section>
                </div>
            </main>
        </div>
    </DefaultLayout>
</template>

<script setup>

import { ref, computed, watch, onMounted, nextTick, defineOptions } from 'vue'
import DefaultLayout from '@/Layouts/DefaultLayout.vue';
import ContactCard from '@/Components/Message/ContactCard.vue';
import ChatBubble from '@/Components/Message/ChatBubble.vue';
import Icon from '@/Components/LucideIcon.vue';
import imageProfile from '../../../css/assets/image/profile.jpg';



// --- State Management ---
const showSidebar = ref(false); // Controls visibility of the sidebar
const isTransitioning = ref(false); // Prevents spam clicking during transitions
const newMessage = ref(''); // Stores the current message input
const selectedImages = ref([]); // Stores selected images for preview
const fileInput = ref(null); // Reference to the file input element
const activeContact = ref('Envato Mastery'); // Currently selected contact
const messages = ref([]); // Current chat thread messages
const showEmojiPicker = ref(false) // Controls visibility of emoji picker
const search = ref('')
const recentKey = 'chat_recent_emojis'
const recentEmojis = ref([])

// ví dụ subset, có thể mở rộng thêm từ Unicode list
const emojiCategories = {
    'Smileys & People': ['😀', '😃', '😄', '😁', '😆', '😅', '🤣', '😂', '🙂', '🙃', '😉', '😊', '😇', '🥰', '😍', '🤩', '😘', '😗', '😚', '😙'],
    'Animals & Nature': ['🐶', '🐱', '🐭', '🐹', '🐰', '🦊', '🐻', '🐼', '🐨', '🐯', '🦁', '🐮', '🐷', '🐸', '🐵'],
    'Food & Drink': ['🍏', '🍎', '🍐', '🍊', '🍋', '🍌', '🍉', '🍇', '🍓', '🍒', '🍍', '🥭', '🥥', '🥝'],
    'Activities': ['⚽', '🏀', '🏈', '⚾', '🎾', '🏐', '🏉', '🎱', '🥊', '🏓', '🏸'],
    'Travel & Places': ['🚗', '🚕', '🚙', '🚌', '🚎', '🏎️', '🚓', '🚑', '🚒', '🚐', '✈️', '🚀'],
    'Objects': ['⌚', '📱', '💻', '🖥️', '🕹️', '🎧', '📷', '🎁', '💡'],
    'Symbols': ['❤️', '💔', '🔥', '⭐', '⚠️', '✅', '❌', 'ℹ️', '🔔'],
}

// Contact list data
const contactList = ref([
    { name: 'Envato Mastery', lastMessage: 'Karen is typing...', lastSeen: '05:01 PM' },
    { name: 'Ms. Nina', lastMessage: 'Okay, I think I already understand...', lastSeen: '05:01 PM' },
    { name: 'Marteen Gowl', lastMessage: 'Thanks bro!', lastSeen: 'Yesterday' },
    { name: 'Puke Tresse', lastMessage: 'Summary Evaluation.pdf', lastSeen: 'Yesterday' },
    { name: 'Britney Wale', lastMessage: 'I should learn more...', lastSeen: '19/11/2023' },
    { name: 'Jeffery Junior', lastMessage: 'Hi!', lastSeen: '15/11/2023' },
]);

// Conversation store per contact
const conversations = ref({
    'Envato Mastery': [
        { id: 1, name: 'Envato Mastery', message: 'Welcome back!', time: '04:58 PM', isSelf: false },
        { id: 2, name: 'You', message: 'Thanks! Ready to start.', time: '05:00 PM', isSelf: true },
    ],
    'Ms. Nina': [
        { id: 1, name: 'Ms. Nina', message: 'Okay, I think I already understand...', time: '05:01 PM', isSelf: false },
    ],
});

// Group members data
const members = ref([
    { id: 1, name: 'Karen Smith', role: 'Admin', avatar: imageProfile },
    { id: 2, name: 'John Doe', role: 'Member', avatar: imageProfile },
    { id: 3, name: 'Maria L.', role: 'Member', avatar: imageProfile },
    { id: 4, name: 'Puke Tresse', role: 'Member', avatar: imageProfile },
]);

// --- Methods ---

// Toggle sidebar visibility with transition handling
const toggleSidebar = () => {
    if (isTransitioning.value) return;
    isTransitioning.value = true;
    showSidebar.value = !showSidebar.value;
    setTimeout(() => {
        isTransitioning.value = false;
    }, 300); // Match CSS transition duration
};

// Handle image selection for preview
const handleImageSelect = (event) => {
    const files = event.target.files;
    if (!files.length) return;

    for (const file of files) {
        const reader = new FileReader();
        reader.onload = () => {
            selectedImages.value.push(reader.result);
        };
        reader.readAsDataURL(file);
    }
};

// Send a new message or images
const sendMessage = () => {
    const text = newMessage.value.trim();
    if (!text && selectedImages.value.length === 0) return;

    const now = new Date();
    const formattedTime = now.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });

    // Initialize conversation array if it doesn't exist
    conversations.value[activeContact.value] ||= [];

    // Add text message if present
    if (text) {
        const msg = {
            id: conversations.value[activeContact.value].length + 1,
            name: 'You',
            message: text,
            time: formattedTime,
            isSelf: true,
        };
        conversations.value[activeContact.value].push(msg);
    }

    // Add image messages
    selectedImages.value.forEach((image) => {
        const imgMsg = {
            id: conversations.value[activeContact.value].length + 1,
            name: 'You',
            message: '',
            image,
            time: formattedTime,
            isSelf: true,
        };
        conversations.value[activeContact.value].push(imgMsg);
    });

    // Update displayed messages
    messages.value = [...(conversations.value[activeContact.value] || [])];
    newMessage.value = '';
    selectedImages.value = [];

    // Scroll to the bottom of the chat
    nextTick(() => {
        const el = document.getElementById('chat-scroll');
        if (el) el.scrollTop = el.scrollHeight;
    });
};

// Select a contact and load their conversation
const selectContact = (contact) => {
    activeContact.value = contact.name;
    messages.value = conversations.value[activeContact.value] || [];
    nextTick(() => {
        const el = document.getElementById('chat-scroll');
        if (el) el.scrollTop = el.scrollHeight;
    });
};


// flatten for search
const allEmojis = computed(() => {
    return Object.values(emojiCategories).flat()
})

const filteredEmojis = computed(() => {
    if (!search.value.trim()) return allEmojis.value
    const q = search.value.toLowerCase()
    return allEmojis.value.filter(e => {
        // You could expand to name-based search if you map emoji to names
        return e.includes(q)
    })
})

const addEmoji = (emoji) => {
    newMessage.value += emoji
    // update recent
    recentEmojis.value = [emoji, ...recentEmojis.value.filter(e => e !== emoji)].slice(0, 20)
    localStorage.setItem(recentKey, JSON.stringify(recentEmojis.value))
    showEmojiPicker.value = false
}

// --- Lifecycle Hooks ---

// Scroll to the bottom of the chat on mount
onMounted(() => {
    messages.value = conversations.value[activeContact.value] || [];
    nextTick(() => {
        const el = document.getElementById('chat-scroll');
        if (el) el.scrollTop = el.scrollHeight;
    });
    const stored = localStorage.getItem(recentKey)
    if (stored) {
        try { recentEmojis.value = JSON.parse(stored) } catch { }
    }
});

</script>

<style scoped>
/* Transition for sidebar slide effect */
.slide-fade-enter-active,
.slide-fade-leave-active {
    transition: all 0.3s ease;
}

.slide-fade-enter-from,
.slide-fade-leave-to {
    transform: translateX(100%);
    opacity: 0;
}

/* Remove default button outline */
button {
    outline: none;
}
</style>
