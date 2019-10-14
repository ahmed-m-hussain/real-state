<template>
  <div class="basic-layout d-flex align-items-center justify-content-center m-0 bg-white">
    <child />
  </div>
</template>

<script>
import LocaleDropdown from "../components/LocaleDropdown";
export default {
  name: 'BasicLayout',
  components: {LocaleDropdown}
}
</script>
<style scoped>
    .basic-layout {
        background-color: #1B143E !important;

    }
</style>
