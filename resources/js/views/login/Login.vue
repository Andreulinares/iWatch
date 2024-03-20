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
    <section>
    <div v-animateonscroll="{ enterClass: 'fadein', leaveClass: 'fadeout' }" class="row flex box shadow-4 justify-content-center border-round animation-duration-2000 p-0 m-0">
        <div class="container d-flex p-0">
            <div class="row m-0 infoRow">
                <div class="text p-0 col-sm-12 col-md-12 col-lg-6">
                    <h1>DISFRUTA EN TU TELEVISIÓN</h1>
                    <h2>El mejor contenido para Smart TV, Playstation, Xbox, Chromecast, Apple TV, reproductores Blu-ray y muchos más.</h2>
                </div>
                <div class="marketingImage p-0 col-sm-12 col-md-12 col-lg-6">
                    <p>ooooooooooooooooooooooooooooooooooooo</p>
                </div>
            </div>
        </div>
    </div>
    <div v-animateonscroll="{ enterClass: 'fadein', leaveClass: 'fadeout' }" class="row flex box shadow-4 justify-content-center border-round animation-duration-2000 p-0 m-0">
        <div class="container d-flex p-0">
            <div class="row m-0 infoRow">
                <div class="marketingImage p-0 col-sm-12 col-md-12 col-lg-6">
                    <p>ooooooooooooooooooooooooooooooooooooo</p>
                </div>
                <div class="text p-0 col-sm-12 col-md-12 col-lg-6">
                    <h1>USA CUALQUIER DISPOSITIVO</h1>
                    <h2>Ve en streaming todas las películas y series en tu móvil, tableta, ordenador y televisor.</h2>
                </div>
            </div>
        </div>
    </div>
    <div v-animateonscroll="{ enterClass: 'fadein', leaveClass: 'fadeout' }" class="row flex box shadow-4 justify-content-center border-round animation-duration-2000 p-0 m-0">
        <div class="container p-0">
            <div class="row m-0 infoQuestions d-flex justify-content-center align-items-center">
                <h1>Preguntas frecuentes</h1>
                <Accordion activeIndex="0" class="w-50 col-sm-12 col-md-12 col-lg-6">
                    <AccordionTab header="¿Qué es iWatch?">
                        <p class="m-0">Hola</p>
                    </AccordionTab>
                    <AccordionTab header="¿Cuánto cuesta iWatch?">
                        <p class="m-0">Si</p>
                    </AccordionTab>
                    <AccordionTab header="¿Dónde puedo ver iWatch?">
                        <p class="m-0">No</p>
                    </AccordionTab>
                    <AccordionTab header="¿Cómo cancelo mi suscripción?">
                        <p class="m-0">No</p>
                    </AccordionTab>
                    <AccordionTab header="¿Qué contenido puedo ver?">
                        <p class="m-0">No</p>
                    </AccordionTab>
                </Accordion>
            </div>
        </div>
    </div>

    

    <!-- <Accordion :multiple="true" :activeIndex="[0]">
        <AccordionTab header="Header I">
            <p class="m-0">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est
                laborum.
            </p>
        </AccordionTab>
        <AccordionTab header="Header II">
            <p class="m-0">
                Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo
                enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Consectetur, adipisci velit, sed quia non numquam eius modi.
            </p>
        </AccordionTab>
        <AccordionTab header="Header III">
            <p class="m-0">
                At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in
                culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus.
            </p>
        </AccordionTab>
    </Accordion> -->

    

    
    <!-- AIMACION PARA COPIAR -->
        <!-- <div v-animateonscroll="{ enterClass: 'fadein', leaveClass: 'fadeout' }" class="flex box shadow-4 justify-content-center align-items-center h-10rem w-10rem sm:h-15rem sm:w-15rem border-round animation-duration-1000">
            <span class="text-3xl font-bold">fade-in</span>
        </div> -->
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

    /* estilos acordeon */

    .p-accordion .p-accordion-content{
        background-color: pink;
    }

    .p-accordion .p-accordion-header {
        background-color: green !important;
    }
</style>
