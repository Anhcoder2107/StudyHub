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
        </div>

        <!-- Main Content Area -->
        <div class="ml-64 p-6">
            <slot />
        </div>
    </div>
</template>
