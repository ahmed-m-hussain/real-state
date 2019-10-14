<template>
    <div>
        <main class="container-fluid subservice">
            <button class="back">

                <router-link class=" d-flex align-items-center back-link" :to="{ name: 'service' }">
                    <b class="d-flex align-items-center"><i class="fa fa-angle-left" aria-hidden="true"></i>
                        Back to Services</b>
                </router-link>
            </button>
            <div class="row">
                <div class="col-lg-8">
                    <div class="col-lg-12">
                        <i class="fa fa-home item-home-1" aria-hidden="true"></i>
                    </div>
                    <div class="col-lg-12">
                        <h2 v-if="locales[locale] == 'EN'" class="sub-head">{{administration.text_title_en}}</h2>
                        <h2 v-else-if="locales[locale] == 'DE'" class="sub-head">{{administration.text_title_de}}</h2>
                        <h2 v-else-if="locales[locale] == 'IT'" class="sub-head">{{administration.text_title_it}}</h2>

                        <p v-if="locales[locale] == 'EN'" class="sub-text">{{administration.description_en}} </p>
                        <p v-else-if="locales[locale] == 'DE'" class="sub-text">{{administration.description_de}}</p>
                        <p v-else-if="locales[locale] == 'IT'" class="sub-text">{{administration.description_it}}</p>
                    </div>
                    <div class="col-lg-12">
                        <button class="interested btn" data-toggle="modal" data-target="#myModal" type="button">{{$t('i_am_interested')}}</button>
                    </div>
                    <!-- Modal -->
                    <div id="myModal" class="modal fade interested-form" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content container">

                                <h4 class="modal-title text-center">I AM INTERESTED</h4>

                                <p class="text-center">We will contact you shortly</p>

                                <form action="">
                                    <input type="text" class="form-control" placeholder="Name">
                                    <input type="text" class="form-control" placeholder="Surname">
                                    <input type="text" class="form-control" placeholder="Phone">
                                    <input type="text" class="form-control" placeholder="Email address">

                                    <div class="checkbox">
                                        <input id="checkbox1" type="checkbox">
                                        <label for="checkbox1">  I want to be contacted per phone  </label>
                                    </div>
                                    <div class="checkbox">
                                        <input id="checkbox2" type="checkbox">
                                        <label for="checkbox2">  I want to be contacted per email  </label>
                                    </div>
                                    <input type="submit" class="int-submit" value="CONTACT ME">
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <p class="parag-text">{{$t('our_value_points')}}</p>
                    <ul class="sub-list">
                        <li v-for="point in points">
                            <div class="circle-items"></div>
                            <div class="line-items"></div>
                            <p v-if="locales[locale] == 'EN'" class="sub-text">{{point.value_en}} </p>
                            <p v-else-if="locales[locale] == 'DE'" class="sub-text">{{point.value_de}}</p>
                            <p v-else-if="locales[locale] == 'IT'" class="sub-text">{{point.value_it}}</p>
                        </li>
                    </ul>
                </div>
            </div>

        </main>


    </div>
</template>

<script>
    import { mapGetters } from 'vuex'
    import LocaleDropdown from "../components/LocaleDropdown";
    export default {
        name: "amministrazione",
        components: {LocaleDropdown},
        data() {
            return {
                administration: {},
                points: {},
            };
        },

        computed: mapGetters({
            locale: 'lang/locale',
            locales: 'lang/locales'
        }),

        methods: {
            getAdministration() {
                let _this = this;
                axios.get('/api/v1/administration').then(function (response) {
                    console.log(response.data, response.data.points, 55555555)
                    _this.administration = response.data.administration;
                    _this.points = response.data.points;
                }).catch(function (error) {

                });
            },
        },

        created: function(){
            this.getAdministration()
        },

        mounted() {
            $("body").css('background','#0000')
        }

    }
</script>


<style scoped>
    body{
        background: white !important;
    }
    .back-link{
        text-decoration: none;
        color: black;
    }
    .back-link:hover{
        text-decoration: none;
        color: black;
    }

    .mx-auto.circle-icon.circle-icon-service {
        margin-left: 50px !important;
        margin-top: -5px;
    }

    i.fa.fa-home.item-home {
        color: #fff;
        font-size: 30px;
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

    main.container-fluid.subservice {
        padding: 20px 50px;
    }

    main.container-fluid.subservice i,
    .real-estate-block i {
        /*font-weight: 500;*/
        font-size: 20px;
        margin-right: 10px;
        color: #1b143e;
    }

    button.back {
        background: transparent;
        border: none;
    }

    h2.sub-head {
        color: #1B143E;
        letter-spacing: 2px;
        margin-top: 10px;
        margin-bottom: 30px;
    }

    p.sub-text {
        font-weight: 600;
        font-size: 16px;
    }

    button.interested.btn {
        background: #1b143e;
        color: #fff;
        font-size: 14px;
        font-weight: 500;
        padding: 8px 30px;
        border-radius: 9px;
        margin-top: 50px;
    }

    i.fa.fa-home.item-home-1 {
        margin-top: 50px;
    }

    ul.sub-list {
        list-style: none;
        padding: 0;
        margin-top: 80px;
    }

    ul.sub-list i {
        font-size: 14px !important;
    }

    .contact {
        background: #261b57;
        padding-bottom: 30px;
    }

    ul.sub-list li {
        margin-top: 20px;
        /* display: inline-flex; */
        position: relative;
        /* align-items: baseline; */
    }

    ul.sub-list p {
        font-weight: 500;
    }

    .circle-items {
        width: 10px;
        height: 10px;
        border: 3px solid #000;
        border-radius: 50%;
        margin-right: 40px;
        float: left;
        margin-top: 8px;
    }

    p.parag-text {
        font-weight: 500;
        color: #1b143e;
        margin-top: 20px;
    }

    .line-items {
        width: 18px;
        height: 2px;
        background: #929191;
        position: absolute;
        top: 11.7px;
        left: 8px;
        opacity: 0.2;
    }



    i.fa{
        font-family: "Font Awesome 5 Free" !important;
    }
    .modal.interested-form .modal-content {
        padding: 20px;
    }

    .interested-form input.form-control {
        margin-top: 15px;
    }

    h4.modal-title.text-center {
        color: #564d7c;
        margin-top: 20px;
    }

    .interested-form input.form-control {
        margin-bottom: 15px;
        border: 1px solid #564d7c;
        border-radius: 7px;
    }
    .interested-form p.text-center {
        font-weight: 600;
        font-size: 14px;
        color: #564d7c;
    }

    .interested-form input.form-control::placeholder {
        font-weight: 600;
        color: #838383;
        opacity: 0.6;
    }
    .modal.interested-form .modal-content {
        padding: 20px;
        border-radius: 10px;
        border: 1px solid #261b57;
        width: 75%;
    }
    input.int-submit {
        margin-top: 20px;
        width: 100%;
        background: #261b57;
        border: none;
        border-radius: 5px;
        color: #fff;
        font-weight: 400;
        padding: 8px;
        margin-bottom: 6px;
    }

    .checkbox {
        padding-left: 3px;
        margin-top: 10px;
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
</style>
