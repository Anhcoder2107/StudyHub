<template>
    <div class="bg-white p-4 rounded-xl border border-gray-200 shadow-sm">
        <!-- Header -->
        <div class="flex justify-between items-center mb-3">
            <div class="flex items-center gap-2">
                <img class="w-10 h-10 rounded-full object-cover" src="https://randomuser.me/api/portraits/men/1.jpg"
                    alt="user" />
                <div>
                    <p class="font-semibold text-gray-800">Bạn</p>
                    <p class="text-xs text-gray-400">Tạo bài đăng mới</p>
                </div>
            </div>
            <button @click="$emit('close')" class="text-gray-400 hover:text-red-500 text-xl font-bold">&times;</button>
        </div>

        <!-- Subject Input -->
        <input v-model="subject" type="text" placeholder="Thêm chủ đề"
            class="w-full border border-gray-300 rounded-md px-3 py-2 mb-3 focus:outline-none focus:ring-2 focus:ring-[#725DFF] text-lg font-semibold text-[#333]" />

        <!-- Toolbar -->
        <div class="flex flex-wrap gap-4 mb-3 items-center">
            <button @click="format('bold')"
                :class="[editor.isActive('bold') ? 'text-white bg-[#725DFF]' : 'text-[#725DFF] border border-[#725DFF] hover:bg-[#725DFF] hover:text-white', 'rounded px-2 py-1 font-bold']"
                title="In đậm">B</button>
            <button @click="format('italic')"
                :class="[editor.isActive('italic') ? 'text-white bg-[#725DFF]' : 'text-[#725DFF] border border-[#725DFF] hover:bg-[#725DFF] hover:text-white', 'rounded px-2 py-1 italic']"
                title="In nghiêng">I</button>
            <button @click="format('underline')"
                :class="[editor.isActive('underline') ? 'text-white bg-[#725DFF]' : 'text-[#725DFF] border border-[#725DFF] hover:bg-[#725DFF] hover:text-white', 'rounded px-2 py-1 underline']"
                title="Gạch chân">U</button>
            <button @click="editor.chain().focus().insertContent('😊').run()" title="Emoji"
                class="text-[#725DFF] text-xl">😊</button>
        </div>

        <!-- Tiptap Editor -->
        <EditorContent :editor="editor"
            class="border border-gray-300 rounded-md p-4 min-h-[140px] focus:outline-none outline-none focus:ring-2 focus:ring-[#725DFF] text-base leading-relaxed" />

        <!-- Actions -->
        <div class="flex justify-end mt-3">
            <button @click="handlePost"
                class="bg-[#725DFF] text-white px-5 py-2 rounded-md hover:bg-[#5a48cc] transition">
                Đăng
            </button>
        </div>
    </div>
</template>

<script setup>
import { ref, onBeforeUnmount } from 'vue'
import { Editor, EditorContent } from '@tiptap/vue-3'
import StarterKit from '@tiptap/starter-kit'
import Underline from '@tiptap/extension-underline'

const emit = defineEmits(['post', 'close'])

const subject = ref('')

const editor = new Editor({
    extensions: [StarterKit, Underline],
    content: '',
})

const format = (type) => {
    editor.chain().focus()[`toggle${capitalize(type)}`]().run()
}

const capitalize = (s) => s.charAt(0).toUpperCase() + s.slice(1)

const handlePost = () => {
    const html = editor.getHTML().trim()
    if (!html || html === '<p></p>') return

    emit('post', {
        name: 'Bạn',
        avatar: 'https://randomuser.me/api/portraits/men/1.jpg',
        date: new Date().toLocaleDateString(),
        subject: subject.value,
        content: html,
        likes: 0,
        likedByUser: false,
        comments: []
    })

    editor.commands.clearContent()
    subject.value = ''
    emit('close')
}

onBeforeUnmount(() => {
    editor.destroy()
})
</script>

<style scoped>
button {
    font-weight: bold;
    border: none;
    outline: none;
    cursor: pointer;
    font-size: 18px;
    transition: all 0.2s ease;
}
</style>
