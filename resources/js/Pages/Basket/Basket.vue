<template>
    <DefaultLayout>
        <div
            class="bg-white rounded-xl mx-6 mt-4 h-screen overflow-y-auto h-[calc(100vh-4rem)] scrollbar-thin scrollbar-thumb-[#725DFF] scrollbar-track-gray-200">
            <!-- Tiêu đề -->


            <!-- Basket Summary -->
            <div class="bg-white rounded-2xl shadow p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-semibold">Basket Summary</h3>
                    <button class="text-sm text-red-500 hover:underline">Remove All</button>
                </div>

                <!-- Danh sách khóa học -->
                <div class="space-y-4">
                    <div v-for="(item, index) in basketItems" :key="index"
                        class="flex justify-between items-center border-b pb-4">
                        <div class="flex items-center space-x-4">
                            <input type="checkbox" v-model="item.checked" class="w-5 h-5 rounded" />

                            <img :src="item.image" alt="course" class="w-16 h-16 rounded-lg object-cover" />

                            <div>
                                <p class="text-xs text-blue-500 font-medium uppercase">{{ item.category }}</p>
                                <h4 class="font-semibold">{{ item.title }}</h4>
                                <p class="text-gray-500 text-sm">{{ item.modules }} Modules · {{ item.videos }} Videos
                                </p>
                            </div>
                        </div>

                        <div class="flex items-center space-x-4">
                            <p class="font-medium">${{ item.price }}</p>
                            <button @click="removeItem(index)"
                                class="bg-red-100 text-red-500 p-2 rounded-full hover:bg-red-200">
                                <Icon name="Trash2" class="w-5 h-5" />
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Tổng kết -->
                <div class="pt-6 space-y-2">
                    <div class="flex justify-between text-gray-600">
                        <span>Sub Total ({{ totalItems }} Courses)</span>
                        <span>${{ subTotal.toFixed(2) }}</span>
                    </div>
                    <div class="flex justify-between text-gray-600">
                        <span>Service Fee (3%)</span>
                        <span>${{ serviceFee.toFixed(2) }}</span>
                    </div>
                    <div class="flex justify-between font-semibold text-lg mt-2">
                        <span>Total</span>
                        <span>${{ total.toFixed(2) }}</span>
                    </div>
                </div>

                <!-- Nút thanh toán -->
                <div class="mt-6 flex justify-end">
                    <button class="bg-purple-600 hover:bg-purple-700 px-6 py-3 rounded-xl shadow-md">
                        Continue to Payment Method
                    </button>
                </div>
            </div>
        </div>
    </DefaultLayout>
</template>

<script setup>
import DefaultLayout from '@/Layouts/DefaultLayout.vue';
import { ref, computed } from "vue"
import course from '../../../css/assets/image/course.jpg';
import Icon from '@/Components/LucideIcon.vue';



const basketItems = ref([
    {
        category: "IT & SOFTWARE",
        title: "Master Class: React JS and Tailwind CSS",
        modules: 16,
        videos: 41,
        price: 59.5,
        image: course,
        checked: true,
    },
    {
        category: "IT & SOFTWARE",
        title: "Learn from Basic: React Javascript",
        modules: 12,
        videos: 35,
        price: 75,
        image: course,
        checked: false,
    },
    {
        category: "IT & SOFTWARE",
        title: "Full-Stack Laravel React JS: Build Streaming Website",
        modules: 17,
        videos: 39,
        price: 30,
        image: course,
        checked: false,
    },
    {
        category: "IT & SOFTWARE",
        title: "Web Security for Penetration Tester",
        modules: 11,
        videos: 32,
        price: 45.5,
        image: course,
        checked: true,
    },
    {
        category: "DESIGN",
        title: "Figma Freelancer Bootcamp",
        modules: 24,
        videos: 50,
        price: 63.7,
        image: course,
        checked: true,
    },
])

// Tính toán subtotal, phí, total
const subTotal = computed(() =>
    basketItems.value.filter((i) => i.checked).reduce((sum, i) => sum + i.price, 0)
)
const serviceFee = computed(() => subTotal.value * 0.03)
const total = computed(() => subTotal.value + serviceFee.value)
const totalItems = computed(() => basketItems.value.filter((i) => i.checked).length)

const removeItem = (index) => {
    basketItems.value.splice(index, 1)
}
</script>
