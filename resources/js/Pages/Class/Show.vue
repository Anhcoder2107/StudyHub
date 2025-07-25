<template>
    <ClassLayout ref="scrollContainer">
        <div  class="new-board">
            <h1 class="text-2xl font-semibold mb-4">Class Dashboard</h1>
            <div class="mt-4">
                <!-- Tabs -->
                <div class="flex gap-6 border-b border-gray-200 mb-6 justify-between">
                    <div class="">
                        <button :class="[
                            'py-2 px-4 font-semibold outline-none focus:outline-none',
                            activeTab === 'posts'
                                ? 'text-[#725DFF] border-b-2 border-[#725DFF]'
                                : 'text-gray-400',
                        ]" @click="activeTab = 'posts'">
                            Bài đăng
                        </button>
                        <button :class="[
                            'py-2 px-4 font-semibold outline-none focus:outline-none',
                            activeTab === 'files'
                                ? 'text-[#725DFF] border-b-2 border-[#725DFF]'
                                : 'text-gray-400',
                        ]" @click="activeTab = 'files'">
                            Tệp
                        </button>
                    </div>

                </div>

                <!-- Posts -->
                <div v-if="activeTab === 'posts'" class="space-y-6">
                    <div class="post space-y-6">
                        <div v-for="(post, index) in posts" :key="index"
                            class="bg-white rounded-xl p-4 border border-gray-200 shadow-sm hover:shadow-md transition">
                            <!-- User Info -->
                            <div class="flex items-center gap-4 mb-3">
                                <img :src="post.avatar" alt="User Avatar" class="w-10 h-10 rounded-full object-cover" />
                                <div>
                                    <p class="font-semibold text-gray-800">{{ post.name }}</p>
                                    <p class="text-xs text-gray-400">{{ post.date }}</p>
                                </div>
                            </div>

                            <!-- Post Content -->
                            <p class="text-gray-700 text-sm">
                                <strong class="text-lg font-semibold">{{ post.subject }}</strong>
                                <br>
                            <div v-html="post.content"></div>
                            </p>
                            <!-- Danh sách bình luận -->
                            <div v-if="post.comments.length" class="mt-4 space-y-2">

                                <!-- Hiển thị bình luận (giới hạn nếu chưa mở rộng) -->
                                <div v-for="(comment, cIndex) in expandedComments[index] ? post.comments : post.comments.slice(0, 2)"
                                    :key="cIndex" class="bg-gray-100 px-3 py-2 rounded-md text-sm text-gray-800">
                                    <span class="font-semibold">{{ comment.user }}:</span> {{
                                        comment.content }}
                                </div>

                                <!-- Xem thêm / Thu gọn -->
                                <div v-if="post.comments.length > 2"
                                    class="text-sm text-[#725DFF] cursor-pointer mt-1 ml-2 hover:underline"
                                    @click="toggleComments(index)">
                                    {{ expandedComments[index] ? 'Thu gọn ' : `Xem thêm
                                    ${post.comments.length - 2} bình luận ` }}
                                </div>
                            </div>



                            <!-- Optional: Like / Comment -->
                            <div class="mt-3 flex gap-4 text-sm text-gray-500">
                                <button @click="toggleLike(index)"
                                    class="flex items-center gap-1 group select-none focus:outline-none outline-none">
                                    <!-- Trái tim: đỏ hoặc trắng -->
                                    <span class="text-xl transition-all duration-200"
                                        :class="post.likedByUser ? 'text-red-500' : 'text-gray-400 group-hover:text-red-400'">
                                        {{ post.likedByUser ? '❤️' : '🤍' }}
                                    </span>
                                    <!-- Số lượt like -->
                                    <span :class="post.likedByUser ? 'text-gray-800 font-medium' : ''">
                                        {{ post.likes }}
                                    </span>
                                </button>
                                <button class="hover:text-[#725DFF] outline-none focus:outline-none"
                                    @click="activeCommentPostId = activeCommentPostId === index ? null : index">💬
                                    Comment</button>
                            </div>
                            <div v-if="activeCommentPostId === index" class="mt-3">
                                <textarea v-model="commentText" rows="2"
                                    class="w-full border rounded p-2 text-sm resize-none focus:outline-none focus:ring-2 focus:ring-[#725DFF]"
                                    placeholder="Nhập bình luận của bạn..."></textarea>
                                <div class="flex justify-end mt-2">
                                    <button @click="sendComment(index)"
                                        class="bg-[#725DFF] text-white px-4 py-1 rounded hover:bg-[#5a48cc] text-sm">
                                        Gửi
                                    </button>
                                </div>
                            </div>

                        </div>
                        <div v-if="!showPostModal">
                            <button @click="openNewPost"
                                class="bg-[#725DFF] hover:bg-[#5a48cc] text-white px-4 py-2 rounded-xl text-sm transition">
                                + Tạo bài đăng
                            </button>

                        </div>
                        <div ref="newPostRef" v-if="showPostModal" class="">
                            <NewPost @close="showPostModal = false" @post="addPost" />
                        </div>
                    </div>

                </div>

                <!-- Files -->
                <div v-else class="space-y-4">
                    <div v-for="(file, index) in files" :key="index"
                        class="flex justify-between items-center p-4 bg-gray-50 hover:bg-white border border-gray-200 rounded-xl transition">
                        <div class="flex items-center gap-4">
                            <img src="https://img.icons8.com/fluency/24/file.png" alt="file" />
                            <div>
                                <p class="font-semibold text-gray-800">{{ file.name }}</p>
                                <p class="text-xs text-gray-400">
                                    📅 {{ file.date }} &nbsp; • &nbsp; 👤 {{ file.uploadedBy }}
                                </p>
                            </div>
                        </div>
                        <a :href="file.url" download
                            class="text-sm px-3 py-1 rounded bg-[#725DFF] text-white hover:bg-[#5a48cc] transition">
                            Tải xuống
                        </a>
                    </div>
                </div>


            </div>
        </div>
    </ClassLayout>
