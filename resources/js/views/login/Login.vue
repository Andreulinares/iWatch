<template>
    
    <section>
        <div class="container d-flex justify-content-center align-items-center">
            <Navbar/>
            <div class="row justify-content-center my-5 w-100">
                <div class="contenedorInputs card border-0 shadow-sm">
                        <div class="card-body">
                            <h2 class="mb-3">{{ $t('login') }}</h2>
                            <form @submit.prevent="submitLogin">
                                <div class="">
                                    <!-- Email -->
                                    <div class="mb-3">
                                        <input v-model="loginForm.email" id="email" type="email" class="form-control reqInfo" :placeholder="$t('email')" required autofocus autocomplete="username">
                                        <!-- Validation Errors -->
                                        <div class="text-danger mt-1">
                                            <div v-for="message in validationErrors?.email">
                                                {{ message }}
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Password -->
                                    <div class="mb-4">
                                        <input v-model="loginForm.password" id="password" type="password" class="form-control reqInfo" :placeholder="$t('password')" required autocomplete="current-password">
                                        <!-- Validation Errors -->
                                        <div class="text-danger-600 mt-1">
                                            <div v-for="message in validationErrors?.password">
                                                {{ message }}
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Buttons -->
                                    <div class="flex items-center justify-end mt-4">
                                        <button class="btn btn-primary accion" :class="{ 'opacity-25': processing }" :disabled="processing">
                                            {{ $t('login') }}
                                        </button>
                                    </div>
                                </div>
                                <router-link :to="{name: 'auth.register'}"><p class="frgtPasswd mt-2">Registrate</p></router-link>
                                <router-link :to="{name: 'auth.forgot-password'}"><p class="frgtPasswd mt-2">{{ $t('forgot_password')}}</p></router-link>
                                <!-- Remember me -->
                                <div class="form-check mt-5 pt-5">
                                    <input class="form-check-input" type="checkbox" name="remember" v-model="loginForm.remember" id="flexCheckIndeterminate">
                                    <label class="form-check-label" for="flexCheckIndeterminate">
                                        {{ $t('remember_me') }}
                                    </label>
                                </div>
                            </form>
                        </div>
                    </div>
            </div>
        </div>
    </section>
</template>



<script setup>
// import Navbar from '@/layouts/Nav.vue'
import useAuth from '@/composables/auth'

const { loginForm, validationErrors, processing, submitLogin } = useAuth();

</script>

<style scoped>
    .body {
        background-image: url("C:\xampp\htdocs\Laravel\iWatch\public\images\fondoLogin.jpg");
        background-repeat: no-repeat;
        background-size: cover;
        z-index: -1; /* Coloca el pseudo-elemento detrás del contenido */
        filter: blur(1px) brightness(46%);
        -webkit-filter: blur(1px) brightness(46%);
        -moz-filter: blur(1px) brightness(46%);
    }

    .container{
        padding-top: 120px;
    }
</style>
