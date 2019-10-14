<template>
    <main class="info-block">
        <div class="text-center vertical-line"></div>

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <img src="images/logo.png" alt="" class="img-fluid mx-auto head-icon d-block">
                    <h1 v-if="locales[locale] == 'EN'" class="text-center">{{service.text_title_en}}</h1>
                    <h1 v-else-if="locales[locale] == 'DE'" class="text-center">{{service.text_title_de}}</h1>
                    <h1 v-else-if="locales[locale] == 'IT'" class="text-center">{{service.text_title_it}}</h1>
                </div>
                <div class="col-lg-8 text-block text-center mx-auto">
                    <p v-if="locales[locale] == 'EN'">{{service.description_en}} </p>
                    <p v-else-if="locales[locale] == 'DE'">{{service.description_de}}</p>
                    <p v-else-if="locales[locale] == 'IT'">{{service.description_it}}</p>
                </div>
            </div>
        </div>
        <section class="container persons">
            <ul class="list-inline text-center">
                <li v-for="section in sections" class="list-inline-item item-element">

                    <span v-html="section.font" class="item-home"></span>

                    <p  class="text-item" v-if="locales[locale] == 'EN'">{{section.name_en}} </p>
                    <p  class="text-item" v-else-if="locales[locale] == 'DE'">{{section.name_de}}</p>
                    <p class="text-item" v-else-if="locales[locale] == 'IT'">{{section.name_it}}</p>

                    <button class="btn learn-more">LEARN MORE</button>
                </li>
            </ul>
        </section>
    </main>
</template>

<script>
    import { mapGetters } from 'vuex'
    export default {
        name: "service",
        data() {
            return {
                service: {},
                sections: {},
            };
        },

        computed: mapGetters({
            locale: 'lang/locale',
            locales: 'lang/locales'
        }),

        methods: {
            getService() {
                let _this = this;
                axios.get('/api/v1/service').then(function (response) {
                    _this.service = response.data.realEstateAppraisal;
                    _this.sections = response.data.sections;
                }).catch(function (error) {

                });
            }
        },

        created: function(){
            this.getService();
        },

        mounted(){
            $('.about-page').css('height','350px')

            $("body").css('background','#1B143E');

        }
    }
</script>

<style scoped>
    main.info-block {
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

    section.container.persons {
        margin-top: 50px;
        padding-bottom: 50px;
    }

    .circle-social i {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .item-home  {
        color: #fff !important;
        font-size: 30px !important;
        font-family: "Font Awesome 5 Free" !important;
    }

    p.text-item {
        margin-top: 10px !important;
    }

    button.btn.learn-more {
        background-color: #fff;
        font-weight: 500;
        padding: 10px 30px;
    }

    li.list-inline-item.item-element {
        padding: 19px;
    }

    main.container-fluid.subservice i,
    .real-estate-block i {
        font-weight: 500;
        font-size: 20px;
        margin-right: 10px;
        color: #1b143e;
    }

    ul.sub-list i {
        font-size: 14px !important;
    }

    ul.sub-list li {
        margin-top: 20px;
        position: relative;
    }

    ul.sub-list p {
        font-weight: 500;
    }

    div#carouselExampleControls i {
        font-size: 29px;
        color: #fff!important;
    }

    .real-estate-block li.nav-item a {
        color: #261B57!important;
        font-weight: bold;
        font-size: 16px;
    }

    .container-fluid.may-like h3 {
        margin-top: 30px;
        margin-bottom: 50px;
        color: #fff;
        text-transform: uppercase;
        font-size: 19px;
        letter-spacing: 2px;
    }

    .row.menu-row p {
        font-size: 11.5px;
        font-weight: 600;
        margin-top: 5px;
        color: #1b143e;
    }

    button.btn.see-home i {
        color: #fff;
        margin-right: 0;
        margin-left: 10px;
    }

    .lists h6 {
        margin-top: 50px;
        font-size: 14px!important;
        font-weight: 700;
        color: #5e5582;
    }

    button.back i {
        margin-right: 10px;
    }

    button.search-button i {
        font-size: 15px;
        color: #000!important;
    }

    .container.lists li {
        margin-bottom: 5px;
        color: #000;
    }

    .container.lists li a {
        margin-bottom: 5px;
        color: #000;
    }


    ul.list-inline.rsl-list p {
        color: #fff;
        text-transform: uppercase;
        font-weight: 600;
        font-size: 13px;
        margin-left: 4px;
    }

    ul.list-inline.rsl-list select {
        background: transparent;
        border: none;
        /* padding: 5px; */
        color: #fff;
    }

    ul.list-inline.rsl-list li {
        margin-right: 20px;
        margin-bottom: 25px;
    }


    .row.paggination-row ul {
        justify-content: center;
        margin-top: 30px;
        margin-bottom: 50px;
    }



    .row.paggination-row li a {
        border-radius: 0!important;
        color: #261b57;
        font-weight: bold;
    }

    .container.lists-footer h6 {
        color: #fff;
        font-size: 12px;
        /* font-weight: bold; */
    }


    .checkbox label {
        display: inline-block;
        vertical-align: initial;
        position: relative;
        padding-left: 5px;
        font-weight: 600;
        font-size: 13px;
    }

    .checkbox label::before {
        content: "";
        display: inline-block;
        position: absolute;
        width: 17px;
        height: 17px;
        top: 2px;
        left: 0;
        margin-left: -20px;
        border: 1px solid #261b57;
        border-radius: 3px;
        background-color: #fff;
        -webkit-transition: border 0.15s ease-in-out, color 0.15s ease-in-out;
        -o-transition: border 0.15s ease-in-out, color 0.15s ease-in-out;
        transition: border 0.15s ease-in-out, color 0.15s ease-in-out;
    }

    .checkbox label::after {
        display: inline-block;
        position: absolute;
        width: 16px;
        height: 16px;
        left: -0.5px;
        top: 2px;
        margin-left: -20px;
        padding-left: 3px;
        padding-top: 1px;
        font-size: 11px;
        color: #261b57;
    }

    .checkbox input[type="checkbox"] {
        opacity: 0;
        z-index: 1;
    }

    .checkbox input[type="checkbox"]:focus+label::before {
        outline: thin dotted;
        outline: 5px auto -webkit-focus-ring-color;
        outline-offset: -2px;
    }

    .checkbox input[type="checkbox"]:checked+label::after {
        font-family: 'FontAwesome';
        content: "\f00c";
    }

    .checkbox input[type="checkbox"]:disabled+label {
        opacity: 0.65;
    }

    .checkbox input[type="checkbox"]:disabled+label::before {
        background-color: #eeeeee;
        cursor: not-allowed;
    }

    .checkbox.checkbox-circle label::before {
        border-radius: 50%;
    }

    * {
        font-family: 'Didact Gothic', sans-serif;
    }

    @media screen and (max-width: 576px) {
        p.copyright {
            position: unset!important;
        }
    }

    ul.contact-list span {
        font-weight: 600;
        font-size: 9px;
    }

    ul.contact-list p,
    ul.contact-list li {
        font-weight: 600;
        letter-spacing: 2px;
        font-size: 15px;
    }


    .info-block{
        background: #1B143E !important;
    }
</style>

