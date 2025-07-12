<template>
    <div class="flex items-center justify-between px-6 py-4 h-20 rounded-2xl bg-white ml-6 mr-6 ">
        <div class="getting-text w-full">
            <div class="w-full relative" v-if="showSearch">
                <input ref="searchInput" type="text" placeholder="Search courses..."
                    class="text-md w-full pl-10 pr-4 py-2 focus:rounded-xl rounded-xl border-none outline-none focus:border-none focus:outline-none transition-all duration-200"
                    @blur="hideSearch" @input="filterSuggestions" v-model="searchQuery" @keyup.enter="submitSearch"/>
                <img :src="search" alt="Search Icon"
                    class="absolute left-3 top-1/4 transform -translate-y-1/2 w-5 h-5 text-gray-400" />
                <div v-if="filteredSuggestions.length > 0"
                    class="absolute top-full left-0 mt-2 w-full bg-white rounded-xl shadow-lg border-none z-10">
                    <div v-for="suggestion in filteredSuggestions" :key="suggestion"
                        class="px-4 py-2 hover:bg-gray-100 cursor-pointer text-md rounded-xl"
                        @click="selectSuggestion(suggestion)">
                        {{ suggestion }}
                    </div>
                </div>
            </div>
            <div v-else>
                <div class="text-xl font-semibold ">Welcome Back, Peter!</div>
            <!-- <div class="text-base font-regular text-gray-400">
                    Let’s boost your knowledge today and learn a new things
                </div> -->
            </div>
        </div>
        <div class="navbar-right flex items-center justify-between gap-6 w-80">
            <div class="px-2 py-1 flex items-center justify-center cursor-pointer" @click="toggleSearch">
                <img :src="search" alt="Search Icon" class="search-icon" />
            </div>
            <div class="px-2 py-1 flex items-center justify-center cursor-pointer">
                <img :src="basket" alt="Basket Icon" class="basket-icon" />
            </div>
            <div class="px-2 py-1 flex items-center justify-center cursor-pointer">
                <img :src="bell" alt="Notification Icon" class="notification-icon" />
            </div>
            <div class="rounded-full overflow-hidden flex items-center justify-center cursor-pointer"
                style="width: 46px; height: 46px;">
                <img :src="user" alt="User Icon" class="w-full h-full object-cover rounded-full" />
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, nextTick } from "vue";
import basket from "../../css/assets/icon/shopping.svg";
import search from "../../css/assets/icon/search.svg";
import bell from "../../css/assets/icon/Bell.svg";
import user from "../../css/assets/image/profile.jpg";
import { reactive } from 'vue'
import { router } from '@inertiajs/vue3'

const showSearch = ref(false);
const searchInput = ref(null);
const searchQuery = ref("");
const filteredSuggestions = ref([]);

const suggestions = [
    "React Javascript",
    "Vue.js Basics",
    "Node.js Fundamentals",
    "Web Design",
    "Python Programming",
];

const toggleSearch = () => {
    showSearch.value = true;
    nextTick(() => {
        if (searchInput.value) {
            searchInput.value.focus();
        }
    });
};

const hideSearch = () => {
    showSearch.value = false;
    searchQuery.value = "";
    filteredSuggestions.value = [];
};

const filterSuggestions = () => {
    if (searchQuery.value) {
        filteredSuggestions.value = suggestions.filter((s) =>
            s.toLowerCase().includes(searchQuery.value.toLowerCase())
        );
    } else {
        filteredSuggestions.value = [];
    }
};

const selectSuggestion = (suggestion) => {
    searchQuery.value = suggestion;
    filteredSuggestions.value = [];
    router.get('/courses/search', { search: suggestion });
};

const submitSearch = () => {
    if (searchQuery.value) {
        router.get('/courses/search', { query: searchQuery.value });
    }
};
</script>

<style scoped>
/* Optional: Enhance search input styling */
input:focus+img {
    filter: brightness(0.8);
}

/* Ensure dropdown appears above other elements */
.z-10 {
    z-index: 10;
}

.hover:bg-gray-100 {
    transition: background-color 0.2s ease;
}
</style>
