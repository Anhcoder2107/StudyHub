<script setup>
import Navbar from '@/Components/Navbar.vue';
import SideBar from '@/Components/SideBar.vue';





</script>

<template>
    <div class="min-h-screen bg-neutral-100">
        <!-- Sidebar -->
        <SideBar />

        <!-- Navbar (below sidebar) -->
        <div class="ml-64 fixed top-6 left-0 right-0">
            <Navbar />

            <slot />
        </div>


    </div>
</template>

<style>
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

