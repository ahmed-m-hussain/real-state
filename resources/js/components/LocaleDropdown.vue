<template>
    <div class="dropdown d-block text-center">
        <a class="dropdown-toggle" href="#" data-toggle="dropdown">
            <span class="icon-lng">
                <div class="text-icon">{{ locales[locale] }}</div>
            </span>
            <span v-if="locales[locale] == 'EN'">English</span>
            <span v-else-if="locales[locale] == 'DE'">German</span>
            <span v-else-if="locales[locale] == 'IT'">Italy</span>
        </a>
        <div class="dropdown-menu">
            <a v-for="(value, key) in locales" :key="key" class="dropdown-item dropdown-text" href="#" @click.prevent="setLocale(key)">{{ value }}</a>
        </div>
    </div>
</template>

<script>
import { mapGetters } from 'vuex'
import { loadMessages } from '~/plugins/i18n'
import Cookies from 'js-cookie'

export default {
    data() {
        return {

        };
    },
  computed: mapGetters({
    locale: 'lang/locale',
    locales: 'lang/locales'
  }),

  methods: {
    setLocale (locale) {
      if (this.$i18n.locale !== locale) {
        loadMessages(locale)
          this.$store.dispatch('lang/setLocale', { locale })
          bus.$emit('language', Cookies.get('locale'))
      }
    }
  }
}
</script>


<style scoped>
    .line li.nav-item {
        padding: 10px 10px;
    }

    .icon-lng {
        border: 1px solid #fff;
        border-radius: 50%;
        padding: 3px;
        width: 30px;
        height: 30px;
        display: inline-block;
    }

    .text-icon {
        margin-top: -1px;
        color: #fff;
    }

    .lng a.dropdown-toggle {
        color: #fff;
    }

    .lng a.dropdown-toggle:hover {
        text-decoration: none !important;
    }

    .dropdown-text {
        font-weight: 600;
        color: #1b143e;
    }
</style>
