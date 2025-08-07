<template>
    <DefaultLayout>
        <div
            class="rounded-2xl px-6 pt-6 ">
            <div class="grid  grid-cols-5 gap-4 bg-white rounded-3xl shadow-md">
                <div class="col-span-1 rounded-l-3xl border-r border-gray-200 p-6">
                   <SideBarSetting />
                </div>
                <div class="col-span-4 h-fit">
                    <slot />
                </div>
            </div>
        </div>
    </DefaultLayout>
</template>


<script setup>
import DefaultLayout from '@/Layouts/DefaultLayout.vue';
import SideBarSetting from '@/Components/SideBarSetting.vue';


</script>
