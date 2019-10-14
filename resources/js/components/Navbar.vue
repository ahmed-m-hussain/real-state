<template>
    <header class="about-page contact-page-bg" :style="{ backgroundImage: 'url('+image+')' }" v-bind:class="{ amministrazione: currentRouteName == 'amministrazione'}">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <router-link class="navbar-brand" :to="{ name: 'home' }">
                <img src="images/logo.png" alt="" class="img-fluid navbar-logo">
            </router-link>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarNav">
                <ul class="navbar-nav ml-auto menu">
                    <li class="nav-item">
                        <router-link class="nav-link" :to="{ name: 'about' }">
                            {{ $t('about') }}
                        </router-link>
                        <div v-if="currentRouteName == 'about'" class="mx-auto circle-icon"></div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle service" id="navbardrop" data-toggle="dropdown">
                            {{ $t('services') }}
                        </a>
                        <div v-if="currentRouteName == 'service'" class="mx-auto circle-icon"></div>
                        <div class="dropdown-menu">
                            <router-link :to="{ name: 'service' }" class="dropdown-item dropdown-text d-flex align-items-center" href="#">
                                Real Estate Appraisals
                                <div class="ml-auto circle-icon"></div>
                            </router-link>
                            <router-link :to="{ name: 'amministrazione' }" class="dropdown-item dropdown-text" href="#">
                                Administration
                            </router-link>
                        </div>
                    </li>
                    <li class="nav-item">
                    <li class="nav-item">
                        <router-link :to="{ name: 'real-estate' }" class="nav-link its">
                            {{ $t('real_estate') }}
                        </router-link>
                        <div v-if="currentRouteName == 'real-estate'" class="mx-auto circle-icon"></div>
                    </li>
                    <li class="nav-item">
                        <router-link :to="{ name: 'contact' }" class="nav-link">
                            {{ $t('contact') }}
                        </router-link>
                        <div v-if="currentRouteName == 'contact'" class="mx-auto circle-icon"></div>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 v-if="currentRouteName == 'about'"  class="head-text text-center">
                        <span v-if="lang == 'en'">{{about.page_title_en}} </span>
                        <span v-else-if="lang == 'de'">{{about.page_title_de}}</span>
                        <span v-else-if="lang == 'it'">{{about.page_title_it}}</span>
                    </h1>
                    <h1 v-if="currentRouteName == 'service'"  class="head-text text-center">
                        <span v-if="lang == 'en'">{{service.page_title_en}} </span>
                        <span v-else-if="lang == 'de'">{{service.page_title_de}}</span>
                        <span v-else-if="lang == 'it'">{{service.page_title_it}}</span>
                    </h1>
                    <div v-if="currentRouteName == 'amministrazione'"   class="head-text text-center">
                        <i class="fa fa-home item-home" aria-hidden="true"></i>
                        <h1>
                            <span v-if="lang == 'en'">{{administration.page_title_en}} </span>
                            <span v-else-if="lang == 'de'">{{administration.page_title_de}}</span>
                            <span v-else-if="lang == 'it'">{{administration.page_title_it}}</span>
                        </h1>
                    </div>

                </div>
            </div>
        </div>
    </header>
</template>

<script>
  import LocaleDropdown from './LocaleDropdown'
  import Cookies from 'js-cookie'
  export default {
    components: {
      LocaleDropdown
    },

      data() {
          return {
              image:'',
              about: {},
              lang: '',
              service: {},
              administration: {},
          }
      },
    computed: {
        currentRouteName() {
            this.image =  '/images/'+this.$route.name+'-bg.jpg'
            return this.$route.name;
        },

    },


    methods: {
        getAbout() {
            let _this = this;
            axios.get('/api/v1/about').then(function (response) {
                _this.about = response.data.about;
            }).catch(function (error) {

            });
        },

        getService() {
            let _this = this;
            axios.get('/api/v1/service').then(function (response) {
                _this.service = response.data.realEstateAppraisal;
            }).catch(function (error) {

            });
        },

        getAdministration() {
            let _this = this;
            axios.get('/api/v1/administration').then(function (response) {
                _this.administration = response.data.administration;
            }).catch(function (error) {

            });
        },
    },

    created() {
        let _this = this;
        this.lang = Cookies.get('locale');
        bus.$on('language', (data) => {
            _this.lang = data;
            _this.getAbout()
            _this.getService();
            _this.getAdministration();
        })
        this.getAbout();
        this.getService();
        this.getAdministration();
    },

    mounted() {

    }
  }
</script>

<style scoped>
    img.img-fluid.navbar-logo {
        height: 80px;
    }

    header.about-page {
        height: 350px;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: 0 37%;
    }


    .amministrazione {
        height: 305px !important;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: 0 73% !important;;
    }


    .real-page {
        background-color: #261b57;
        height: 50px !important;
        /*display: block;*/

    }

    .head-text {
        margin-top: 95px;
        position: absolute;
        color: #fff;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    main.info-block h1 {
        color: #fff;
        letter-spacing: 2px;
        font-size: 30px;
    }

    main.info-block p {
        margin-top: 30px;
        color: #fff;
        letter-spacing: 2px;
        font-size: 16px;
    }

    .about-page a.nav-link {
        margin: 5px;
    }

    .circle-icon {
        width: 7px;
        height: 7px;
        border: 1px solid #1b143e;
        border-radius: 50%;
    }

    .circle-icon.mx-auto {
        width: 7px;
        height: 7px;
        border: 1px solid #ffffff;
        border-radius: 50%;
    }

    .service{
        cursor: pointer;
    }

    i.fa.fa-home.item-home {
        color: #fff;
        font-size: 30px;
    }

    .head-text {
        /* top: 50%; */
        margin-top: 65px;
        position: absolute;
        color: #F4F4F3;
        left: 50%;
        transform: translate(-50%, -50%);
    }

</style>

