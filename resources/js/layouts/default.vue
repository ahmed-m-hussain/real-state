<template>
  <div class="main-layout">
    <navbar />
    <!--<v-content>-->
      <div class="mrg-top">
        <child />

      </div>
    <!--</v-content>-->
    <div>
      <!--<vfooter />-->
    </div>
  </div>
</template>

<script>
import Navbar from '~/components/Navbar'
import Vfooter from '~/components/Vfooter'
import HeadNavbar from "../components/head-navbar";
import LocaleDropdown from "../components/LocaleDropdown";

export default {
  name: 'MainLayout',

  components: {
    LocaleDropdown,
    HeadNavbar,
    Navbar,
    Vfooter,
  }
}
</script>

<style scoped>

</style>
