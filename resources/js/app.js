import Vue from 'vue'
import store from '~/store'
import router from '~/router'
import i18n from '~/plugins/i18n'
import App from '~/components/App'
import Vuetify from 'vuetify'
import BootstrapVue from 'bootstrap-vue'
import {
    PaginationPlugin
} from 'bootstrap-vue'
import * as VueGoogleMaps from 'vue2-google-maps'
import Vuelidate from 'vuelidate'



import '~/plugins'
import '~/components'

Vue.config.productionTip = false
Vue.use(Vuetify)
Vue.use(PaginationPlugin)
Vue.use(Vuelidate)
/* eslint-disable no-new */
new Vue({
    i18n,
    store,
    router,
    Vuetify,
    ...App
});
Vue.use(BootstrapVue);
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'
window.$ = require('jquery');
Vue.use(VueGoogleMaps, {
    load: {
        key: 'AIzaSyCvE9xEo7_ctK8R9n8VCuz3ghWsiqRE8o4',
        libraries: 'places'
    }
});

window.bus = new Vue();
