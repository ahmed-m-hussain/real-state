<template>
    <main class="info-block">
        <div class="text-center vertical-line"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <img src="images/logo.png" alt="" class="img-fluid mx-auto head-icon d-block">
                    <h1 v-if="locales[locale] == 'EN'" class="text-center">{{about.page_title_en}}</h1>
                    <h1 v-else-if="locales[locale] == 'DE'" class="text-center">{{about.page_title_de}}</h1>
                    <h1 v-else-if="locales[locale] == 'IT'" class="text-center">{{about.page_title_it}}</h1>
                </div>
                <div class="col-lg-8 text-block text-center mx-auto">
                    <p v-if="locales[locale] == 'EN'">{{about.text_title_en}} </p>
                    <p v-else-if="locales[locale] == 'DE'">{{about.text_title_de}}</p>
                    <p v-else-if="locales[locale] == 'IT'">{{about.text_title_it}}</p>
                </div>
            </div>
        </div>
        <section class="container persons">
            <div class="row">


                <div v-for="founder in founders"  class="col-lg-4 col-md-6" style="margin-bottom: 20px">
                    <div class="row">
                        <div class="col-lg-4">
                            <div :style="{ background: 'url(/images/uploads/'+founder.avatar+') ' }"  class="img-block img-block-1"></div>
                        </div>
                        <div class="col-lg-8 information-person">
                            <h5 class="name-person">{{founder.first_name}} {{founder.last_name}}</h5>
                            <p v-if="locales[locale] == 'EN'" class="info-person">{{founder.position_en}}  {{founder.specialty_en}}</p>
                            <p v-else-if="locales[locale] == 'DE'" class="info-person">{{founder.position_de}} {{founder.specialty_de}}</p>
                            <p v-else-if="locales[locale] == 'IT'" class="info-person">{{founder.position_it}} {{founder.specialty_it}}</p>

                            <span v-if="locales[locale] == 'EN'" class="text-person">{{founder.expert_info_en}} </span>
                            <span v-else-if="locales[locale] == 'DE'" class="text-person">{{founder.expert_info_de}}</span>
                            <span v-else-if="locales[locale] == 'IT'" class="text-person">{{founder.expert_info_it}}</span>
                            <button data-toggle="modal" :data-target="'#personModal-'+founder.id"
                                    class="more-info d-flex align-items-center"><i class="material-icons">add</i>
                                {{ $t('more') }}
                            </button>
                        </div>
                    </div>

                </div>

                <div v-for="founder in founders" class="modal fade personModal" :id="'personModal-'+founder.id" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true" class="close-modal-button">&times;</span>
                            </button>
                            <div class="modal-body">
                                <div class="col-lg-12 col-md-12">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div :style="{ background: 'url(/images/uploads/'+founder.avatar+') ' }"  class="img-block img-block-2 mx-auto"></div>
                                        </div>
                                        <div class="col-lg-12 information-person">
                                            <h4 class="name-person-modal text-center">{{founder.first_name}} {{founder.last_name}}</h4>
                                            <p v-if="locales[locale] == 'EN'" class="info-person-modal text-center">{{founder.position_en}}  {{founder.specialty_en}}</p>
                                            <p v-else-if="locales[locale] == 'DE'" class="info-person-modal text-center">{{founder.position_de}} {{founder.specialty_de}}</p>
                                            <p v-else-if="locales[locale] == 'IT'" class="info-person-modal text-center">{{founder.position_it}} {{founder.specialty_it}}</p>
                                            <div class="col-lg-8 text-center mx-auto">
                                                <span v-if="locales[locale] == 'EN'" class="text-person-modal text-center">{{founder.expert_info_en}} </span>
                                                <span v-else-if="locales[locale] == 'DE'" class="text-person-modal text-center">{{founder.expert_info_de}}</span>
                                                <span v-else-if="locales[locale] == 'IT'" class="text-person-modal text-center">{{founder.expert_info_it}}</span>
                                            </div>
                                            <div class="col-lg-6 col-sm-6 mx-auto col-6">
                                                <div class="row">
                                                    <div class="col-lg-4 col-md-4 col-sm-4 col-4">
                                                        <a href="" style="color: black">
                                                            <div class="circle-social">
                                                                <i class="material-icons">
                                                                    mail_outline
                                                                </i>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="col-lg-4 col-md-4 col-sm-4 col-4">
                                                        <a href="" style="color: black">
                                                            <div class="circle-social">
                                                                <i class="fab fa-linkedin-in"></i>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="col-lg-4 col-md-4 col-sm-4 col-4">
                                                        <a href="" style="color: black">
                                                            <div class="circle-social">
                                                                <i class="fab fa-twitter"></i>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="container lng">
            <div class="row">
                <div class="col-lg-12 mr-5">
                   <locale-dropdown></locale-dropdown>
                </div>
            </div>
        </div>
    </main>
