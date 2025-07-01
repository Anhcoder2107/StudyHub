<template>
    <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded"
        :class="[color === 'light' ? 'bg-white' : 'bg-emerald-900 text-white']">
        <div class="rounded-t mb-0 px-4 py-3 border-0">
            <div class="flex flex-wrap items-center">
                <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                    <h3 class="font-semibold text-lg" :class="[color === 'light' ? 'text-blueGray-700' : 'text-white']">
                        {{ title }}
                    </h3>
                </div>
            </div>
        </div>
        <div class="block w-full overflow-x-auto">
            <table class="items-center w-full bg-transparent border-collapse">
                <thead>
                    <tr>
                        <th v-for="(header, index) in nameTable" :key="index"
                            class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left"
                            :class="[
                                color === 'light'
                                    ? 'bg-blueGray-50 text-blueGray-500 border-blueGray-100'
                                    : 'bg-emerald-800 text-emerald-300 border-emerald-700',
                            ]">
                            {{ header }}
                        </th>
                        <th v-if="showActions"
                            class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-right"
                            :class="[
                                color === 'light'
                                    ? 'bg-blueGray-50 text-blueGray-500 border-blueGray-100'
                                    : 'bg-emerald-800 text-emerald-300 border-emerald-700',
                            ]">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(record, index) in dataTable" :key="index">
                        <th v-if="record.image"
                            class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left flex items-center">
                            <!-- <img :src="record.image" class="h-12 w-12 bg-white rounded-full border" alt="..." /> -->
                            <span class=" font-bold"
                                :class="[color === 'light' ? 'text-blueGray-600' : 'text-white']">
                                {{ record.name }}
                            </span>
                        </th>
                        <td v-for="(key, colIndex) in Object.keys(record).filter(k => k !== 'name' && k !== 'image' && k !== 'team' && k !== 'progress' && k !== 'status')"
                            :key="colIndex"
                            class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                            {{ record[key] }}
                        </td>
                        <td v-if="record.status"
                            class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                            <i class="fas fa-circle mr-2" :class="getStatusClass(record.status)"></i>
                            {{ record.status }}
                        </td>
                        <td v-if="record.team"
                            class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                            <div class="flex">
                                <img v-for="(member, idx) in record.team" :key="idx" :src="member" alt="..."
                                    class="w-10 h-10 rounded-full border-2 border-blueGray-50 shadow -ml-4 first:ml-0" />
                            </div>
                        </td>
                        <td v-if="record.progress"
                            class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                            <div class="flex items-center">
                                <span class="mr-2">{{ record.progress }}%</span>
                                <div class="relative w-full">
                                    <div class="overflow-hidden h-2 text-xs flex rounded"
                                        :class="getProgressBarBgClass(record.status)">
                                        <div :style="{ width: record.progress + '%' }"
                                            class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center"
                                            :class="getProgressBarClass(record.status)">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td v-if="showActions && actions.length"
                            class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-right">
                            <TableDropdown :actions="actions" :row="record" :row-index="index" />
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
import TableDropdown from "../Dropdowns/TableDropdown.vue";


import bootstrap from "../../../../../css/assets/admin/img/bootstrap.jpg";
import angular from "../../../../../css/assets/admin/img/angular.jpg";
import sketch from "../../../../../css/assets/admin/img/sketch.jpg";
import react from "../../../../../css/assets/admin/img/react.jpg";
import vue from "../../../../../css/assets/admin/img/vue.jpg";
import team1 from "../../../../../css/assets/admin/img/team-1-800x800.jpg";
import team2 from "../../../../../css/assets/admin/img/team-2-800x800.jpg";
import team3 from "../../../../../css/assets/admin/img/team-3-800x800.jpg";
import team4 from "../../../../../css/assets/admin/img/team-4-470x470.png";

export default {
    name: "CardTable",
    components: {
        TableDropdown,
    },
    props: {
        showActions: {
            type: Boolean,
            default: true,
        },
        actions: {
            type: Function,
            required: true,
        },
        row: {
            type: Object,
            required: true,
        },
        rowIndex: {
            type: Number,
            required: true,
        },
        color: {
            default: "light",
            validator: function (value) {
                return ["light", "dark"].indexOf(value) !== -1;
            },
        },
        title: {
            type: String,
            default: "Card Tables",
        },
        nameTable: {
            type: Array,
            default: () => ["Name", "Budget", "Status", "Users", "Completion"],
        },
        dataTable: {
            type: Array,
            default: () => [
                {
                    name: "Argon Design System",
                    image: bootstrap,
                    budget: "$2,500 USD",
                    status: "pending",
                    team: [team1, team2, team3, team4],
                    progress: 60,
                },
                {
                    name: "Angular Now UI Kit PRO",
                    image: angular,
                    budget: "$1,800 USD",
                    status: "completed",
                    team: [team1, team2, team3, team4],
                    progress: 100,
                },
                {
                    name: "Black Dashboard Sketch",
                    image: sketch,
                    budget: "$3,150 USD",
                    status: "delayed",
                    team: [team1, team2, team3, team4],
                    progress: 73,
                },
                {
                    name: "React Material Dashboard",
                    image: react,
                    budget: "$4,400 USD",
                    status: "on schedule",
                    team: [team1, team2, team3, team4],
                    progress: 90,
                },
                {
                    name: "Vue Material Dashboard",
                    image: vue,
                    budget: "$2,200 USD",
                    status: "completed",
                    team: [team1, team2, team3, team4],
                    progress: 100,
                },
            ],
        },
    },
    methods: {
        getStatusClass(status) {
            const statusClasses = {
                pending: "text-orange-500",
                completed: "text-emerald-500",
                delayed: "text-red-500",
                "on schedule": "text-teal-500",
                active: "text-green-500",
            };
            return statusClasses[status] || "text-gray-500";
        },
        getProgressBarBgClass(status) {
            const bgClasses = {
                pending: "bg-red-200",
                completed: "bg-emerald-200",
                delayed: "bg-red-200",
                "on schedule": "bg-teal-200",
            };
            return bgClasses[status] || "bg-green-200";
        },
        getProgressBarClass(status) {
            const barClasses = {
                pending: "bg-red-500",
                completed: "bg-emerald-500",
                delayed: "bg-red-500",
                "on schedule": "bg-teal-500",
            };
            return barClasses[status] || "bg-green-500";
        },
    },
};
</script>
