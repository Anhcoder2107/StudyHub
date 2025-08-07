<template>
    <DefaultLayout>
        <div
            class="rounded-2xl px-6 pt-6 overflow-y-auto h-[calc(100vh-6rem)] scrollbar-thin scrollbar-thumb-[#725DFF] scrollbar-track-gray-200">
            <div class="grid  grid-cols-5 gap-4 bg-white p-6 rounded-3xl shadow-md">
                <div class="col-span-1">
                   <SideBarSetting />
                </div>
                <div class="col-span-4">
                    ok
                </div>
            </div>
        </div>
    </DefaultLayout>
</template>


<script setup>
import DefaultLayout from '@/Layouts/DefaultLayout.vue';
import SideBarSetting from '@/Components/SideBarSetting.vue';


</script>
