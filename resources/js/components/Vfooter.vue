<template>
  <v-footer white height="auto" class="v-footer">
    <v-flex xs12>
      <v-card flat tile class="text-xs-center">
        <v-card-text>
          <v-btn v-for="icon in icons" :key="icon" icon>
            <v-icon class="footer-button" size="24px">{{ icon }}</v-icon>
          </v-btn>
        </v-card-text>
      </v-card>
    </v-flex>
  </v-footer>
</template>

<script>


  export default {
    name: 'Vfooter',

    data: () => ({
      icons: [
        'fas fa-home',
        'fas fa-search',
        'fas fa-plus',
        'fas fa-glass-martini',
        'fas fa-calendar'
      ]
    })
  }
</script>

<style scoped>

</style>
