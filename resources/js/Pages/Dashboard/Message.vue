<template>
    <DefaultLayout>
        <div class="bg-white rounded-xl mx-6 mt-4 h-screen">
            <main class="flex-1 flex flex-col rounded-xl h-full ">
                <div class="flex flex-1 overflow-hidden rounded-xl ">

                    <!-- Contact List -->
                    <section class="w-80 space-y-4 ">
                        <div class="p-4 border-b border-r flex justify-between items-center bg-white h-20">
                            <div>
                                <h3 class="text-2xl font-bold">Message</h3>
                            </div>
                            <div class="hover:bg-[#F1EFFF] p-2 rounded-full">
                                <Icon name="EllipsisVertical" class="w-6 h-6 text-gray-500 cursor-pointer" />
                            </div>
                        </div>

                        <div class="relative px-4">
                            <input type="text" placeholder="Search message..."
                                class="w-full px-3 py-2 rounded-lg border text-sm" />
                            <Icon name="search" class="w-4 h-4 absolute right-3 top-[45px] text-gray-400" />
                        </div>

                        <div
                            class="overflow-y-auto max-h-[calc(100vh-17rem)] scrollbar-thin scrollbar-thumb-[#725DFF] scrollbar-track-gray-200">
                            <h4 class="text-xs font-bold text-gray-500 uppercase ml-4">Pinned Message</h4>
                            <ContactCard name="Envato Mastery" message="Karen is typing..." time="05:01 PM"
                                active="active" />

                            <h4 class="text-xs font-bold text-gray-500 uppercase mt-4 ml-4">All Message</h4>
                            <ContactCard name="Ms. Nina" message="Okay, I think I already understand..."
                                time="05:01 PM" />
                            <ContactCard name="Marteen Gowl" message="Thanks bro!" time="Yesterday" />
                            <ContactCard name="Puke Tresse" message="Summary Evaluation.pdf" time="Yesterday" />
                            <ContactCard name="Britney Wale" message="I should learn more..." time="19/11/2023" />
                            <ContactCard name="Jeffery Junior" message="Hi!" time="15/11/2023" />
                        </div>
                    </section>


                    <!-- <section class="flex-1 flex flex-col bg-gray-50 relative">

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
                                    <Icon name="MoreVertical" class="w-6 h-6 text-gray-500 hover:text-[#725DFF]" />
                                </div>
                            </div>
                        </div>


                        <div id="chat-scroll"
                            class="flex-1 min-h-0 p-6 space-y-4 overflow-y-auto bg-[#F1EFFF] max-h-[calc(100vh-17rem)] scrollbar-thin scrollbar-thumb-[#725DFF] scrollbar-track-gray-200">
                            <ChatBubble name="Britney Wale" message="Hey guys! 👋 Just snagged a UI design toolkit..."
                                time="05:00 PM" />
                            <ChatBubble name="Marteen Gowl"
                                message="Totally agree, Maria! 💡 I'm working on a project..." time="05:12 PM" />
                            <ChatBubble name="Puke Tresse" message="Hey all! 🚀 Any photography course suggestions?"
                                time="05:24 PM" />
                            <ChatBubble name="Peter Parker"
                                message="Puke, there are some amazing photography courses! 📚" time="05:27 PM" isSelf />
                        </div>


                        <div class="border-t p-4 bg-white flex items-center gap-3">
                            <input type="text" placeholder="Type a message here..."
                                class="flex-1 border rounded-full px-4 py-2 text-sm" />
                            <div class="hover:bg-[#F1EFFF] p-2 rounded-full cursor-pointer">
                                <Icon name="Mic" class="w-5 h-5 text-gray-500" />
                            </div>
                            <div class="hover:bg-[#F1EFFF] p-2 rounded-full cursor-pointer">
                                <Icon name="Smile" class="w-5 h-5 text-gray-500" />
                            </div>
                            <div class="hover:bg-[#F1EFFF] p-2 rounded-full cursor-pointer">
                                <Icon name="Paperclip" class="w-5 h-5 text-gray-500" />
                            </div>
                            <button class="bg-[#725DFF] text-white p-2 rounded-full">
                                <Icon name="Send" class="w-6 h-6" />
                            </button>
                        </div>

                    </section> -->
                    <section class="flex-1 flex flex-col bg-gray-50 relative">
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
                            <div :class="showSidebar ? 'opacity-100 translate-x-0' : 'opacity-0 translate-x-full'"
                                v-if="showSidebar"
                                class="absolute right-0 top-[5rem] bottom-[7rem] w-64 bg-white p-4 z-[60] transition-all duration-300 ease-in-out transform">
                                <div class="flex items-center flex-col gap-3 mb-4">
                                    <div class="">
                                        <img :src="imageProfile" alt="Avatar" class="w-12 h-12 rounded-full mb-2" />
                                    </div>
                                    <div class="">
                                        <h3>
                                            Anhcoder
                                        </h3>
                                    </div>
                                </div>
                                <ul class="text-sm mb-6 flex items-center justify-center gap-2">
                                    <li
                                        class="flex items-center flex-col  p-2 hover:text-[#725DFF] hover:bg-[#F1EFFF] rounded-full cursor-pointer transition-colors">
                                        <Icon name="Bell" class="w-4 h-4" />
                                        <span>
                                            Mute
                                        </span>
                                    </li>
                                    <li
                                        class="flex items-center flex-col  p-2 hover:text-[#725DFF] hover:bg-[#F1EFFF] rounded-full cursor-pointer transition-colors">
                                        <Icon name="CircleMinus" class="w-4 h-4" />
                                        <span>
                                            Block
                                        </span>
                                    </li>
                                    <li
                                        class="flex items-center flex-col  p-2 hover:text-[#725DFF] hover:bg-[#F1EFFF] rounded-full cursor-pointer transition-colors">
                                        <Icon name="Trash" class="w-4 h-4" />
                                        <span>
                                            Delete Chat
                                        </span>
                                    </li>
                                </ul>


                                <!-- Danh sách thành viên -->
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

                        <!-- Phần còn lại giữ nguyên, nhưng thêm class co lại khi có sidebar -->
                        <div :class="[showSidebar ? 'mr-64 slide-fade slide-fade-enter-active' : '', 'flex-1 min-h-0 p-6 space-y-4 overflow-y-auto bg-[#F1EFFF] max-h-[calc(100vh-17rem)] scrollbar-thin scrollbar-thumb-[#725DFF] scrollbar-track-gray-200']"
                            id="chat-scroll">
                            <ChatBubble name="Britney Wale" message="Hey guys! 👋 Just snagged a UI design toolkit..."
                                time="05:00 PM" />
                            <ChatBubble name="Marteen Gowl"
                                message="Totally agree, Maria! 💡 I'm working on a project..." time="05:12 PM" />
                            <ChatBubble name="Puke Tresse" message="Hey all! 🚀 Any photography course suggestions?"
                                time="05:24 PM" />
                            <ChatBubble name="Peter Parker"
                                message="Puke, there are some amazing photography courses! 📚" time="05:27 PM" isSelf />
                        </div>

                        <!-- Input Box giữ nguyên -->
                        <div :class="[showSidebar ? 'mr-64' : '', 'border-t p-4 bg-white flex items-center gap-3']">
                            <input :class="[
                                'border rounded-full px-4 py-2 text-sm transition-all duration-500 ease-in-out transform',
                                showSidebar ? 'w-1/2' : 'w-full'
                            ]" type="text" placeholder="Type a message here..."
                                class="flex-1 border rounded-full px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#725DFF]" />
                            <div class="hover:bg-[#F1EFFF] p-2 rounded-full cursor-pointer">
                                <Icon name="Mic" class="w-5 h-5 text-gray-500" />
                            </div>
                            <div class="hover:bg-[#F1EFFF] p-2 rounded-full cursor-pointer">
                                <Icon name="Smile" class="w-5 h-5 text-gray-500" />
                            </div>
                            <div class="hover:bg-[#F1EFFF] p-2 rounded-full cursor-pointer">
                                <Icon name="Paperclip" class="w-5 h-5 text-gray-500" />
                            </div>
                            <button class="bg-[#725DFF] text-white p-2 rounded-full">
                                <Icon name="Send" class="w-6 h-6" />
                            </button>
                        </div>
                    </section>

                </div>
            </main>
        </div>
    </DefaultLayout>
