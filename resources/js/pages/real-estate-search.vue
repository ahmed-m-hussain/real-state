<template>

        <div>
            <header class="real-estate">
                <button class="search-button"><i class="fa fa-search" aria-hidden="true"></i>
                </button>
                <div id="carouselExampleControls" class="carousel slide" data-ride="false" >
                    <div v-if="checkTab == 1">
                        <img src="images/logo-m.png" alt="" class="resl-estate-logo">
                        <div class="carousel-inner" >
                            <div v-for="image, index in images"  class="carousel-item  cr" v-bind:class="{ active: index == 0}" :style="{ background: 'url(/images/uploads/'+image.image+') ' }" >
                            </div>
                        </div>

                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                            <i class="material-icons">
                                arrow_back
                            </i>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                            <i class="material-icons">
                                arrow_forward
                            </i>
                        </a>
                    </div>

                    <div v-if="checkTab == 2">
                        <img src="images/logo-m.png" alt="" class="resl-estate-logo">

                        <div class="carousel-inner" >
                            <div v-for="image, index in drawings"  class="carousel-item  cr" v-bind:class="{ active: index == 0}" :style="{ background: 'url(/images/uploads/'+image.image+') ' }" >
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                            <i class="material-icons">
                                arrow_back
                            </i>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                            <i class="material-icons">
                                arrow_forward
                            </i>
                        </a>
                    </div>

                    <div  v-if="checkTab == 3" class="map">
                        <GmapMap
                            :center="{lat:47.651968, lng:9.478485}"
                            :zoom="5"
                            map-type-id="terrain"
                            style="width: 100%; height: 69vh"
                        >
                            <GmapMarker
                                :key="index"
                                v-for="(m, index) in markers"
                                :position="m.position"
                                :clickable="true"
                                :draggable="true"
                            />
                        </GmapMap>

                    </div>
                </div>
            </header>
            <main class="real-estate-block">
                <div class="container">
                    <nav class="navbar navbar-expand-sm navbar-dark menu-real-estate">
                        <ul class="navbar-nav mx-auto">
                            <li class="nav-item" v-bind:class="{ active: checkTab == 1}">
                                <a class="nav-link" @click="getTab(1)">Images</a>
                            </li>
                            <li class="nav-item" v-bind:class="{ active: checkTab == 2}">
                                <a class="nav-link" @click="getTab(2)">Drawings</a>
                            </li>
                            <li class="nav-item" v-bind:class="{ active: checkTab == 3}">
                                <a class="nav-link" @click="getTab(3)">Map</a>
                            </li>
                        </ul>
                    </nav>
                    <button class="back">

                        <router-link class=" d-flex align-items-center back-link" :to="{ name: 'real-estate' }">
                            <b class="d-flex align-items-center"><i class="fa fa-angle-left" aria-hidden="true"></i>
                                Back to search result</b>
                        </router-link>
                    </button>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-6 col-6 col-md-6 col-sm-6">
                                <h1 class="name-rs">{{home.address}}</h1>
                            </div>
                            <div class="col-lg-6 col-6 col-md-6 col-sm-6">
                                <p class="price">PRICE</p>
                            </div>
                            <div class="col-lg-6 col-6 col-md-6 col-sm-6">
                                <h5 class="address">8900 {{home.city}}</h5>
                            </div>
                            <div class="col-lg-6 col-6 col-md-6 col-sm-6">
                                <p class="pr-money">{{home.price}} CHF</p>
                            </div>
                        </div>
                    </div>
                    <nav class="navbar navbar-expand-lg navbar-dark  menu-rs">
                        <ul class="navbar-nav">
                            <li class="nav-item active">
                                <a class="nav-link active" href="#"><i class=" icon-menu fa fa-fw fa-home"></i><span class="text-menu"> Appartment</span></a>
                            </li>
                            <li class="nav-item ">
                                <a href="#" class="nav-link"><i class=" icon-menu fa fa-bed" aria-hidden="true"></i><span class="text-menu">{{home.room}} Rooms</span></a>
                            </li>
                            <li class="nav-item ">
                                <a href="#" class="nav-link"><i class=" icon-menu fa fa-fw fa-envelope"></i><span class="text-menu"> {{home.size}}M <sup>2</sup></span></a>
                            </li>
                            <li class="nav-item ">
                                <a href="#" class="nav-link"><i class=" icon-menu fa fa-bath" aria-hidden="true"></i><span class="text-menu">{{home.bathroom}} Bathrooms</span></a>
                            </li>
                            <li class="nav-item" v-if="home.garden == 1">
                                <a href="#" class="nav-link"><i class=" icon-menu fa fa-leaf" aria-hidden="true"></i><span class="text-menu">Garden</span></a>
                            </li>
                            <li class="nav-item" v-if="home.sauna == 1">
                                <a href="#" class="nav-link"><i class=" icon-menu fa fa-fw fa-user"></i><span class="text-menu"> Sauna</span></a>
                            </li>
                            <li class="nav-item" v-if="home.gym == 1">
                                <a href="#" class="nav-link"><i class=" icon-menu material-icons">fitness_center</i><span class="text-menu">GYM</span></a>
                            </li>
                            <li class="nav-item" v-for="icon in icons">
                                <a href="#" class="nav-link" ><span v-html="icon.font" class="add-icon"></span><span class="text-menu" >{{icon.name}}</span></a>
                            </li>
                        </ul>
                    </nav>

                    <h4 class="text-header">HOME DETAILS</h4>
                    <p class="text-about-home">{{home.detail}}</p>
                    <div class="col-lg-12">
                        <button type="button" class="interested btn" data-toggle="modal" data-target="#myModal">I AM INTERESTED</button>
                        <!-- Modal -->
                        <div id="myModal" class="modal fade interested-form" role="dialog">
                            <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content container">
                                    <h4 class="modal-title text-center">I AM INTERESTED</h4>
                                    <p class="text-center">We will contact you shortly</p>
                                    <form >
                                        <input type="text" class="form-control" required placeholder="Name" v-model="name">
                                        <span v-for="error in nameError" class="error">{{error}}</span>
                                        <input type="text" class="form-control" required placeholder="Surname" v-model="surname">
                                        <span v-for="error in surnameError" class="error">{{error}}</span>
                                        <input type="text" class="form-control" required placeholder="Phone" v-model="phone">
                                        <span v-for="error in phoneError" class="error">{{error}}</span>
                                        <input type="text" class="form-control" name="email" required placeholder="Email address" v-model="email">
                                        <span v-for="error in emailError" class="error">{{error}}</span>
                                        <div class="checkbox">
                                            <input id="checkbox1" type="checkbox" v-model="contactedPhone">
                                            <label for="checkbox1">  I want to be contacted per phone  </label>
                                        </div>
                                        <div class="checkbox">
                                            <input id="checkbox2" type="checkbox" v-model="contactedEmail">
                                            <label for="checkbox2">  I want to be contacted per email  </label>
                                        </div>
                                        <input @click="sendEmail" type="button" class="int-submit"  value="CONTACT ME">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid may-like">
                    <div class="container">
                        <h3>Homes you may like too</h3>

                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                <img src="/images/8bd94101dc234ea094158951c80f72a7.jpg" class="img-fluid" alt="">
                                <div class="about-card">
                                    <div class="col-lg-12">
                                        <button class="btn see-home d-flex align-items-center">SEE HOME <i class="material-icons">
                                            keyboard_arrow_right
                                        </i></button>
                                        <div class="row">
                                            <div class="col-lg-6 col-6 col-md-6 col-sm-6">
                                                <h6 class="name-rs">ZurichStrasse 91</h6>
                                            </div>
                                            <div class="col-lg-6 col-6 col-md-6 col-sm-6">

                                            </div>
                                            <div class="col-lg-6 col-6 col-md-6 col-sm-6">
                                                <h6 class="address">8900 ZURICH</h6>
                                            </div>
                                            <div class="col-lg-6 col-6 col-md-6 col-sm-6">
                                                <span class="pr-money"> CHF 1.750.000</span>
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
                                                <p>HOME</p>
                                            </div>
                                            <div class="col-lg-3 col-sm-6 col-6 text-center mx-auto">
                                                <div class="text-center mx-auto">
                                                    <i class="fa fa-bed mx-auto" aria-hidden="true"></i>
                                                </div>
                                                <p>6 ROOMS</p>
                                            </div>
                                            <div class="col-lg-3 col-sm-6 col-6 text-center mx-auto">
                                                <div class="text-center mx-auto">
                                                    <i class="fa fa-fw fa-envelope mx-auto"></i>
                                                </div>
                                                <p>203M <sup>2</sup></p>
                                            </div>
                                            <div class="col-lg-3 col-sm-6 col-6 text-center mx-auto">
                                                <div class="text-center mx-auto">
                                                    <i class="fa fa-bath mx-auto" aria-hidden="true"></i>
                                                </div>
                                                <p>2 BATHROOMS</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                <img src="/images/8bd94101dc234ea094158951c80f72a7.jpg" class="img-fluid" alt="">
                                <div class="about-card">
                                    <div class="col-lg-12">
                                        <button class="btn see-home d-flex align-items-center">SEE HOME <i class="material-icons">
                                            keyboard_arrow_right
                                        </i></button>
                                        <div class="row">
                                            <div class="col-lg-6 col-6 col-md-6 col-sm-6">
                                                <h6 class="name-rs">ZurichStrasse 91</h6>
                                            </div>
                                            <div class="col-lg-6 col-6 col-md-6 col-sm-6">

                                            </div>
                                            <div class="col-lg-6 col-6 col-md-6 col-sm-6">
                                                <h6 class="address">8900 ZURICH</h6>
                                            </div>
                                            <div class="col-lg-6 col-6 col-md-6 col-sm-6">
                                                <span class="pr-money"> CHF 1.750.000</span>
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
                                                <p>HOME</p>
                                            </div>
                                            <div class="col-lg-3 col-sm-6 col-6 text-center mx-auto">
                                                <div class="text-center mx-auto">
                                                    <i class="fa fa-bed mx-auto" aria-hidden="true"></i>
                                                </div>
                                                <p>6 ROOMS</p>
                                            </div>
                                            <div class="col-lg-3 col-sm-6 col-6 text-center mx-auto">
                                                <div class="text-center mx-auto">
                                                    <i class="fa fa-fw fa-envelope mx-auto"></i>
                                                </div>
                                                <p>203M <sup>2</sup></p>
                                            </div>
                                            <div class="col-lg-3 col-sm-6 col-6 text-center mx-auto">
                                                <div class="text-center mx-auto">
                                                    <i class="fa fa-bath mx-auto" aria-hidden="true"></i>
                                                </div>
                                                <p>2 BATHROOMS</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                <img src="/images/8bd94101dc234ea094158951c80f72a7.jpg" class="img-fluid" alt="">
                                <div class="about-card">
                                    <div class="col-lg-12">
                                        <button class="btn see-home d-flex align-items-center">SEE HOME <i class="material-icons">
                                            keyboard_arrow_right
                                        </i></button>
                                        <div class="row">
                                            <div class="col-lg-6 col-6 col-md-6 col-sm-6">
                                                <h6 class="name-rs">ZurichStrasse 91</h6>
                                            </div>
                                            <div class="col-lg-6 col-6 col-md-6 col-sm-6">

                                            </div>
                                            <div class="col-lg-6 col-6 col-md-6 col-sm-6">
                                                <h6 class="address">8900 ZURICH</h6>
                                            </div>
                                            <div class="col-lg-6 col-6 col-md-6 col-sm-6">
                                                <span class="pr-money"> CHF 1.750.000</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="line-card"></div>
                                    <div class="container-fluid">
                                        <div class="row menu-row">
                                            <div class="col-lg-3 col-sm-6 col-6 text-center mx-auto">
                                                <div class="text-center mx-auto">
                                                    <i class="fa fa-home  mx-auto"></i>
                                                </div>
                                                <p>HOME</p>
                                            </div>
                                            <div class="col-lg-3 col-sm-6 col-6 text-center mx-auto">
                                                <div class="text-center mx-auto">
                                                    <i class="fa fa-bed mx-auto" aria-hidden="true"></i>
                                                </div>
                                                <p>6 ROOMS</p>
                                            </div>
                                            <div class="col-lg-3 col-sm-6 col-6 text-center mx-auto">
                                                <div class="text-center mx-auto">
                                                    <i class="fa fa-fw fa-envelope mx-auto"></i>
                                                </div>
                                                <p>203M <sup>2</sup></p>
                                            </div>
                                            <div class="col-lg-3 col-sm-6 col-6 text-center mx-auto">
                                                <div class="text-center mx-auto">
                                                    <i class="fa fa-bath mx-auto" aria-hidden="true"></i>
                                                </div>
                                                <p>2 BATHROOMS</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container lists">
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-6 col-6 ">
                                    <h6>FOR SALE</h6>
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
                                    <h6>FOR RENT</h6>
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
                                        <li class="list-footer-item">ABOUT</li>
                                        <li class="list-footer-item">CONTACT</li>
                                        <li class="list-footer-item">SING IN</li>
                                    </ul>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6 col-6 ">
                                    <h6>CONTACT</h6>
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
                            <h6>LANGUAGE</h6>

                            <div class="dropdown">
                                <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">
                                    <span class="short-lng">EN</span>
                                    <span class="line-dropdown"></span>
                                    <span class="long-lng">English</span>
                                    <span class="caret"></span></button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a href="#">English</a></li>
                                    <li><a href="#">Armenian</a></li>
                                    <li><a href="#">Russian</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <footer>
                <div class="container">
                    <p class="copyright">COPYRIGHT 2019 INFINITY</p>
                    <div class="row">
                        <div class="col-lg-12">
                            <img src="images/logo-m.png" alt="" class="logo-footer img-fluid">
                        </div>
                    </div>
                </div>
            </footer>
        </div>