</template>

<script>
    import LocaleDropdown from "../components/LocaleDropdown";
    import { mapGetters } from 'vuex'
    export default {
        name: "about",
        components: {LocaleDropdown},

        data() {
            return {
                about: {},
                founders: {},
                lang: '',
            };
        },

        computed: mapGetters({
            locale: 'lang/locale',
            locales: 'lang/locales'
        }),

        methods: {
            getAbout() {
                let _this = this;
                axios.get('/api/v1/about').then(function (response) {
                    _this.about = response.data.about;
                    _this.founders = response.data.founders;
                }).catch(function (error) {

                });
            },
        },

        created: function(){
            this.getAbout()
        },

        mounted() {
            $("body").css('background','#1B143E');
            $('.about-page').css('height','350px')
            console.log(this.about, 4848)
        }
    }
</script>

<style scoped>
    .body-block{
        background: #1B143E;
    }
    .vertical-line {
        width: 1px;
        height: 144px;
        margin: 0px auto;
        background: #fff;
        position: absolute;
        /* top: 33%; */
        color: #fff;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    div.personModal .modal-content {
        border-radius: 20px;
        width: 80%;
        position: absolute;
        left: 50%;
        transform: translate(-50%);
    }

    .head-icon {
        width: 47px;
        margin-top: 80px;
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

    .img-block-1{
        display: block;
        width: 130px !important;
        height: 130px;
        border-radius: 50%;
        max-width: 155px;
        background-position: center !important;
        background-size: cover !important;
    }

    .img-block{
        display: block;
        width: 130px !important;
        height: 130px;
        border-radius: 50%;
        max-width: 155px;
        background-position: center !important;
        background-size: cover !important;
    }


    section.container.persons {
        margin-top: 50px;
        padding-bottom: 50px;
    }

    span.text-person {
        color: #76728B;
        font-size: 9px;
        margin-top: -10px !important;
        margin-left: 31px;
        margin-bottom: 15px;
        display: block;
    }

    p.info-person {
        margin-top: 0 !important;
        font-size: 12px !important;
        margin-left: 31px;
    }

    h5.name-person {
        color: #fff;
        margin-left: 31px;
    }

    button.more-info {
        background: transparent;
        border: none;
        color: #fff;
        margin-left: 25px;
    }

    .about-page about-page a.nav-link {
        margin: 5px;
    }

    span.oi.oi-plus {
        margin-right: 5px;
        font-size: 10px;
    }

    span.close-modal-button {
        position: absolute;
        right: 10px;
        top: 5px;
        font-size: 30px;
    }

    p.info-person-modal.text-center {
        color: #000;
        margin: 0;
        letter-spacing: 0;
        font-weight: 500;
    }

    h4.name-person-modal.text-center {
        margin-top: 10px;
    }

    .modal-body .img-block {
        margin-top: 20px;
    }

    span.text-person-modal.text-center {
        margin-top: 20px;
        display: block;
        font-weight: 500;
    }

    .circle-social {
        width: 40px;
        height: 40px;
        border: 1px solid #d0cfcf;
        border-radius: 50%;
        position: relative;
        margin-top: 20px;
    }

    .circle-social i {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    div.personModal .modal-body {
        padding: 20px 0px;
    }

    div.personModal .modal-content {
        border-radius: 20px;
        width: 80%;
    }

    .circle-social:hover {
        border: 2px solid #0e0a1f;
        transition: 1s;
    }

    button.close {
        z-index: 9999999;
    }

    .lng {
        padding-bottom: 30px;
    }

    @media screen and (max-width: 992px) {
        .img-block-1,
        .img-block-2,
        .img-block-3 {
            margin: auto;
        }

        h5.name-person {
            margin-top: 15px;
        }

        .circle-icon {
            display: none;
        }

        h1.head-text.text-center {
            font-size: 30px;
        }

        .about-page a.nav-link {
            margin: 0 !important;
        }

        .navbar.menu-rs ul {
            width: 100%;
        }

        .navbar.menu-rs li.nav-item {
            margin-bottom: 10px;
        }

        .real-estate-block i.icon-menu {
            float: left;
        }

        span.text-menu {
            display: block;
            position: absolute;
            left: 50px;
        }

        .line-vertical {
            display: none;
        }
    }

    .info-block{
        background: #1B143E;
    }

</style>
