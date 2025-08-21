<template>
    <DefaultLayout>
        <form @submit.prevent="submitPayment" class="p-6 flex gap-6">
            <!-- Left: Payment Methods -->
            <div class="w-3/4 bg-white rounded-2xl shadow p-6">
                <h2 class="text-xl font-semibold mb-4">Payment Method</h2>

                <!-- Credit/Debit Card -->
                <label class="border rounded-xl p-4 mb-4 block cursor-pointer hover:border-indigo-500"
                    :class="{ 'border-indigo-500 ring-2 ring-indigo-200': paymentMethod === 'card' }">
                    <div class="flex items-center justify-between mb-3">
                        <div class="flex items-center gap-2">
                            <input type="radio" value="card" v-model="paymentMethod" class="text-indigo-500" />
                            <h3 class="font-medium">Credit/Debit Card</h3>
                        </div>
                        <div class="flex gap-2">
                            <img src="https://img.icons8.com/color/48/visa.png" class="h-8" />
                            <img src="https://img.icons8.com/color/48/mastercard.png" class="h-8" />
                        </div>
                    </div>

                    <div v-if="paymentMethod === 'card'" class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="text-sm text-gray-500">Name on Card</label>
                            <input v-model="card.name" type="text" placeholder="Peter Parker"
                                class="w-full rounded-lg border p-2 mt-1 focus:ring-2 focus:ring-indigo-300" required />
                        </div>
                        <div>
                            <label class="text-sm text-gray-500">Card Number</label>
                            <input v-model="card.number" type="text" placeholder="1234 5678 9012 3456"
                                class="w-full rounded-lg border p-2 mt-1 focus:ring-2 focus:ring-indigo-300" required />
                        </div>
                        <div>
                            <label class="text-sm text-gray-500">Expiry Date</label>
                            <input v-model="card.expiry" type="text" placeholder="08/29"
                                class="w-full rounded-lg border p-2 mt-1 focus:ring-2 focus:ring-indigo-300" required />
                        </div>
                        <div>
                            <label class="text-sm text-gray-500">CVC/CVV</label>
                            <input v-model="card.cvc" type="text" placeholder="123"
                                class="w-full rounded-lg border p-2 mt-1 focus:ring-2 focus:ring-indigo-300" required />
                        </div>
                    </div>
                </label>

                <!-- Other Payment Options -->
                <div class="space-y-3">
                    <label v-for="option in otherMethods" :key="option.name"
                        class="border rounded-xl p-4 flex justify-between items-center cursor-pointer hover:border-indigo-500"
                        :class="{ 'border-indigo-500 ring-2 ring-indigo-200': paymentMethod === option.value }">
                        <div class="flex items-center gap-2">
                            <input type="radio" :value="option.value" v-model="paymentMethod" class="text-indigo-500" />
                            <span>{{ option.name }}</span>
                        </div>
                        <img :src="option.logo" class="h-6" />
                    </label>
                </div>
            </div>

            <!-- Right: Order Details -->
            <div class="w-1/4 bg-white rounded-2xl shadow p-6">
                <h2 class="text-xl font-semibold mb-4">Order Details</h2>

                <!-- Courses -->
                <div class="space-y-4 mb-4">
                    <div class="flex gap-3" v-for="(c, i) in courses" :key="i">
                        <img :src="c.image" class="rounded-lg w-20 h-20" />
                        <div>
                            <p class="text-xs text-blue-500 font-medium">IT & SOFTWARE</p>
                            <p class="font-medium">{{ c.title }}</p>
                            <p class="text-sm text-gray-600">${{ c.price }}</p>
                        </div>
                    </div>
                </div>

                <!-- Coupon -->
                <div class="flex items-center gap-2 bg-gray-50 border rounded-lg px-3 py-2 mb-2">
                    <input v-model="coupon" type="text" placeholder="Enter coupon code"
                        class="flex-1 border-none bg-transparent focus:ring-0 text-sm" />
                    <button type="button" @click="applyCoupon" class="text-indigo-500 font-medium">Apply</button>
                </div>
                <p v-if="discountApplied" class="text-green-600 text-sm mb-3">
                    You saved 60% on this purchase, Hooray!
                </p>

                <!-- Price Summary -->
                <div class="space-y-1 text-sm text-gray-600">
                    <div class="flex justify-between">
                        <span>Sub Total</span>
                        <span>${{ subTotal }}</span>
                    </div>
                    <div v-if="discountApplied" class="flex justify-between text-green-600">
                        <span>Discount (60%)</span>
                        <span>-{{ discountAmount }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Service Fee (3%)</span>
                        <span>${{ serviceFee }}</span>
                    </div>
                    <div class="flex justify-between font-semibold text-lg text-gray-900 border-t pt-2">
                        <span>Total</span>
                        <span>${{ total }}</span>
                    </div>
                </div>

                <!-- Agreement -->
                <div class="flex items-start gap-2 mt-4">
                    <input type="checkbox" v-model="agree" required class="mt-1" />
                    <p class="text-xs text-gray-500">
                        By clicking this, you agree to our
                        <a href="#" class="text-indigo-500">Terms of Services</a> and
                        <a href="#" class="text-indigo-500">Privacy Policy</a>.
                    </p>
                </div>

                <!-- Pay Button -->
                <button type="submit"
                    class="mt-4 w-full py-3 bg-indigo-500 hover:bg-indigo-600 text-white rounded-xl font-medium disabled:opacity-50"
                    :disabled="!agree">
                    Pay
                </button>
            </div>
        </form>
    </DefaultLayout>
</template>

<script setup>
import { ref, computed } from 'vue';
import DefaultLayout from '@/Layouts/DefaultLayout.vue';
import course from '../../../css/assets/image/course.jpg';

const paymentMethod = ref('card');
const card = ref({ name: '', number: '', expiry: '', cvc: '' });

const otherMethods = [
    { name: 'Paypal', value: 'paypal', logo: 'https://img.icons8.com/color/48/paypal.png' },
    { name: 'Gopay', value: 'gopay', logo: 'https://images.seeklogo.com/logo-png/36/1/gopay-logo-png_seeklogo-369813.png' },
    { name: 'OVO', value: 'ovo', logo: 'https://images.seeklogo.com/logo-png/39/1/ovo-e-wallet-logo-png_seeklogo-399952.png' },
    { name: 'Mandiri', value: 'mandiri', logo: 'https://images.seeklogo.com/logo-png/1/1/bank-mandiri-logo-png_seeklogo-16290.png' },
    { name: 'Link Aja', value: 'linkaja', logo: 'https://images.seeklogo.com/logo-png/36/1/link-aja-logo-png_seeklogo-363129.png' },
];

const courses = [
    { title: 'Master Class: React JS and Tailwind CSS', price: 59.5, image: course },
    { title: 'Learn from Basic: React Javascript', price: 59.5, image: course },
];

const coupon = ref('');
const discountApplied = ref(false);
const agree = ref(false);

const subTotal = computed(() => courses.reduce((s, c) => s + c.price, 0));
const discountAmount = computed(() => discountApplied.value ? (subTotal.value * 0.6).toFixed(1) : 0);
const serviceFee = computed(() => (subTotal.value * 0.03).toFixed(1));
const total = computed(() => {
    let totalPrice = subTotal.value - discountAmount.value + parseFloat(serviceFee.value);
    return totalPrice.toFixed(1);
});

const applyCoupon = () => {
    if (coupon.value.toLowerCase() === 'save60') {
        discountApplied.value = true;
    } else {
        discountApplied.value = false;
        alert('Invalid coupon code');
    }
};

const submitPayment = () => {
    if (!agree.value) return alert('You must agree to Terms & Privacy');
    alert(`Paying ${total.value} USD via ${paymentMethod.value}`);
};
</script>
