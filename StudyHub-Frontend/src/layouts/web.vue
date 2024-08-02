<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-2 ps-0 pe-0">
                <TheSidebar />
            </div>
            <div class="col-10 ps-0 pe-0 bg-light">
                <TheHeader />
                <div class="container pt-5 mt-3">
                    <router-view></router-view>
                </div>
                <TheFooter />
            </div>
        </div>
    </div>
</template>
<script>
    import TheSidebar from "../components/TheSidebar.vue";
    import TheHeader from "../components/TheHeader.vue";
    import TheFooter from "../components/TheFooter.vue";

    export default {
        components: {
            TheSidebar,
            TheHeader,
            TheFooter,
        }
    }


</script>