</template>

<script>
    export default {
        name: "real-estate-search",
        data() {
            return {
                homeId: '',
                home: {},
                images:{},
                drawings:{},
                icons:{},
                markers:[],
                checkTab: 1,
                name:'',
                surname:'',
                phone:'',
                email:'',
                contactedEmail:'',
                contactedPhone:'',
                nameError:'',
                surnameError:'',
                phoneError:'',
                emailError:'',

            };
        },

        computed: {

        },

        methods: {
            getHome() {
                let _this = this;
                axios.get('/api/v1/homes/' +this.homeId).then(function (response) {
                    _this.home = response.data.home;
                    _this.images = response.data.images;
                    _this.drawings = response.data.drawings;
                    _this.icons = response.data.home.icons;
                    console.log(response.data.home.latitude);
                    _this.markers.push({
                        position: { lat: Number(response.data.home.latitude), lng: Number(response.data.home.longitude) }
                    })

                }).catch(function (error) {
                    console.log(response.data);


                });
            },

            getTab(tab){


                this.checkTab = tab;
            },
            sendEmail(){
                let _this = this;

                axios.post('/api/v1/send/email',{name: _this.name, phone: _this.phone, email:_this.email, surname: _this.surname,contactedEmail: _this.contactedEmail,contactedPhone: _this.contactedPhone,address: _this.home.address}).then(function (response) {
                    $('#myModal').modal('hide');
                }).catch(function (error) {
                    _this.nameError = error.response.data.errors.name;
                    _this.surnameError = error.response.data.errors.surname;
                    _this.phoneError = error.response.data.errors.phone;
                    _this.emailError = error.response.data.errors.email;
                });
            }

        },

        created: function(){
            this.homeId = this.$route.params.id
        },

        mounted() {

            this.getHome();
            $("body").css('background','#0000');
            $('.about-page').css('height','0px')
        }
    }
