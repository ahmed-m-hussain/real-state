<template>
  <div class="contact">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-3 col-md-3 order-">
          <!--<img src="images/logo.png" alt="" class="img-fluid navbar-logo">-->

          <ul class="contact-list">
            <li>
              <div class="row">
                <div class="col-lg-1">
                  <i class="fa fa-map-marker" aria-hidden="true"></i>
                </div>
                <div class="col-lg-10">
                  <span>{{ $t('address') }}</span>
                  <p>
                    {{contact.address}}
                    <br />
                    {{contact.country}}
                  </p>
                  <i class="fa fa-map" aria-hidden="true"></i>
                  See on Map
                </div>
              </div>
            </li>
            <li class="mail-list">
              <div class="row">
                <div class="col-lg-1">
                  <i class="fa fa-envelope" aria-hidden="true"></i>
                </div>
                <div class="col-lg-10">
                  <span>{{$t('email_us')}}</span>
                  <p>{{contact.email}}</p>
                </div>
              </div>
            </li>
            <li>
              <div class="row">
                <div class="col-lg-1">
                  <i class="fa fa-phone" aria-hidden="true"></i>
                </div>
                <div class="col-lg-10">
                  <span>{{$t('call_us')}}</span>
                  <p>{{contact.phone}}</p>
                </div>
              </div>
            </li>
          </ul>

          <div class="line-vertical"></div>
        </div>
        <div class="col-lg-9 col-md-9">
          <!--<br><br><br><br><br>-->
          <div class="container">
            <div class="row">
              <div class="col-lg-7 contact-form-block offset-lg-1">
                <h3 class="contact-header text-center">{{$t('infinity_real_estae')}}</h3>
                <p class="text-center text-contact">{{$t('here_to_help_finding_your_home')}}</p>
                <form class="contact-form mx-auto" v-on:submit.prevent>
                  <div
                    class="alert alert-success"
                    v-if="success && !$v.$error"
                  >Thank! your message has been sent successfully</div>
                  <div class="alert alert-danger" v-if="$v.$error">Please fix any errors.</div>
                  <div class="form-row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                      <input
                        type="text"
                        :class="{ 'is-invalid': $v.form.name.$error }"
                        class="form-control input-left"
                        placeholder="Name *"
                        v-model.trim="form.name"
                      />
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                      <input
                        type="text"
                        :class="{ 'is-invalid': $v.form.surname.$error }"
                        class="form-control input-right"
                        placeholder="Surname *"
                        v-model.trim="form.surname"
                      />
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                      <select name class="input-left form-control" v-model="form.country">
                        <option
                          v-for="(country, index) in countries"
                          :key="index"
                          :value="country.name"
                          :disabled="index === 0"
                        >{{ country.name }}</option>
                      </select>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                      <input
                        type="text"
                        class="form-control input-right"
                        placeholder="City"
                        v-model="form.city"
                      />
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                      <input
                        type="text"
                        class="form-control input-left"
                        placeholder="Phone"
                        v-model="form.phone"
                      />
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                      <input
                        type="text"
                        :class="{ 'is-invalid': $v.form.email.$error }"
                        class="form-control input-right"
                        placeholder="Email *"
                        v-model="form.email"
                      />
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="col-lg-12">
                      <textarea
                        placeholder="Go ahead, type your message *"
                        name
                        :class="{ 'is-invalid': $v.form.message.$error }"
                        cols="30"
                        rows="5"
                        class="form-control"
                        v-model.trim="form.message"
                      ></textarea>
                    </div>
                  </div>

                  <button :disabled="isSending" class="btn btn-send" @click="onSend">SEND</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { required, email } from "vuelidate/lib/validators";
import countries from "../countries";

export default {
  name: "contact",
  data() {
    return {
      contact: {},
      isSending: false,
      countries: [{ name: "Select country", value: "" }, ...countries],
      form: {
        country: "Select country"
      },
      success: false
    };
  },
  validations: {
    form: {
      name: {
        required
      },
      surname: {
        required
      },
      email: {
        required,
        email
      },
      message: {
        required
      }
    }
  },
  computed: {
    isValid() {
      return this.form.name && this.form.surname && this.form.message;
    }
  },

  methods: {
    onSend() {
      this.$v.$touch();
      if (!this.$v.$invalid) {
        this.isSending = true;
        axios
          .post("/api/v1/contact", {
            ...this.form
          })
          .then(response => {
            this.isSending = false;
            this.success = true;
          })
          .catch(error => {
            this.isSending = false;
          });
      }
    },
    getContact() {
      let _this = this;
      axios
        .get("/api/v1/contact")
        .then(function(response) {
          _this.contact = response.data.contact;
          console.log(response.data.contact);
        })
        .catch(function(error) {});
    }
  },

  created: function() {
    this.getContact();
  },

  mounted() {
    $("body").css("background", "#261b57");
    $(".about-page").css("height", "50px");
  }
};
</script>

<style>
/*body.body-block {*/
/*background: #261b57;*/
/*}*/

form.contact-form.mx-auto {
  width: 75%;
}

.checkbox {
  padding-left: 3px;
  margin-top: 10px;
}
img.img-fluid.navbar-logo {
  height: 45px;
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

.checkbox input[type="checkbox"]:focus + label::before {
  outline: thin dotted;
  outline: 5px auto -webkit-focus-ring-color;
  outline-offset: -2px;
}

.checkbox input[type="checkbox"]:checked + label::after {
  font-family: "FontAwesome";
  content: "\f00c";
}

.checkbox input[type="checkbox"]:disabled + label {
  opacity: 0.65;
}

.checkbox input[type="checkbox"]:disabled + label::before {
  background-color: #eeeeee;
  cursor: not-allowed;
}

.checkbox.checkbox-circle label::before {
  border-radius: 50%;
}

.checkbox.checkbox-inline {
  margin-top: 0;
}

* {
  font-family: "Didact Gothic", sans-serif;
}

.contact img.img-fluid.navbar-logo {
  margin-top: 10px;
  position: absolute;
  left: 50%;
  transform: translate(-50%);
}

.line-vertical {
  height: 100%;
  width: 1px;
  background: #fff;
  float: right;
  opacity: 0.15;
  position: absolute;
  top: 0;
  right: 0;
}

h3.contact-header.text-center {
  color: #fff;
  font-weight: 600;
  letter-spacing: 2px;
}

.contact-form-block {
  margin-bottom: 80px;
}

p.text-center.text-contact {
  color: #fff;
  font-weight: 600;
  letter-spacing: 2px;
  font-size: 12px;
  margin-bottom: 40px;
}

form.contact-form .col-lg-6 {
  padding: 0;
}

.form-control.input-left {
  border-bottom-right-radius: 0;
  border-top-right-radius: 0;
  border-bottom-left-radius: 7px;
  border-top-left-radius: 7px;
  background: transparent;
  border-right: none;
}

.form-control.input-right {
  border-bottom-left-radius: 0;
  border-top-left-radius: 0;
  border-bottom-right-radius: 7px;
  border-top-right-radius: 7px;
  /* border-bottom: 1px solid #fff; */
  background: transparent;
  border-left: 1px solid #929090;
}

.contact .form-row {
  margin-top: 20px;
}

textarea.form-control {
  background: transparent;
  color: #837f96;
}

form.contact-form .form-control::placeholder {
  color: #837f96;
  font-weight: 600;
}

form.contact-form .form-control {
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

.contact-form-block {
  margin-top: 80px;
}

/**************************/

@media screen and (max-width: 576px) {
  p.copyright {
    position: unset !important;
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
  .line-vertical {
    display: none;
  }
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
</style>

