<template>
    <layout-authen>
        <div class="container py-6 mx-auto">
            <div class="flex flex-wrap">
                <div class="w-full xl:w-8/12 mb-12 xl:mb-0 px-4">
                    <card-line-chart />
                </div>
                <div class="w-full xl:w-4/12 px-4">
                    <card-bar-chart />
                </div>
            </div>
            <div class="flex flex-wrap mt-4">
                <div class="w-full xl:w-8/12 mb-12 xl:mb-0 px-4">
                    <card-page-visits />
                </div>
                <div class="w-full xl:w-4/12 px-4">
                    <card-social-traffic />
                </div>
            </div>
        </div>
    </layout-authen>
</template>

<script>
import LayoutAuthen from '@/Layouts/admin/AuthenticatedLayout.vue';
import CardLineChart from "../../Components/admin/components/Cards/CardLineChart.vue";
import CardBarChart from "../../Components/admin/components/Cards/CardBarChart.vue";
import CardPageVisits from "../../Components/admin/components/Cards/CardPageVisits.vue";
import CardSocialTraffic from "../../Components/admin/components/Cards/CardSocialTraffic.vue";
export default {
    name: "dashboard-page",
    components: {
        CardLineChart,
        CardBarChart,
        CardPageVisits,
        CardSocialTraffic,
        LayoutAuthen
    },
};
</script>
