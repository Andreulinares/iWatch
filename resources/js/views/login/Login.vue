<template>
    
    <div class="container">
        <Navbar/>
        <div class="row justify-content-center my-5 w-100">
            <div class="col-md-6">
                <div class="contenedorInputs card border-0 shadow-sm">
                    <div class="card-body">
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
                                <!-- Remember me -->
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" v-model="loginForm.remember" id="flexCheckIndeterminate">
                                    <label class="form-check-label" for="flexCheckIndeterminate">
                                        {{ $t('remember_me') }}
                                    </label>
                                </div>

                                <!-- Buttons -->
                                <div class="flex items-center justify-end mt-4">
                                    <button class="btn btn-primary accion" :class="{ 'opacity-25': processing }" :disabled="processing">
                                        {{ $t('login') }}
                                    </button>
                                </div>
                            </div>
                            <router-link :to="{name: 'auth.forgot-password'}">{{ $t('forgot_password')}}</router-link>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>



<script setup>
import Navbar from '@/layouts/Nav.vue'
import useAuth from '@/composables/auth'

const { loginForm, validationErrors, processing, submitLogin } = useAuth();

</script>

<style scoped>
    .container {
        position: relative; /* Añade posición relativa al cuerpo */
        margin: 0;
    }

    /* Pseudo-elemento para aplicar el filtro */
    .container::after {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        /* background-color:rgb(21, 164, 54) ; */
        background-image: url("C:\xampp2\htdocs\Laravel\iWatch\public\images\fondoLogin.jpg");
        background-repeat: no-repeat;
        background-size: cover;
        z-index: -1; /* Coloca el pseudo-elemento detrás del contenido */
        filter: blur(1px) brightness(46%);
        -webkit-filter: blur(1px) brightness(46%);
        -moz-filter: blur(1px) brightness(46%);
    }
</style>