</template>

<script setup>
import ClassLayout from '@/Layouts/ClassLayout.vue'
import DefaultLayout from '@/Layouts/DefaultLayout.vue';
import { ref, nextTick } from 'vue';
import { Link, usePage } from '@inertiajs/vue3'
import { computed } from 'vue'
import NewPost from '@/Components/NewPost.vue'

const activeTab = ref('posts');

const currentUrl = computed(() => usePage().url)

const posts = ref([
    {
        name: 'Nina Kim',
        avatar: 'https://randomuser.me/api/portraits/women/44.jpg',
        subject: 'Assignment Review',
        date: 'July 14, 2025',
        content: 'Hello everyone! Please review the assignment I uploaded yesterday.',
        likes: 3,
        likedByUser: false,
        comments: [
            { user: 'John Doe', content: 'Đã xem ạ 👌' },
            { user: 'Emily Tran', content: 'Cảm ơn cô giáo!' }
        ]
    },
    {
        name: 'John Doe',
        avatar: 'https://randomuser.me/api/portraits/men/32.jpg',
        subject: 'Assignment Review',
        date: 'July 13, 2025',
        content: 'Reminder: Tomorrow we’ll have a live Q&A at 10:00AM via Zoom.',
        likes: 5,
        likedByUser: true,
        comments: []
    },
    {
        name: 'John Doe',
        avatar: 'https://randomuser.me/api/portraits/men/32.jpg',
        subject: 'Assignment Review',

        likes: 7,
        likedByUser: true,
        date: 'July 13, 2025',
        content: 'Reminder: Tomorrow we’ll have a live Q&A at 10:00AM via Zoom.',
        comments: []
    },
    {
        name: 'John Doe',
        avatar: 'https://randomuser.me/api/portraits/men/32.jpg',
        subject: 'Assignment Review',

        likes: 10,
        likedByUser: false,
        date: 'July 13, 2025',
        content: 'Reminder: Tomorrow we’ll have a live Q&A at 10:00AM via Zoom.',
        comments: []
    }
]);


const files = ref([
    {
        name: 'Tài liệu học tuần 1.pdf',
        date: '14/07/2025',
        uploadedBy: 'Thầy Tuấn Anh',
        url: '#', // Đường dẫn thực tế đến file
    },
    {
        name: 'Slide bài giảng CSS.pptx',
        date: '13/07/2025',
        uploadedBy: 'Cô Nina Kim',
        url: '#',
    },
    {
        name: 'Bài tập về nhà.docx',
        date: '10/07/2025',
        uploadedBy: 'Thầy John',
        url: '#',
    },
]);

const activeCommentPostId = ref(null);
const commentText = ref('');

const sendComment = (index) => {
    if (commentText.value.trim()) {
        posts.value[index].comments.push({
            user: 'Bạn', // thay bằng tên user thực tế nếu có đăng nhập
            content: commentText.value.trim()
        });
        commentText.value = '';
    }
};

const expandedComments = ref({}); // Lưu trạng thái mở rộng theo post index

const toggleComments = (index) => {
    expandedComments.value[index] = !expandedComments.value[index];
};

const toggleLike = (index) => {
    const post = posts.value[index]
    if (post.likedByUser) {
        post.likes--
        post.likedByUser = false
    } else {
        post.likes++
        post.likedByUser = true
    }
}

const showPostModal = ref(false)
const newPostContent = ref('')

const addPost = (post) => {
    // Thêm bài đăng mới vào cuối danh sách
    post.subject = post.subject || 'No Subject' // Đảm bảo subject không rỗng
    posts.value.push(post)
    showPostModal.value = false
}

const scrollContainer = ref(null)
const newPostRef = ref(null)
const openNewPost = () => {
    showPostModal.value = true

    // Đợi DOM render xong trước khi scroll
    nextTick(() => {
        if (scrollContainer.value && newPostRef.value) {
            const container = scrollContainer.value
            const target = newPostRef.value

            const offsetTop = target.offsetTop - container.offsetTop

            container.scrollTo({
                top: offsetTop,
                behavior: 'smooth'
            })
        }
    })
}


</script>


<style scoped>
.post button {
    transition: color 0.2s ease;
}

.scrollbar-thin::-webkit-scrollbar {
    width: 6px;
}

.scrollbar-thin::-webkit-scrollbar-track {
    background: #E5E7EB;
}

.scrollbar-thin::-webkit-scrollbar-thumb {
    background: #725DFF;
    border-radius: 3px;
}

.scrollbar-thin {
    scrollbar-width: thin;
    scrollbar-color: #725DFF #E5E7EB;
}
</style>
