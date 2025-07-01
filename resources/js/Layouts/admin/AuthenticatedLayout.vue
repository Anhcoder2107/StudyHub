<template>
    <div>
        <sidebar />
        <div class="relative md:ml-64 bg-blueGray-100">
            <admin-navbar />
            <!-- <header-stats /> -->
            <div class="px-4 md:px-10 mx-auto w-full ">
                <slot />
                <footer-admin />
            </div>
        </div>
    </div>
</template>
<script>
import AdminNavbar from "../../Components/admin/components/Navbars/AdminNavbar.vue";
import Sidebar from "../../Components/admin/components/Sidebar/Sidebar.vue";
import HeaderStats from "../../Components/admin/components/Headers/HeaderStats.vue";
import FooterAdmin from "../../Components/admin/components/Footers/FooterAdmin.vue";
export default {
    name: "admin-layout",
    components: {
        AdminNavbar,
        Sidebar,
        HeaderStats,
        FooterAdmin,
    },
};
</script>