</template>

<script setup>
import DefaultLayout from '@/Layouts/DefaultLayout.vue'
import ContactCard from '@/Components/Message/ContactCard.vue'
import ChatBubble from '@/Components/Message/ChatBubble.vue'
import Icon from '@/Components/LucideIcon.vue'
import imageProfile from '../../../css/assets/image/profile.jpg';
import { ref, nextTick, onMounted } from 'vue';

const showSidebar = ref(false);
const isTransitioning = ref(false);

const toggleSidebar = () => {
    if (isTransitioning.value) return; // Ngăn spam click

    isTransitioning.value = true;
    showSidebar.value = !showSidebar.value;

    // Reset sau 300ms (thời gian transition CSS)
    setTimeout(() => {
        isTransitioning.value = false;
    }, 300);
};

onMounted(() => {
    nextTick(() => {
        const el = document.getElementById("chat-scroll");
        if (el) el.scrollTop = el.scrollHeight;
    });
});


const members = ref([
    { id: 1, name: 'Karen Smith', role: 'Admin', avatar: imageProfile },
    { id: 2, name: 'John Doe', role: 'Member', avatar: imageProfile },
    { id: 3, name: 'Maria L.', role: 'Member', avatar: imageProfile },
    { id: 4, name: 'Puke Tresse', role: 'Member', avatar: imageProfile },
])
</script>


<style scoped>
.slide-fade-enter-active,
.slide-fade-leave-active {
    transition: all 0.3s ease;
}

.slide-fade-enter-from,
.slide-fade-leave-to {
    transform: translateX(100%);
    opacity: 0;
}
</style>
