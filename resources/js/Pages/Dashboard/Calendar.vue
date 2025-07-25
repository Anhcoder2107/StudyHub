<template>
    <DefaultLayout>
        <div
            class="flex gap-4 rounded-xl px-6 pt-6  h-[calc(100vh-6rem)] scrollbar-thin scrollbar-thumb-[#725DFF] scrollbar-track-gray-200">
            <main class="flex-1 rounded-xl  ">
                <!-- <h2 class="text-xl font-semibold mb-4">My Schedule</h2>
                <Calendar expanded :attributes="calendarEvents" mode="week" first-day-of-week="1"
                    :weekdays="[1, 2, 3, 4, 5, 6, 0]" /> -->

                <div class="bg-white rounded-xl shadow p-6">
                    <!-- Header -->
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="font-semibold text-lg">Schedule Task</h2>
                        <div class="text-indigo-600 font-medium">Week 2 of November, 2023</div>
                    </div>

                    <!-- Weekday Labels -->
                    <div class="grid grid-cols-[80px_repeat(7,1fr)] text-sm font-medium text-center ">
                        <div class="text-left pl-2">Time</div>
                        <div v-for="(day, index) in days" :key="index" class="py-2">
                            <div>{{ day.date }}</div>
                            <div :class="day.isToday ? 'text-indigo-600 font-bold' : 'text-gray-500'">
                                {{ day.label }}
                            </div>
                        </div>
                    </div>

                    <!-- Time Row + Day Grid -->
                    <div ref="gridContainer"
                        class="overflow-y-auto h-[calc(100vh-18rem)] scrollbar-thin scrollbar-thumb-[#725DFF] scrollbar-track-gray-200">
                        <div class="flex relative border-t">
                            <!-- Time Column (scroll theo) -->
                            <div class="w-20 flex flex-col pr-2">
                                <div v-for="hour in hours" :key="hour" class="h-20 text-xs text-right pr-1 pt-1">
                                    {{ hour }}
                                </div>
                            </div>

                            <!-- Event Grid -->
                            <div class="flex-1 relative">
                                <!-- Hour lines -->
                                <div class="absolute w-full z-0">
                                    <div v-for="(hour, index) in hours" :key="index"
                                        class="h-20 border-t border-gray-200"></div>
                                </div>

                                <!-- Events -->
                                <div class="relative z-10">
                                    <div v-for="(event, index) in events" :key="index"
                                    @click="openEditEvent(event)"
                                        class="absolute w-[calc(100%/7)] px-1" :style="{
                                            left: `calc((100% / 7) * ${event.dayIndex})`,
                                            top: getEventTop(event.start),
                                            height: getEventHeight(event.start, event.end)
                                        }">
                                        <div :class="['rounded-md text-xs p-2 shadow-md h-full', event.bgColor]">
                                            <div class="font-semibold">{{ event.title }}</div>
                                            <div>{{ event.time }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>

            <!-- Sidebar phải -->
            <aside class="w-80  rounded-x space-y-6 ">
                <button class="w-full bg-[#725DFF] text-white py-2 rounded-lg text-sm font-semibold">
                    + Add New Event
                </button>

                <div class="">
                    <DatePicker expanded v-model="selectedDate" />
                </div>

                <div class="bg-white rounded-xl p-4 shadow">
                    <h3 class="font-semibold text-xl mb-2">Category List</h3>
                    <ul class="space-y-2 text-sm">
                        <li v-for="(cat, i) in categories" :key="i" class="flex justify-between items-center">
                            <div class="flex items-center gap-2">
                                <span :class="['w-3 h-3 rounded-full', cat.color]"></span>
                                {{ cat.name }}
                            </div>
                            <span class="text-gray-500 text-xs">{{ cat.count }}</span>
                        </li>
                    </ul>
                </div>
            </aside>
        </div>

        <!-- Modal -->
        <!-- Overlay -->
        <div v-if="isModalOpen" class="fixed inset-0 bg-black/40 bg-opacity-50 z-40 transition-opacity duration-300" @click.self="closeEventModal"></div>

        <!-- Slide Modal -->
        <transition name="slide-right">
            <div v-if="isModalOpen"
                class="fixed top-0 right-0 h-full w-full max-w-md bg-white z-50 shadow-xl flex flex-col rounded-tl-xl rounded-bl-xl">
                <!-- Header -->
                <div class="flex items-center justify-between px-4 py-3 border-b">
                    <h2 class="text-lg font-semibold">Edit Event</h2>
                    <button @click="closeEventModal" class="text-gray-500 hover:text-red-500 text-xl">×</button>
                </div>

                <!-- Content -->
                <div class="p-4 flex-1 overflow-y-auto space-y-4">
                    <div>
                        <label class="block text-sm font-medium">Category</label>
                        <select v-model="editableEvent.bgColor" class="mt-1 w-full border rounded px-3 py-2 text-sm">
                            <option
                                v-for="cat in categories"
                                :key="cat.name"
                                :value="cat.color"
                                :selected="editableEvent.categories == cat.name"
                            >
                                {{ cat.name }}
                            </option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium">Event Name</label>
                        <input v-model="editableEvent.title" class="mt-1 w-full border rounded px-3 py-2 text-sm" />
                    </div>

                    <div>
                        <label class="block text-sm font-medium">Start Time</label>
                        <input type="time" v-model="editableEvent.start"
                            class="mt-1 w-full border rounded px-3 py-2 text-sm" />
                    </div>

                    <div>
                        <label class="block text-sm font-medium">End Time</label>
                        <input type="time" v-model="editableEvent.end"
                            class="mt-1 w-full border rounded px-3 py-2 text-sm" />
                    </div>

                    <div>
                        <label class="block text-sm font-medium">Event Description</label>
                        <textarea v-model="editableEvent.description" rows="3"
                            class="mt-1 w-full border rounded px-3 py-2 text-sm"></textarea>
                    </div>
                </div>

                <!-- Footer -->
                <div class="p-4 border-t flex justify-end">
                    <button @click="saveEvent" class="bg-violet-600 text-white px-4 py-2 rounded text-sm">Saved</button>
                </div>
            </div>
        </transition>

    </DefaultLayout>
</template>

<script setup>
import DefaultLayout from '@/Layouts/DefaultLayout.vue';
import { Calendar, DatePicker } from 'v-calendar';
import 'v-calendar/style.css';
import { ref, onMounted, nextTick } from 'vue';

const selectedDate = ref(new Date());


const calendarEvents = [
    {
        key: 'envato',
        highlight: { color: 'red' },
        dates: { start: new Date('2023-11-09T08:00:00'), end: new Date('2023-11-09T09:00:00') },
        popover: { label: 'Envato Mastery\nLearn a new parts' },
    },
    {
        key: 'design',
        highlight: { color: 'purple' },
        dates: { start: new Date('2023-11-09T10:00:00'), end: new Date('2023-11-09T12:00:00') },
        popover: { label: 'UI/UX Design Basic\nComplete Task 12' },
    },
    {
        key: 'git',
        highlight: { color: 'green' },
        dates: { start: new Date('2023-11-09T13:00:00'), end: new Date('2023-11-09T14:00:00') },
        popover: { label: 'Mastering Git & Vercel App\nLearn a new parts' },
    },
    {
        key: 'liveclass',
        highlight: { color: 'yellow' },
        dates: { start: new Date('2023-11-09T16:00:00'), end: new Date('2023-11-09T18:00:00') },
        popover: { label: 'Live Class\nHow to Make Money...' },
    },
];

const categories = [
    { name: 'Envato Mastery', color: 'bg-red-500', count: 1 },
    { name: 'UI/UX Design Basic', color: 'bg-purple-500', count: 1 },
    { name: 'Mastering Git & Vercel App', color: 'bg-green-500', count: 1 },
    { name: 'Live Class', color: 'bg-yellow-400', count: 1 },
];

const days = [
    { label: 'Mon', date: 5 },
    { label: 'Tue', date: 6 },
    { label: 'Wed', date: 7 },
    { label: 'Thu', date: 8 },
    { label: 'Fri', date: 9, isToday: true },
    { label: 'Sat', date: 10 },
    { label: 'Sun', date: 11 }
]

// Giờ hiển thị
const hours = [
    '12:00 AM', '01:00 AM', '02:00 AM', '03:00 AM',
    '04:00 AM', '05:00 AM', '06:00 AM', '07:00 AM',
    '08:00 AM', '09:00 AM', '10:00 AM', '11:00 AM',
    '12:00 PM', '01:00 PM', '02:00 PM', '03:00 PM',
    '04:00 PM', '05:00 PM', '06:00 PM', '07:00 PM',
    '08:00 PM', '09:00 PM', '10:00 PM', '11:00 PM'
]


// Sự kiện (giống ảnh mẫu)
const events = [
    {
        dayIndex: 2, // Friday
        start: '08:00',
        end: '09:00',
        title: 'Envato Mastery',
        description: 'Learn a new parts',
        time: '08:00 AM - 09:00 AM',
        bgColor: 'bg-red-100',
        categories: 'Envato Mastery'
    },
    {
        dayIndex: 3, // Friday
        start: '08:00',
        end: '09:00',
        title: 'Envato Mastery',
        description: 'Learn a new parts',
        time: '08:00 AM - 09:00 AM',
        bgColor: 'bg-red-100',
        categories: 'Envato Mastery'
    },
    {
        dayIndex: 4, // Friday
        start: '08:00',
        end: '09:00',
        title: 'Envato Mastery',
        description: 'Learn a new parts',
        time: '08:00 AM - 09:00 AM',
        bgColor: 'bg-red-100',
        categories: 'Envato Mastery'
    },
    {
        dayIndex: 4,
        start: '10:00',
        end: '12:00',
        title: 'UI/UX Design Basic',
        description: 'Complete Task 12',
        time: '10:00 AM - 12:00 PM',
        bgColor: 'bg-indigo-100',
        categories: 'UI/UX Design Basic'
    },
    {
        dayIndex: 4,
        start: '13:00',
        end: '14:00',
        title: 'Mastering Git & Vercel App',
        description: 'Learn a new parts',
        time: '01:00 PM - 02:00 PM',
        bgColor: 'bg-green-100',
        categories: 'Mastering Git & Vercel App'
    },
    {
        dayIndex: 4,
        start: '16:00',
        end: '18:00',
        title: 'Live Class',
        description: 'How to Make Money from...',
        time: '04:00 PM - 06:00 PM',
        bgColor: 'bg-yellow-100',
        categories: 'Live Class'
    }
]

const hourHeight = 80;

const parseTimeToMinutes = (timeStr) => {
    const [hour, minute] = timeStr.split(':').map(Number)
    return hour * 60 + minute
}

const getEventTop = (startTimeStr) => {
    const totalMinutes = parseTimeToMinutes(startTimeStr)
    const hourHeight = 80
    return `${(totalMinutes / 60) * hourHeight}px`
}

const getEventHeight = (startTimeStr, endTimeStr) => {
    const start = parseTimeToMinutes(startTimeStr)
    const end = parseTimeToMinutes(endTimeStr)
    const hourHeight = 80
    return `${((end - start) / 60) * hourHeight}px`
}


const gridContainer = ref(null);

onMounted(() => {
    nextTick(() => {
        const firstEvent = events[0];
        const scrollTo = parseTimeToMinutes(firstEvent.start) * (hourHeight / 60);
        if (gridContainer.value) {
            gridContainer.value.scrollTop = scrollTo;
        }
    });
});

const isModalOpen = ref(false);
const isEditing = ref(false); // true nếu đang chỉnh sửa

const editableEvent = ref({
  id: null,
  title: '',
  description: '',
  start: '',
  end: '',
  bgColor: 'bg-indigo-100',
  dayIndex: null,
});

// Mở modal để tạo mới
function openAddEvent(dayIndex) {
  isEditing.value = false;
  editableEvent.value = {
    id: Date.now(),
    title: '',
    description: '',
    start: '',
    end: '',
    bgColor: 'bg-indigo-100',
    dayIndex,
  };
  isModalOpen.value = true;
}

// Mở modal để sửa sự kiện
function openEditEvent(event) {
  isEditing.value = true;
  editableEvent.value = { ...event };
  isModalOpen.value = true;
}

// Đóng modal
function closeEventModal() {
  isModalOpen.value = false;
}

// Lưu sự kiện
function saveEvent() {
  if (isEditing.value) {
    // Cập nhật event
    console.log('Update event:', editableEvent.value);
  } else {
    // Tạo mới event
    console.log('Create new event:', editableEvent.value);
  }
  closeEventModal();
}

// Xoá sự kiện
function deleteEvent() {
  console.log('Delete event:', editableEvent.value.id);
  closeEventModal();
}
</script>


<style scoped>
.slide-right-enter-active,
.slide-right-leave-active {
  transition: transform 0.3s ease;
}
.slide-right-enter-from,
.slide-right-leave-to {
  transform: translateX(100%);
}
button {
  outline: none;
  border: none;
}
</style>
