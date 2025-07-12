<script setup>
import Navbar from '@/Components/Navbar.vue';
import SideBar from '@/Components/SideBar.vue';

import PlayCircle from '../../../resources/css/assets/icon/PlayCircle.svg'



</script>



<template>
    <div class="min-h-screen bg-neutral-100">
        <div class="fixed top-28 left-6 h-full w-64 bg-white rounded-xl ">
            <div class="dark-mode">

            </div>
            <div class="title">

            </div>
            <div class="chapter">
                <div class="title">
                   <div class="">
                       Introduction
                        <span class="dropup">
                            ^
                        </span>
                   </div>
                    <span>
                        2 Course
                    </span>

                </div>
                <div class="list-course">
                    <div class="item">
                        <img :src="PlayCircle" alt="">
                        <div class="">
                            <div class="name">Lesson 1</div>
                            <div class="time">2 minutes</div>
                        </div>
                    </div>
                     <div class="item">
                        <img :src="PlayCircle" alt="">
                        <div class="">
                            <div class="name">Lesson 1</div>
                            <div class="time">2 minutes</div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
        <Navbar />

        <div class="ml-64 fixed top-6 left-0 right-0">

            <slot />
        </div>


    </div>
</template>
