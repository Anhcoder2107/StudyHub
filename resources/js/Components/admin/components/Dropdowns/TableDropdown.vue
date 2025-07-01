<template>
    <div>
        <!-- Dropdown Trigger -->
        <a class="text-blueGray-500 py-1 px-3" ref="btnDropdownRef" v-on:click="toggleDropdown($event)">
            <i class="fas fa-ellipsis-v"></i>
        </a>

        <!-- Dropdown Menu -->
        <div ref="popoverDropdownRef"
            class="bg-white text-base z-50 float-left py-2 list-none text-left rounded shadow-lg min-w-48"
            :class="{ 'hidden': !dropdownPopoverShow, 'block': dropdownPopoverShow }">
            <a v-for="(action, idx) in actions(row, rowIndex)" :key="`action-${idx}`" href="javascript:void(0);"
                class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-700 hover:bg-gray-100"
                @click="handleAction(action, row, rowIndex)">
                {{ action.label }}
            </a>
        </div>
    </div>
</template>

<script>
import { createPopper } from "@popperjs/core";

export default {
    name: "TableDropdown",
    props: {
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
    },
    data() {
        return {
            dropdownPopoverShow: false,
        };
    },
    methods: {
        toggleDropdown() {
            if (this.dropdownPopoverShow) {
                this.dropdownPopoverShow = false;
            } else {
                this.dropdownPopoverShow = true;
                createPopper(this.$refs.btnDropdownRef, this.$refs.popoverDropdownRef, {
                    placement: "bottom-start",
                    // modifiers: [
                    //     {
                    //         name: "offset",
                    //         options: {
                    //             offset: [0, 8],
                    //         },
                    //     },
                    // ],
                });
            }
        },
        handleAction(action, row, rowIndex) {
            action.action(row, rowIndex);
            this.dropdownPopoverShow = false;
        }
    },
};
</script>

<style scoped>
/* Thêm style nếu cần thiết */
</style>
