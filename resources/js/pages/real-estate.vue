<template>
    <div class="real-estate-list">
        <div class="container-fluid main-rsl">
            <div class="row">
                <div class="col-lg-6 col-6">
                    <button @click="getType(1)" class="button-rsl-left float-right text-uppercase">{{$t('homes_for_sale')}}</button>
                </div>
                <div class="col-lg-6 col-6">
                    <button @click="getType(2)"  class="button-rsl-left float-left text-uppercase">{{$t('homes_for_rent')}}</button>
                </div>


            </div>
            <ul class="list-inline rsl-list">
                <li class="list-inline-item">
                    <p class="text-uppercase">{{$t('city')}}</p>
                    <select name="" class="text-uppercase">
                        <option value="ALL CITIES" class="text-uppercase">{{$t('all_cities')}}</option>
                    </select>
                </li>
                <li class="list-inline-item">
                    <p class="text-uppercase">{{$t('rooms')}}</p>
                    <select name="" class="text-uppercase">
                        <option value="ALL CITIES" class="text-uppercase">{{$t('no_preference')}}</option>
                    </select>
                </li>
                <li class="list-inline-item">
                    <p class="text-uppercase">Size</p>
                    <select name="" class="text-uppercase">
                        <option value="ALL CITIES" class="text-uppercase">{{$t('no_preference')}}</option>
                    </select>
                </li>

            </ul>
            <div class="line-rsl"></div>

            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6 col-12" v-for="home in homes">
                    <img  :src="'/images/uploads/'+home.cover_image" class="img-fluid img-home" alt="">
                    <div class="about-card">
                        <div class="col-lg-12">
                            <router-link class="btn see-home d-flex align-items-center text-uppercase" :to="{ path: 'real-estate/'+home.id }">
                                {{$t('see_home')}} <i class="material-icons">keyboard_arrow_right</i>
                            </router-link>
                            <div class="row">
                                <div class="col-lg-6 col-6 col-md-6 col-sm-6">
                                    <h6 class="name-rs">{{home.address}}</h6>
                                </div>
                                <div class="col-lg-6 col-6 col-md-6 col-sm-6">

                                </div>
                                <div class="col-lg-6 col-6 col-md-6 col-sm-6">
                                    <h6 class="address">8900 {{home.city}}</h6>
                                </div>
                                <div class="col-lg-6 col-6 col-md-6 col-sm-6">
                                    <span class="pr-money"> CHF {{home.price}}</span>
                                </div>
                            </div>
                        </div>

                        <div class="line-card"></div>
                        <div class="container-fluid">
                            <div class="row menu-row">
                                <div class="col-lg-3 col-sm-6 col-6 text-center mx-auto">
                                    <div class="text-center mx-auto">
                                        <i class="fa fa-fw fa-home  mx-auto"></i>
                                    </div>
                                    <p class="text-uppercase">{{$t('home')}}</p>
                                </div>
                                <div class="col-lg-3 col-sm-6 col-6 text-center mx-auto">
                                    <div class="text-center mx-auto">
                                        <i class="fa fa-bed mx-auto" aria-hidden="true"></i>
                                    </div>
                                    <p class="text-uppercase">{{home.room}} {{$t('rooms')}}</p>
                                </div>
                                <div class="col-lg-3 col-sm-6 col-6 text-center mx-auto">
                                    <div class="text-center mx-auto">
                                        <i class="fa fa-fw fa-envelope mx-auto"></i>
                                    </div>
                                    <p>{{home.size}}M <sup>2</sup></p>
                                </div>
                                <div class="col-lg-3 col-sm-6 col-6 text-center mx-auto">
                                    <div class="text-center mx-auto">
                                        <i class="fa fa-bath mx-auto" aria-hidden="true"></i>
                                    </div>
                                    <p class="text-uppercase">{{home.bathroom}} {{$t('bathrooms')}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>




            <div class="container">
                <div class="row paggination-row">
                    <div class="col-lg-12 text-center mx-auto">
                        <b-pagination
                            v-model="homesPagination.current_page"
                            :total-rows="homesPagination.total"
                            :per-page="homesPagination.per_page"
                            aria-controls="my-table"
                            :next-class="'hidden'"
                            :prev-class="'hidden'"
                            @change="getHomes"
                        ></b-pagination>

                        <!--<nav aria-label="Page navigation example">-->
                            <!--<ul class="pagination">-->
                                <!--<li class="page-item"><a class="page-link active" href="#">1</a></li>-->
                                <!--<li class="page-item"><a class="page-link" href="#">2</a></li>-->
                                <!--<li class="page-item"><a class="page-link" href="#">3</a></li>-->
                            <!--</ul>-->
                        <!--</nav>-->
                    </div>
                </div>
            </div>
            <div class="line-rsl"></div>
            <div class="container lists-footer">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-6 col-6 ">
                                <h6 class="text-uppercase">{{$t('for_sale')}}</h6>
                                <ul class="list-footer">
                                    <li class="list-footer-item">ZURICH(10)</li>
                                    <li class="list-footer-item">LUGANO(4)</li>
                                    <li class="list-footer-item">ZUG(5)</li>
                                    <li class="list-footer-item">GENEVA(18)</li>
                                    <li class="list-footer-item">BERN(12)</li>
                                    <li class="list-footer-item">LAUSANNE(10)</li>
                                    <li class="list-footer-item">ALL CITIES(130)</li>
                                </ul>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-6 ">
                                <h6 class="text-uppercase">{{$t('for_rent')}}</h6>
                                <ul class="list-footer">
                                    <li class="list-footer-item">ZURICH(10)</li>
                                    <li class="list-footer-item">LUGANO(4)</li>
                                    <li class="list-footer-item">ZUG(5)</li>
                                    <li class="list-footer-item">GENEVA(18)</li>
                                    <li class="list-footer-item">BERN(12)</li>
                                    <li class="list-footer-item">LAUSANNE(10)</li>
                                    <li class="list-footer-item">ALL CITIES(130)</li>
                                </ul>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-6 ">
                                <h6>INFINITY</h6>
                                <ul class="list-footer">
                                    <li class="list-footer-item text-uppercase">{{$t('about')}}</li>
                                    <li class="list-footer-item text-uppercase">{{$t('contact')}}</li>
                                    <li class="list-footer-item text-uppercase">{{$t('sign_in')}}</li>
                                </ul>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-6 ">
                                <h6 class="text-uppercase">{{$t('contact')}}</h6>
                                <ul class="list-footer">
                                    <li class="list-footer-item">INFINITY AG</li>
                                    <li class="list-footer-item">RUA DO LUGANO 31</li>
                                    <li class="list-footer-item">1000 LUGANO</li>
                                    <li class="list-footer-item">SWITZERLAND</li>
                                    <li class="list-footer-item phone">PHONE: +41 123456789</li>
                                    <li class="list-footer-item email">EMAIL: INFINITY@INFINITY.CH</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <h6 class="text-uppercase">{{$t('language')}}</h6>

                        <div class="dropdown d-block text-center float-left">
                            <div class=" lng">
                                <locale-dropdown></locale-dropdown>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer-line"></div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                        <img src="images/logo.png" alt="" class="float-left footer-image">
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                        <p class="copyright-footer float-right">COPYRIGHT 2019 INFINITY</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import LocaleDropdown from "../components/LocaleDropdown";
    export default {
        name: "real-estate",
        components: {LocaleDropdown},
        data() {
            return {
                homes: {},
                homesPagination:{},
                type: 1,
            };
        },
        methods: {
            getHomes(n) {
                let _this = this;
                axios.get('api/v1/homes?type='+this.type+'&page='+n).then(function (response) {
                    _this.homes = response.data.homes.data;
                   _this.homesPagination = response.data.homes;
                }).catch(function (error) {
                    _this.output = error;
                });
            },

            getType(type){
                this.type = type;
                this.getHomes();
            },
            sendEmail(){
                let _this = this;
                axios.get('api/v1/send/email',{}).then(function (response) {

                }).catch(function (error) {
                    _this.output = error;
                });
            }

        },
        mounted() {
            $("body").css('background','#261b57');
            $('.about-page').css('height','50px');
            this.getHomes(1);
        }
    }
</script>

<style>
    .real-page {
        background-color: #261b57;
        height: 50px !important;

    }

    .line li.nav-item {
        padding: 10px 10px;
    }

    .menu li.nav-item {
        padding: 0 10px;
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
        margin-top: -2px;
        color: #fff;
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

    .circle-social i {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }


    main.container-fluid.subservice i,
    .real-estate-block i {

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


    .menu-real-estate li.nav-item.active {
        border-top: 2px solid #261B57;
        margin-top: -3px;
    }

    .real-estate-block li.nav-item a {
        color: #261B57!important;
        font-weight: bold;
        font-size: 16px;
    }

    h1.name-rs {
        text-transform: uppercase;
        font-size: 30px;
        font-weight: bold;
        color: #261B57;
        letter-spacing: 2px;
        margin-top: 30px;
    }


    h5.address {
        color: #261b57;
        margin-top: 10px;
    }

    p.pr-money {
        color: #261b57;
        float: right;
        font-weight: 500;
        font-size: 20px;
        margin-top: 7px;
    }

    .container-fluid.may-like h3 {
        margin-top: 30px;
        margin-bottom: 50px;
        color: #fff;
        text-transform: uppercase;
        font-size: 19px;
        letter-spacing: 2px;
    }

    .about-card {
        background: #fff;
        position: relative;
    }

    h6.name-rs {
        color: #1b143e;
        text-transform: uppercase;
        font-size: 14px;
        margin-top: 20px;
    }

    .line-card {
        width: 100%;
        height: 1px;
        background: #eee;
        margin-top: 5px;
        margin-bottom: 10px;
    }

    h6.address {
        font-size: 13px;
        margin-top: 10px;
        color: #1b143e;
    }

    span.pr-money {
        float: right;
        font-size: 13px;
        margin-top: 10px;
        font-weight: 600;
    }

    .btn.see-home {
        position: absolute;
        background: #1b143e;
        color: #fff;
        top: -25%;
        right: 5%;
    }

    .row.menu-row .col-lg-3.text-center.mx-auto {
        padding: 0;
    }

    .row.menu-row p {
        font-size: 11.5px;
        font-weight: 600;
        margin-top: 5px;
        color: #1b143e;
    }

    .btn.see-home i {
        color: #fff;
        margin-right: 0;
        margin-left: 10px;
    }

    ul.list-footer {
        list-style: none;
        padding: 0;
    }



    .lists h6 {
        margin-top: 50px;
        font-size: 14px!important;
        font-weight: 700;
        color: #5e5582;
    }

    ul.list-footer {
        margin-top: 15px;
    }

    li.list-footer-item {
        font-size: 13px;
        font-weight: 600;
        margin-bottom: 5px;
    }

    li.list-footer-item.phone {
        margin-top: 15px;
        color: #5e5582;
    }

    li.list-footer-item.email {
        color: #5e5582;
    }

    .container-fluid.may-like .col-lg-4 {
        margin-bottom: 20px;
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

    .real-estate-list {
        background: #261b57;
    }

    button.button-rsl-left {
        background: transparent;
        border: 1px solid #fff;
        border-radius: 5px;
        padding: 5px 20px;
        color: #fff;
        margin-bottom: 30px;
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
        color: #fff;
    }

    ul.list-inline.rsl-list li {
        margin-right: 20px;
        margin-bottom: 25px;
    }

    ul.list-inline.rsl-list {
        margin-top: 30px;
    }

    .line-rsl {
        width: 100%;
        height: 1px;
        background: #fff;
        opacity: 0.2;
        margin-bottom: 30px;
    }

    .container-fluid.main-rsl {
        padding-bottom: 20px;
    }

    .container-fluid.main-rsl .col-lg-4 {
        margin-bottom: 30px;
    }

    .container-fluid.main-rsl {
        padding-bottom: 20px;
        padding-left: 30px;
        padding-right: 30px;
    }

    .row.paggination-row ul {
        justify-content: center;
        margin-top: 30px;
        margin-bottom: 50px;
    }

    .row.paggination-row li.page-item {
        margin-right: 10px;
    }

    .row.paggination-row li a.active {
        border: 2px solid white;
        background: #261b57;
        color: #fff;
    }

    .row.paggination-row li a {
        border-radius: 0!important;
        color: #261b57;
        font-weight: bold;
    }

    .container.lists-footer h6 {
        color: #fff;
        font-size: 12px;
    }

    .container.lists-footer li.list-footer-item {
        color: #fff;
        font-size: 11px;
    }

    .footer-line {
        width: 100%;
        height: 1px;
        margin-top: 20px;
        margin-bottom: 30px;
        background: #fff;
    }

    img.float-left.footer-image {
        width: 65px;
    }

    p.copyright-footer.float-right {
        color: #5e5582;
        font-weight: 700;
        font-size: 12px;
        letter-spacing: 2px;
    }

    .interested-form p.text-center {
        font-weight: 600;
        font-size: 14px;
        color: #564d7c;
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
    @media screen and (max-width: 1200px) {
        .img-home{
            height: 290px;

        }
    }

    @media screen and (max-width: 767px) {
        p.pr-money {
            font-size: 14px;
        }
        h5.address {
            font-size: 15px;
        }
        p.price {
            font-size: 11px;
        }
        h1.name-rs {
            font-size: 18px;
        }
        .img-home{
            height: 260px;
        }
    }
    @media screen and (max-width: 1200px) {
        .img-home{
            height: 290px;

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
    .img-home{
        height: 377px;
        width: 100%;
    }
    .page-item.active .page-link {
        background-color: #261b57 !important;
        border-color: white !important;
        border: 2px solid;

    }
    span[role="menuitem"] {
       display: none;
    }
    a[role="menuitem"] {
        display: none;
    }
</style>
