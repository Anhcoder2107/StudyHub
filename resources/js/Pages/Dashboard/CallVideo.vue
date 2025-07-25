<template>
    <DefaultLayout>
        <div
            class="rounded-xl px-6 pt-6 overflow-y-auto h-[calc(100vh-6rem)] scrollbar-thin scrollbar-thumb-[#725DFF] scrollbar-track-gray-200">
            <div class="grid  grid-cols-3 gap-4">
                <div class="info col-span-2 mb-6">

                    <div class=" rounded-lg ">
                        <iframe width="100%" height="600" class="rounded-2xl"
                            src="https://www.youtube.com/embed/Huh-fGRQiAo?si=gDYpddy750z3A4Dv"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>

                        <div class="flex justify-between items-center mt-4 bg-[#F1F3F4] h-16 rounded-lg p-4">
                            <div class="time flex items-center gap-3 p-2 bg-white rounded-lg">
                                <Icon name="CircleStop" class="w-5 h-5 " />
                                <div class="duration">
                                    <span class="text-sm text-black">00:00</span>
                                </div>
                            </div>
                            <div class="actions flex items-center gap-4">
                                <div class="camera">
                                    <button
                                        :class="['px-4 py-2 rounded-lg', activeStates.camera ? 'bg-[#34C759] text-white' : 'bg-white hover:bg-[#34C759] hover:text-white']"
                                        @click="toggle('camera')">
                                        <Icon :name="activeStates.camera ? 'CameraOff' : 'Camera'" class="w-5 h-5" />
                                    </button>
                                </div>

                                <div class="mic">
                                    <button
                                        :class="['px-4 py-2 rounded-lg', activeStates.mic ? 'bg-[#34C759] text-white' : 'bg-white hover:bg-[#34C759] hover:text-white']"
                                        @click="toggle('mic')">
                                        <Icon :name="activeStates.mic ? 'MicOff' : 'Mic'" class="w-5 h-5" />
                                    </button>
                                </div>

                                <div class="full-screen">
                                    <button
                                        :class="['px-4 py-2 rounded-lg', activeStates.full ? 'bg-[#34C759] text-white' : 'bg-white hover:bg-[#34C759] hover:text-white']"
                                        @click="toggle('full')">
                                        <Icon :name="activeStates.full ? 'Minimize' : 'Maximize'" class="w-5 h-5" />
                                    </button>
                                </div>

                                <div class="more">
                                    <button
                                        :class="['px-4 py-2 rounded-lg', activeStates.more ? 'bg-[#34C759] text-white' : 'bg-white hover:bg-[#34C759] hover:text-white']"
                                        @click="toggle('more')">
                                        <Icon :name="activeStates.more ? 'X' : 'Ellipsis'" class="w-5 h-5" />
                                    </button>
                                </div>

                            </div>
                            <div class="">
                                <button class="bg-red-500 text-white px-4 py-2 rounded-lg flex items-center gap-2">
                                    <Icon name="Phone" class="w-5 h-5" />
                                    End Call
                                </button>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-span-1">
                    <div class="">
                        <div class="grid grid-cols-2 gap-4">
                            <div v-for="(user, index) in displayedUsers" :key="index" class="video h-48 relative">
                                <img :src="user.avatar" :alt="user.name"
                                    class="rounded-2xl w-full h-full object-cover" />
                                <div class="absolute top-0 left-0 p-2">
                                    <div
                                        class="flex items-center gap-2 justify-center h-full bg-white/10 rounded-2xl backdrop-blur-md p-1">
                                        <img :src="user.avatar" :alt="user.name"
                                            class="rounded-full w-6 h-6 object-cover" />
                                        <span class="text-white text-base mr-2">{{ user.name }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Xem thêm / Thu gọn -->
                        <div v-if="users.length > 4" class="mt-2 text-right">
                            <button @click="showAll = !showAll" class="text-sm text-[#725DFF] hover:underline">
                                {{ showAll ? 'Thu gọn' : 'Xem thêm' }}
                            </button>
                        </div>

                    </div>
                    <div class="participant mt-4 bg-white rounded-lg p-4 shadow">
                        <h3 class="text-lg font-semibold mb-2">Participants</h3>
                        <ul
                            class="space-y-3 max-h-48 overflow-y-auto scrollbar-thin scrollbar-thumb-[#725DFF]/70 scrollbar-track-gray-100 pr-2">
                            <li v-for="(user, index) in participants" :key="index"
                                class="flex justify-between items-center hover:bg-gray-50 px-2 py-1 rounded-md">
                                <div class="flex items-center gap-2">
                                    <img :src="user.avatar" class="w-8 h-8 rounded-full object-cover" />
                                    <span class="text-sm text-gray-800">{{ user.name }}</span>
                                </div>
                                <div class="relative group">
                                    <Icon name="MoreVertical" class="w-4 h-4 cursor-pointer text-gray-500" />
                                    <ul
                                        class="absolute right-0 top-6 z-10 bg-white border border-gray-200 rounded-lg shadow-md text-sm w-32 hidden group-hover:block">
                                        <li class="hover:text-[#725DFF] px-4 py-2 cursor-pointer">Mute</li>
                                        <li class="hover:text-[#725DFF] px-4 py-2 cursor-pointer">Block</li>
                                        <li class="hover:text-[#725DFF] px-4 py-2 cursor-pointer">Remove</li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <div class="chat mt-4 bg-white rounded-lg p-4 shadow h-72 flex flex-col">
                        <h3 class="text-lg font-semibold mb-2">Chat</h3>
                        <div
                            class="bg-[#F1EFFF] p-2 rounded-lg flex-1 overflow-y-auto space-y-2 scrollbar-thin scrollbar-thumb-[#725DFF]/70 scrollbar-track-gray-100 pr-2">
                            <ChatBubble name="Puke Tresse" message="Hey all! 🚀 Any photography course suggestions?"
                                time="05:24 PM" />
                                <ChatBubble name="Puke Tresse" message="Hey all! 🚀 Any photography course suggestions?"
                                time="05:24 PM" />
                            <ChatBubble name="Peter Parker"
                                message="Puke, there are some amazing photography courses! 📚" time="05:27 PM" isSelf />
                        </div>
                        <div class="mt-2 flex items-center gap-2">
                            <input v-model="newMessage" @keyup.enter="sendMessage" type="text"
                                placeholder="Type a message..."
                                class="flex-1 px-4 py-2 text-sm border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#725DFF]" />
                            <button @click="sendMessage"
                                class="bg-[#725DFF] text-white px-4 py-2 rounded-lg text-sm hover:bg-[#5d48d6]">
                                Send
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </DefaultLayout>
</template>


<script setup>
import DefaultLayout from '@/Layouts/DefaultLayout.vue';
import Icon from '@/Components/LucideIcon.vue';
import { ref, reactive, } from 'vue';
import { computed } from 'vue';
import profile from "../../../../resources/css/assets/image/profile.jpg";
import ChatBubble from '@/Components/Message/ChatBubble.vue';

const users = ref([
    { name: "Anhcoder", avatar: profile },
    { name: "Linh Dev", avatar: profile },
    { name: "Ngọc Code", avatar: profile },
    { name: "Hoàng", avatar: profile },
    { name: "Thảo", avatar: profile },
    { name: "Minh", avatar: profile },
]);

const showAll = ref(false);

const displayedUsers = computed(() => {
    return showAll.value ? users.value : users.value.slice(0, 4);
});

const activeStates = reactive({
    camera: true,
    mic: true,
    full: false,
    more: false
});

function toggle(name) {
    activeStates[name] = !activeStates[name];
}


const participants = ref([
    { name: "Anhcoder", avatar: profile },
    { name: "Linh Dev", avatar: profile },
    { name: "Ngọc Code", avatar: profile },
    { name: "Hoàng", avatar: profile },
]);

const messages = ref([
    { user: "Anhcoder", text: "Hello mọi người!", avatar: profile },
    { user: "Linh Dev", text: "Chào Anhcoder!", avatar: profile },
]);

const newMessage = ref("");

function sendMessage() {
    if (newMessage.value.trim() !== "") {
        messages.value.push({ user: "You", text: newMessage.value });
        newMessage.value = "";
    }
}


</script>


<style scoped>
button {
    outline: none;
    border: none;
    cursor: pointer;
}
</style>
