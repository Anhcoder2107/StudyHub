<template>
  <div>
    <navbar />
    <main>
      <section class="relative w-full h-full py-40 min-h-screen">
        <div
          class="absolute top-0 w-full h-full bg-blueGray-800 bg-no-repeat bg-full"
          :style="`background-image: url('${registerBg2}');`"
        ></div>
        <slot />
        <footer-small absolute />
      </section>
    </main>
  </div>
</template>
<script setup>
import Navbar from "../../Components/admin/components/Navbars/AuthNavbar.vue";
import FooterSmall from "../../Components/admin/components/Footers/FooterSmall.vue";

import registerBg2 from "../../../css/assets/admin/img/register_bg_2.png";

</script>
