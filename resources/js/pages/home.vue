<template>
    <div class="container background">
        <div class="container-fluid logo-block">
            <div class="row">
                <div class="col-lg-12">
                    <img src="images/logo.png" class="img-fluid d-block mx-auto logo">
                </div>
            </div>
            <nav class="navbar navbar-expand-sm navbar-dark ">
                <button class="navbar-toggler mx-auto" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarNav">
                    <ul class="navbar-nav mx-auto line">
                        <li class="nav-item">
                            <router-link class="nav-link" :to="{ name: 'about' }">
                                {{ $t('about') }}
                            </router-link>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbardrop" data-toggle="dropdown">
                                {{ $t('services') }}
                            </a>
                            <div class="dropdown-menu">
                                <router-link :to="{ name: 'service' }" class="dropdown-item dropdown-text d-flex align-items-center" href="#">Real Estate Appraisals
                                    <div class="ml-auto circle-icon"></div>
                                </router-link>
                                <router-link :to="{ name: 'amministrazione' }" class="dropdown-item dropdown-text" href="#">
                                    Administration
                                </router-link>
                            </div>
                        </li>
                        <li class="nav-item">
                            <router-link :to="{ name: 'real-estate' }" class="nav-link its">
                                {{ $t('real_estate') }}
                            </router-link>
                        </li>
                        <li class="nav-item">
                            <router-link :to="{ name: 'contact' }" class="nav-link">
                                {{ $t('contact') }}
                            </router-link>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="container lng">
            <div class="row">
                <div class="col-lg-12 mr-5">
                    <locale-dropdown></locale-dropdown>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import LocaleDropdown from "../components/LocaleDropdown";
    export default {
        components: {LocaleDropdown},
        layout: 'basic',

        metaInfo() {
            return {title: this.$t('home')}
        },

        data: () => ({
            title: window.config.appName
        }),

    }
</script>

<style scoped>
    .background {
        background: #1B143E;
        height: 100vh;
        width: 99%;
    }

    main.info-block {
        background: #1B143E;
    }


    a.nav-link {
        font-size: 21px;
        font-weight: 400;
        color: #F3F0ED !important;
    }

    .logo-block {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .lng {
        position: absolute;
        bottom: 25px;
    }

    .line {
        border-top: 1px solid #403C54;
        padding: 0 !important;
    }

    .logo {
        margin-bottom: 50px;
    }

    .line li.nav-item {
        padding: 10px 10px;
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
    @media screen and (max-width: 600px) {
        .nav-link{
            text-align: center;
        }
    }
</style>

