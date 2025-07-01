<template>
    <div class="hold-transition login-page">
        <div class="login-box">

            <div class="card card-outline card-primary">
                <div class="card-header text-center">
                    <a href="#" class="h1"><b>Admin</b>LTE</a>
                </div>
                <div class="card-body">
                    <p class="login-box-msg">Sign in to start your session</p>
                    <form method="post" @submit.prevent="submitForm" ref="loginForm">

                        <div class="input-group mb-3">
                            <!-- <input type="email" name="email"  value="admin@dom.com" class="form-control"
                                placeholder="Email"> -->
                            <BaseInput v-if="v$" v-model="email" label="Email" name="email" type="email"
                                :v$="v$.email" />


                        </div>

                        <div class="input-group mb-3">
                            <!-- <input type="password" name="password" value="adminadmin" class="form-control"
                                placeholder="Password"> -->

                            <BaseInput v-model="password" label="Password" name="password" type="password"
                                :v$="v$.password" />

                        </div>

                        <div class="row">
                            <div class="col-8">
                                <div class="icheck-primary">
                                    <input type="checkbox" id="remember">
                                    <label for="remember">
                                        Remember Me
                                    </label>
                                </div>
                            </div>

                            <div class="col-4">
                                <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                            </div>

                        </div>
                    </form>
                </div>

            </div>

        </div>
    </div>
</template>
<script>
import { required, email } from '@vuelidate/validators';
import useVuelidate from '@vuelidate/core';
import BaseInput from '@/components/BaseInput.vue';
import axios from 'axios';
import { getUrlList } from '@/urlList.js';
export default {
    name: 'LoginLayout',
    components: { BaseInput },

    data() {
        return {
            email: '',
            password: '',
            v$: null
        };
    },

    validations() {
        return {
            email: { required, email },
            password: { required }
        };
    },

    created() {
        this.v$ = useVuelidate.call(this); // ✅ this works now
    },

    methods: {
        async submitForm() {
            this.v$.$touch();
            if (this.v$.$invalid) {
                  alert('Validation failed');
                return;
            }
           // alert('Form submitted');
            const response = await axios.post(getUrlList().login, {
                email: this.email,
                password: this.password
            });
            console.log(response.data);
            if (response.data.status === 'success') {
                this.$router.push({ name: 'Dashboard' });
            }
            // alert('Form submitted');
            this.v$.$reset();
            this.email = '';
            this.password = '';
        }
    }
};
</script>