</script>

<style >
    .back-link{
        text-decoration: none;
        color: black;
    }
    .error{
        color: red;
    }
    .back-link:hover{
        text-decoration: none;
        color: black;
    }
    a.nav-link {
        font-size: 21px;
        font-weight: 400;
        color: #F3F0ED !important;
    }


    .line li.nav-item {
        padding: 10px 10px;
    }

    .menu li.nav-item {
        padding: 0 10px;
    }




    .lng a.dropdown-toggle {
        color: #fff;
    }

    .lng a.dropdown-toggle:hover {
        text-decoration: none !important;
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


    .circle-social i {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }


    div#personModal .modal-content {
        border-radius: 20px;
        width: 80%;
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


    button.interested.btn {
        background: #1b143e;
        color: #fff;
        font-size: 14px;
        font-weight: 500;
        padding: 8px 30px;
        border-radius: 9px;
        margin-top: 50px;
    }



    ul.sub-list i {
        font-size: 14px !important;
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




    .carousel-item {
        height: 69vh !important;
        background-size: cover !important;
    }



    div#carouselExampleControls i {
        font-size: 29px;
        color: #fff!important;
    }

    img.resl-estate-logo {
        position: absolute;
        z-index: 9;
        width: 70px;
        left: 50%;
        transform: translate(-50%);
        top: 2%;
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

    p.price {
        float: right;
        font-weight: 500;
        font-size: 14px;
        margin-top: 35px;
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

    .navbar.menu-rs {
        border-top: 1px solid #eee;
        border-bottom: 1px solid #eee;
        margin-top: 30px;
    }

    .navbar.menu-rs li.nav-item {
        margin-right: 25px;
    }

    .cr-2 {
        background: url(/images/8bd94101dc234ea094158951c80f72a7.jpg) no-repeat 0 37%;
        background-size: cover;
    }

    .cr-1 {
        background: url(/images/slide-1.jpg) no-repeat 0 70%;
        background-size: cover;
    }

    .cr-3 {
        background: url(/images/bcde1a83e5bab9e89e94d28bf2543e93.jpg) no-repeat 0 37%;
        background-size: cover;
    }

    nav.navbar.navbar-expand-sm.navbar-dark.menu-real-estate {
        margin-top: -5px;
    }

    h4.text-header {
        margin-top: 50px;
        margin-bottom: 20px;
        font-size: 20px;
        letter-spacing: 2px;
    }

    p.text-about-home {
        font-size: 15px;
        font-weight: 500;
    }

    .container-fluid.may-like {
        background: #1b143e;
    }

    .container-fluid.may-like {
        background: #1b143e;
        padding: 30px;
        margin-top: 50px;
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
        /* padding: 22px; */
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

    button.btn.see-home {
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

    button.btn.see-home i {
        color: #fff;
        margin-right: 0;
        margin-left: 10px;
    }

    ul.list-footer {
        list-style: none;
        padding: 0;
    }

    .container.lists button.btn.btn-default.dropdown-toggle {
        border: 1px solid #1b143e;
        border-radius: 0;
    }

    span.line-dropdown {
        width: 1px;
        height: 20px;
        background: #eee;
        display: inline-block;
        position: relative;
        top: 3px;
        margin-left: 5px;
        margin-right: 5px;
    }

    span.long-lng {
        margin-right: 40px;
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

    p.copyright {
        position: absolute;
        color: #5e5582;
        font-weight: 700;
        font-size: 12px;
        letter-spacing: 2px;
        margin-top: 30px;
    }

    img.logo-footer.img-fluid {
        width: 50px;
        display: block;
        margin: auto;
        margin-bottom: 20px;
        margin-top: 30px;
    }

    .container-fluid.may-like .col-lg-4 {
        margin-bottom: 20px;
    }

    button.back i {
        margin-right: 10px;
    }

    button.search-button {
        position: absolute;
        z-index: 9;
        top: 10px;
        left: 65px;
        border: none;
        border-radius: 3px;
        background: #fff;
        width: 35px;
        height: 30px;
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

    .container-fluid.main-rsl .col-lg-4 {
        margin-bottom: 30px;
    }



    .row.paggination-row ul {
        justify-content: center;
        margin-top: 30px;
        margin-bottom: 50px;
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
        /* font-weight: bold; */
    }

    .container.lists-footer li.list-footer-item {
        color: #fff;
        font-size: 11px;
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

    .modal.interested-form .modal-content {
        padding: 20px;
        border-radius: 10px;
        border: 1px solid #261b57;
        width: 75%;
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


    * {
        font-family: 'Didact Gothic', sans-serif;
    }





    textarea.form-control {
        background: transparent;
        color: #837f96;
    }

    form.contact .form-control::placeholder {
        color: #837f96;
        font-weight: 600;
    }

    form.contact .form-control {
        color: #837f96;
        font-weight: 600;
    }

    button.btn.btn-send {
        width: 100%;
        color: #261b57;
        background: #fff;
        font-weight: bold;
        margin-top: 20px;
        border-radius: 5px;
    }


    @media screen and (max-width: 576px) {
        p.copyright {
            position: unset!important;
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
    }

    @media screen and (max-width: 992px) {
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

    }

    @media screen and (max-width: 1200px) {
        span.text-menu {
            display: block;
        }
        .real-estate-block i.icon-menu {
            text-align: center;
            margin: auto;
            display: block;
        }
    }

    ul.contact-list {
        color: #fff;
        list-style: none;
        margin-top: 150px;
    }

    li.mail-list {
        margin-top: 70px;
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



    .carousel-item {
        height: 69vh;
    }

    .carousel-item img.d-block.img-fluid {
        position: relative;
        width: 100%;
        top: -65%;
    }

    div#carouselExampleControls i {
        font-size: 29px;
        color: #fff!important;
    }

    img.resl-estate-logo {
        position: absolute;
        z-index: 9;
        width: 70px;
        left: 50%;
        transform: translate(-50%);
        top: 2%;
    }

    div#navbarText {
        margin-top: -8px;
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

    p.price {
        float: right;
        font-weight: 500;
        font-size: 14px;
        margin-top: 35px;
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

    .navbar.menu-rs {
        border-top: 1px solid #eee;
        border-bottom: 1px solid #eee;
        margin-top: 30px;
    }

    .navbar.menu-rs li.nav-item {
        margin-right: 25px;
    }

    /*.cr-2 {*/
        /*background: url(/images/8bd94101dc234ea094158951c80f72a7.jpg) no-repeat 0 37%;*/
        /*background-size: cover;*/
    /*}*/

    .cr {
        background-size: cover !important;
        background-repeat: no-repeat !important;
        background-position: 0 73% !important;
    }

    /*.cr-3 {*/
        /*background: url(/images/bcde1a83e5bab9e89e94d28bf2543e93.jpg) no-repeat 0 37%;*/
        /*background-size: cover;*/
    /*}*/
    .add-icon{
        float: left;
    }
    .map{
        width: 100%;
    }
</style>
