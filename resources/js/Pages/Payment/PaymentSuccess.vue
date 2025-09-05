<template>
    <DefaultLayout>
        <div class="p-8">
            <div class="bg-white rounded-2xl shadow-md p-8 flex flex-col md:flex-row gap-8">

                <!-- Left: Payment Info -->
                <div class="flex-1">
                    <h2 class="text-2xl font-semibold text-gray-800 mb-2">
                        Your payment has succeed!
                    </h2>
                    <p class="text-gray-600 mb-6">
                        🎉 Thank you for choosing our courses. Your receipt has been sent to your email.
                        Get ready for a fulfilling learning experience!
                    </p>

                    <div class="border rounded-xl p-6 relative">
                        <!-- PAID stamp -->
                        <span
                            class="absolute top-8 right-6 text-4xl font-extrabold text-red-500 rotate-[-15deg] opacity-70">
                            PAID
                        </span>

                        <div class="grid grid-cols-2 gap-y-2 text-sm text-gray-700">
                            <span class="font-medium">Date:</span> <span>23 November 2023</span>
                            <span class="font-medium">Time:</span> <span>05:12 PM</span>
                            <span class="font-medium">Payment with:</span> <span>Credit/Debit Card</span>
                            <span class="font-medium">Card number:</span> <span>1234 5678 9012 1345</span>
                        </div>

                        <!-- Course List -->
                        <div class="mt-6 space-y-4">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-3">
                                    <img src="https://via.placeholder.com/50" class="w-12 h-12 rounded-md" />
                                    <div>
                                        <p class="font-medium text-gray-800">Master Class: React JS and Tailwind CSS</p>
                                        <p class="text-xs text-gray-500">16 Modules · 41 Videos</p>
                                    </div>
                                </div>
                                <span class="font-semibold text-gray-800">$59.5</span>
                            </div>

                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-3">
                                    <img src="https://via.placeholder.com/50" class="w-12 h-12 rounded-md" />
                                    <div>
                                        <p class="font-medium text-gray-800">Learn from Basic: React Javascript</p>
                                        <p class="text-xs text-gray-500">21 Modules · 50 Videos</p>
                                    </div>
                                </div>
                                <span class="font-semibold text-gray-800">$59.5</span>
                            </div>
                        </div>

                        <!-- Price Summary -->
                        <div class="mt-6 border-t pt-4 space-y-2 text-sm">
                            <div class="flex justify-between">
                                <span class="text-gray-600">Sub Total</span>
                                <span>$119</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Discount (60%)</span>
                                <span class="text-green-600">- $71.4</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Service Fee (3%)</span>
                                <span>$1.4</span>
                            </div>
                            <div class="flex justify-between text-lg font-bold text-gray-800 border-t pt-2">
                                <span>Total</span>
                                <span>$49</span>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex gap-4 mt-6">
                        <button
                            class="px-5 py-3 border border-purple-500 text-purple-600 rounded-xl font-medium hover:bg-purple-50">
                            Back to Dashboard
                        </button>
                        <button class="px-5 py-3 bg-purple-600 text-white rounded-xl font-medium hover:bg-purple-700">
                            Start Learning
                        </button>
                    </div>
                </div>

                <!-- Right: Illustration -->
                <div class="flex-1 flex items-center justify-center">
                    <img src="https://cdn-icons-png.flaticon.com/512/2920/2920244.png" alt="payment illustration"
                        class="max-w-xs w-full" />
                </div>
            </div>
        </div>
    </DefaultLayout>
</template>

<script setup>
import DefaultLayout from "@/Layouts/DefaultLayout.vue";
</script>
