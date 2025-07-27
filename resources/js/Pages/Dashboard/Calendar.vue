```vue
<template>
    <DefaultLayout>
        <!-- Main container with flex layout and scrollbar styling -->
        <div
            class="flex gap-4 rounded-xl px-6 pt-6 h-[calc(100vh-6rem)] scrollbar-thin scrollbar-thumb-[#725DFF] scrollbar-track-gray-200">
            <!-- Main content area -->
            <main class="flex-1 rounded-xl">
                <div class="bg-white rounded-xl shadow p-6">
                    <!-- Header with week navigation and date picker -->
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="font-semibold text-lg w-40 border-r">Schedule Task</h2>
                        <div class="flex justify-between items-center w-full">
                            <div class="flex items-center gap-2">
                                <button @click="prevWeek" class="px-2 py-1 border rounded text-sm">←</button>
                                <h2 class="font-semibold text-lg cursor-pointer" @click="toggleDatePicker">
                                    {{ format(weekDays[0], 'dd MMM yyyy') }} - {{ format(weekDays[6], 'dd MMM yyyy') }}
                                </h2>
                                <button @click="nextWeek" class="px-2 py-1 border rounded text-sm">→</button>
                            </div>
                            <div class="text-indigo-600 font-medium relative inline-block" @click="toggleDatePicker">
                                Week {{ getWeek(weekDays[0]) }} of {{ format(weekDays[0], 'MMMM, yyyy') }}
                                <div v-if="isDatePickerOpen"
                                    class="absolute right-0 z-50 bg-white shadow-lg mt-2 rounded-lg" @click.stop>
                                    <DatePicker :key="datePickerKey" v-model="selectedDate" @dayclick="onDatePicked"
                                        is-expanded :attributes="calendarEvents" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Weekday labels grid -->
                    <div class="grid grid-cols-[80px_repeat(7,1fr)] text-sm font-medium text-center">
                        <div class="text-left pl-2">Time</div>
                        <div v-for="(day, index) in days" :key="index" class="py-2">
                            <div>{{ day.date }}</div>
                            <div :class="day.isToday ? 'text-indigo-600 font-bold' : 'text-gray-500'">
                                {{ day.label }}
                            </div>
                        </div>
                    </div>

                    <!-- Time grid with events -->
                    <div ref="gridContainer"
                        class="overflow-y-auto h-[calc(100vh-18rem)] scrollbar-thin scrollbar-thumb-[#725DFF] scrollbar-track-gray-200">
                        <div class="flex relative border-t">
                            <!-- Time column -->
                            <div class="w-20 flex flex-col pr-2">
                                <div v-for="hour in hours" :key="hour" class="h-20 text-xs text-right pr-1 pt-1">
                                    {{ hour }}
                                </div>
                            </div>

                            <!-- Event grid with hour lines -->
                            <div class="flex-1 relative">
                                <div class="absolute w-full z-0">
                                    <div v-for="(hour, index) in hours" :key="index"
                                        class="h-20 border-t border-gray-200"></div>
                                </div>
                                <div v-for="event in weekEvents" :key="event.id" class="absolute w-[calc(100%/7)] px-1"
                                    :id="`event-${event.id}`" :style="{
                                        left: `calc((100% / 7) * ${getDayIndex(event.date)})`,
                                        top: getEventTop(event.start),
                                        height: getEventHeight(event.start, event.end)
                                    }" @click="openEditEvent(event)">
                                    <div class="rounded-md text-xs p-2 shadow-md h-full" :class="event.bgColor"
                                        :style="{ backgroundColor: event.bgColor }">
                                        <div class="font-semibold">{{ event.title }}</div>
                                        <div>{{ event.time }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>

            <!-- Sidebar with event creation and categories -->
            <aside class="w-80 rounded-xl space-y-6">
                <button class="w-full bg-[#725DFF] text-white py-2 rounded-lg text-sm font-semibold"
                    @click="openAddEvent(null)">
                    + Add New Event
                </button>
                <div>
                    <DatePicker :key="datePickerKey" expanded v-model="selectedDate" :attributes="calendarEvents"
                        @dayclick="onDatePicked">
                        <template #footer>
                            <div class="w-full px-3 pb-3">
                                <button
                                    class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold w-full px-3 py-1 rounded-md"
                                    @click="setToday">
                                    Today
                                </button>
                            </div>
                        </template>
                    </DatePicker>
                </div>
                <div class="bg-white rounded-xl p-4 shadow">
                    <h3 class="font-semibold text-xl mb-2">Category List</h3>
                    <ul class="space-y-2 text-sm">
                        <li v-for="(cat, i) in categories" :key="i" class="flex justify-between items-center">
                            <div class="flex items-center gap-2">
                                <span class="w-3 h-3 rounded-full" :style="{ backgroundColor: cat.color }"></span>
                                {{ cat.name }}
                            </div>
                            <span class="text-gray-500 text-xs">{{ cat.count }}</span>
                        </li>
                    </ul>
                </div>
            </aside>
        </div>

        <!-- Modal for event editing -->
        <div v-if="isModalOpen" class="fixed inset-0 bg-black/40 bg-opacity-50 z-40 transition-opacity duration-300"
            @click.self="closeEventModal"></div>
        <transition name="slide-right">
            <div v-if="isModalOpen"
                class="fixed top-0 right-0 h-full w-full max-w-md bg-white z-50 shadow-xl flex flex-col rounded-tl-xl rounded-bl-xl">
                <div class="flex items-center justify-between px-4 py-3 border-b">
                    <h2 class="text-lg font-semibold">Edit Event</h2>
                    <button @click="closeEventModal" class="text-gray-500 hover:text-red-500 text-xl">×</button>
                </div>
                <div class="p-4 flex-1 overflow-y-auto space-y-4">
                    <div>
                        <label class="block text-sm font-medium">Category</label>
                        <select v-model="editableEvent.category" @change="onCategoryChange"
                            class="mt-1 w-full border rounded px-3 py-2 text-sm">
                            <option v-for="cat in categories" :key="cat.name" :value="cat.name">{{ cat.name }}</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium">Event Name</label>
                        <input v-model="editableEvent.title" class="mt-1 w-full border rounded px-3 py-2 text-sm" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium">Event Date</label>
                        <input type="date" v-model="editableEvent.date"
                            class="mt-1 w-full border rounded px-3 py-2 text-sm" />
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
                    <div>
                        <label class="block text-sm font-medium mb-1">Choose Event Color (Optional)</label>
                        <div class="flex gap-2 flex-wrap">
                            <div v-for="color in colorOptions" :key="color"
                                class="w-6 h-6 rounded-full cursor-pointer border-2"
                                :class="{ 'border-black': editableEvent.bgColor === color, 'border-transparent': editableEvent.bgColor !== color }"
                                :style="{ backgroundColor: color }" @click="editableEvent.bgColor = color"></div>
                        </div>
                        <button class="text-sm text-blue-500 underline mt-2" @click="resetColorToCategory">Reset to
                            Category
                            Color</button>
                    </div>
                </div>
                <div class="p-4 border-t flex justify-between items-center">
                    <button v-if="isEditing" @click="deleteEvent" class="text-red-600 text-sm underline">Delete</button>
                    <button @click="saveEvent" class="bg-violet-600 text-white px-4 py-2 rounded text-sm">Save</button>
                </div>
            </div>
        </transition>
    </DefaultLayout>
</template>

<script setup>
import '../../../../resources/css/theme.css';
import DefaultLayout from '@/Layouts/DefaultLayout.vue';
import { Calendar, DatePicker } from 'v-calendar';
import 'v-calendar/style.css';
import { ref, onMounted, nextTick, computed } from 'vue';
import { startOfWeek, addDays, isToday, format, getWeek, isSameDay } from 'date-fns';

// Constants
const hourHeight = 80;
const hours = [
    '12:00 AM', '01:00 AM', '02:00 AM', '03:00 AM', '04:00 AM', '05:00 AM',
    '06:00 AM', '07:00 AM', '08:00 AM', '09:00 AM', '10:00 AM', '11:00 AM',
    '12:00 PM', '01:00 PM', '02:00 PM', '03:00 PM', '04:00 PM', '05:00 PM',
    '06:00 PM', '07:00 PM', '08:00 PM', '09:00 PM', '10:00 PM', '11:00 PM'
];
const colorOptions = ['red', 'yellow', 'green', 'blue', 'indigo', 'purple', 'pink'];
const categories = [
    { name: 'Envato Mastery', color: 'red', count: 1 },
    { name: 'UI/UX Design Basic', color: 'purple', count: 1 },
    { name: 'Mastering Git & Vercel App', color: 'green', count: 1 },
    { name: 'Live Class', color: 'yellow', count: 1 },
];

// Reactive state
const isDatePickerOpen = ref(false);
const isModalOpen = ref(false);
const isEditing = ref(false);
const gridContainer = ref(null);
const selectedDate = ref(new Date());
const selectedWeekStartDate = ref(startOfWeek(new Date(), { weekStartsOn: 1 }));
const events = ref([
    {
        id: 1, date: new Date('2025-07-25'), start: '08:00', end: '09:00',
        title: 'Envato Mastery', description: 'Learn a new parts', time: '08:00 AM - 09:00 AM',
        bgColor: 'red', category: 'Envato Mastery', dot: 'red'
    },
    {
        id: 2, date: new Date('2023-11-07'), start: '08:00', end: '09:00',
        title: 'Envato Mastery', description: 'Learn a new parts', time: '08:00 AM - 09:00 AM',
        bgColor: 'red', category: 'Envato Mastery'
    },
    {
        id: 3, date: new Date('2023-11-08'), start: '08:00', end: '09:00',
        title: 'Envato Mastery', description: 'Learn a new parts', time: '08:00 AM - 09:00 AM',
        bgColor: 'red', category: 'Envato Mastery'
    },
    {
        id: 4, date: new Date('2023-11-09'), start: '10:00', end: '12:00',
        title: 'UI/UX Design Basic', description: 'Complete Task 12', time: '10:00 AM - 12:00 PM',
        bgColor: 'indigo', category: 'UI/UX Design Basic'
    },
    {
        id: 5, date: new Date('2023-11-09'), start: '13:00', end: '14:00',
        title: 'Mastering Git & Vercel App', description: 'Learn a new parts', time: '01:00 PM - 02:00 PM',
        bgColor: 'green', category: 'Mastering Git & Vercel App'
    },
    {
        id: 6, date: new Date('2023-11-09'), start: '16:00', end: '18:00',
        title: 'Live Class', description: 'How to Make Money from...', time: '04:00 PM - 06:00 PM',
        bgColor: 'yellow', category: 'Live Class'
    }
]);
const editableEvent = ref({
    id: null, title: '', description: '', start: '', end: '', bgColor: '', date: null, dayIndex: null
});

// Computed properties
const datePickerKey = computed(() => format(selectedDate.value, 'yyyy-MM'));
const weekDays = computed(() => Array.from({ length: 7 }, (_, i) => addDays(selectedWeekStartDate.value, i)));
const days = computed(() => weekDays.value.map((date, i) => ({
    label: format(date, 'EEE'),
    date: format(date, 'dd'),
    fullDate: date,
    isToday: isToday(date)
})));
const weekEvents = computed(() => events.value.filter(event => weekDays.value.some(day => isSameDay(day, event.date))));
const calendarEvents = computed(() => events.value.map(ev => ({
    key: ev.id,
    highlight: { color: ev.bgColor },
    dates: { start: new Date(ev.date.toDateString() + ' ' + ev.start), end: new Date(ev.date.toDateString() + ' ' + ev.end) },
    popover: { label: `${ev.title}\n${ev.description}` }
})));

// Utility functions
const parseTimeToMinutes = (timeStr) => {
    const [hour, minute] = timeStr.split(':').map(Number);
    return hour * 60 + minute;
};
const getEventTop = (startTimeStr) => `${(parseTimeToMinutes(startTimeStr) / 60) * hourHeight}px`;
const getEventHeight = (startTimeStr, endTimeStr) => `${((parseTimeToMinutes(endTimeStr) - parseTimeToMinutes(startTimeStr)) / 60) * hourHeight}px`;
const getDayIndex = (date) => {
    const diff = Math.floor((date - selectedWeekStartDate.value) / (1000 * 60 * 60 * 24));
    return Math.max(0, Math.min(6, diff)); // Ensure index is within 0-6
};
const formatTime = (timeStr) => {
    const [hour, minute] = timeStr.split(':').map(Number);
    const ampm = hour >= 12 ? 'PM' : 'AM';
    const h = hour % 12 || 12;
    return `${String(h).padStart(2, '0')}:${minute.toString().padStart(2, '0')} ${ampm}`;
};

// Event handlers
const toggleDatePicker = () => { isDatePickerOpen.value = !isDatePickerOpen.value; };
const nextWeek = () => {
    selectedWeekStartDate.value = addDays(selectedWeekStartDate.value, 7);
    selectedDate.value = selectedWeekStartDate.value;
};
const prevWeek = () => {
    selectedWeekStartDate.value = addDays(selectedWeekStartDate.value, -7);
    selectedDate.value = selectedWeekStartDate.value;
};
const setToday = () => {
    const today = new Date();
    selectedDate.value = today;
    selectedWeekStartDate.value = startOfWeek(today, { weekStartsOn: 1 });
    const todayEvent = events.value.find(event => isSameDay(event.date, today));
    if (todayEvent) scrollToEvent(todayEvent.id, today);
};
const onDatePicked = (day) => {
    const pickedDate = day.date ? new Date(day.date) : new Date(day);
    selectedDate.value = pickedDate;
    selectedWeekStartDate.value = startOfWeek(pickedDate, { weekStartsOn: 1 });
    isDatePickerOpen.value = false;

    // Find the first event on the selected date
    const targetEvent = events.value.find(event => isSameDay(event.date, pickedDate));
    if (targetEvent) {
        scrollToEvent(targetEvent.id, pickedDate);
    } else {
        // If no event, scroll to the start of the day (e.g., midnight)
        if (gridContainer.value) {
            gridContainer.value.scrollTo({ top: 0, behavior: 'smooth' });
        }
    }
};
const scrollToEvent = (eventId, targetDate) => {
    // Ensure the week view includes the target date
    if (targetDate && !weekDays.value.some(day => isSameDay(day, targetDate))) {
        selectedWeekStartDate.value = startOfWeek(targetDate, { weekStartsOn: 1 });
    }

    // Wait for the DOM to update with the new week
    nextTick(() => {
        const container = gridContainer.value;
        const el = document.getElementById(`event-${eventId}`);
        if (container && el) {
            const eventTop = el.offsetTop;
            container.scrollTo({ top: eventTop - 60, behavior: 'smooth' });
        }
    });
};
const scrollToFirstEvent = () => {
    const firstEvent = weekEvents.value[0];
    if (firstEvent?.start && gridContainer.value) {
        gridContainer.value.scrollTop = parseTimeToMinutes(firstEvent.start) * (hourHeight / 60);
    }
};
const openAddEvent = (dayIndex) => {
    isEditing.value = false;
    editableEvent.value = {
        id: Date.now(), title: '', description: '', start: '', end: '', bgColor: '',
        date: dayIndex !== null ? weekDays.value[dayIndex] : selectedDate.value, dayIndex
    };
    isModalOpen.value = true;
};
const openEditEvent = (event) => {
    isEditing.value = true;
    editableEvent.value = { ...event, date: format(event.date, 'yyyy-MM-dd'), bgColor: event.bgColor || categories.find(c => c.name === event.category)?.color || '' };
    isModalOpen.value = true;
};
const closeEventModal = () => { isModalOpen.value = false; };
const saveEvent = () => {
    const event = { ...editableEvent.value };
    if (!event.bgColor) event.bgColor = categories.find(c => c.name === event.category)?.color || 'red';
    event.date = new Date(event.date + 'T00:00:00');
    event.time = `${formatTime(event.start)} - ${formatTime(event.end)}`;
    if (isEditing.value) {
        const index = events.value.findIndex(ev => ev.id === event.id);
        if (index !== -1) events.value[index] = event;
    } else {
        events.value.push(event);
    }
    closeEventModal();
};
const deleteEvent = () => {
    events.value = events.value.filter(ev => ev.id !== editableEvent.value.id);
    closeEventModal();
};
const onCategoryChange = () => {
    if (!editableEvent.value.bgColor || categories.some(cat => cat.color === editableEvent.value.bgColor)) {
        editableEvent.value.bgColor = categories.find(c => c.name === editableEvent.value.category)?.color || 'red';
    }
};
const resetColorToCategory = () => {
    editableEvent.value.bgColor = categories.find(c => c.name === editableEvent.value.category)?.color || 'red';
};

// Lifecycle hooks
onMounted(() => nextTick(scrollToFirstEvent));
</script>

<style scoped>
/* Slide transition for modal */
.slide-right-enter-active,
.slide-right-leave-active {
    transition: transform 0.3s ease;
}

.slide-right-enter-from,
.slide-right-leave-to {
    transform: translateX(100%);
}

/* Button styling */
button {
    outline: none;
    border: none;
}
</style>
```
