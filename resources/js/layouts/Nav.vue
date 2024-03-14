<template>
    <nav class="navbar navbar-expand-md navbar-dark shadow-sm d-flex justify-content-center align-items-center">
        <div class="container">
            <router-link to="/" class="navbar-brand">DAW 2</router-link>
            <a class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mt-2 mt-lg-0 me-auto mb-2 mb-lg-0">
                    <LocaleSwitcher />
                    <li class="nav-item">
                        <router-link to="Home" class="nav-link" aria-current="page">{{ $t('home') }}</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link to="Films" class="nav-link" aria-current="page">{{ $t('films') }}</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link to="Series" class="nav-link" aria-current="page">{{ $t('series') }}</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link to="News" class="nav-link" aria-current="page">{{ $t('news') }}</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link to="Rooms" class="nav-link" aria-current="page">{{ $t('rooms') }}</router-link>
                    </li>
                </ul>
                <ul class="navbar-nav mt-2 mt-lg-0 ms-auto">
                        <li>
                            <input v-model="search_global" type="search" placeholder="Search..."
                               class="form-control w-100">
                        </li>
                        <li>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314"/>
                            </svg>
                        </li>
                    <template v-if="!user?.name">
                        <li class="nav-item">
                            <router-link class="nav-link" to="/login"
                            >{{ $t('login') }}</router-link
                            >
                        </li>
                        <li class="nav-item">
                            <router-link class="nav-link" to="/register">{{ $t('register') }}</router-link>
                        </li>
                    </template>
                    <li v-if="user?.name" class="nav-item dropdown">
                        <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <Avatar v-badge.danger="4" class="p-overlay-badge" image="images\Netflix-avatar.png" size="large" />
                        </a>
                        <ul class="optionsList dropdown-menu dropdown-menu-end">
                            <li><router-link class="dropdown-item" to="/admin">Admin</router-link></li>
                            <li><router-link to="/admin/posts" class="dropdown-item">Post</router-link></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="javascript:void(0)" @click="logout">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>

<script setup>
import { useStore} from "vuex";
import useAuth from "@/composables/auth";
import {computed} from "vue";
import LocaleSwitcher from "../components/LocaleSwitcher.vue";

    const store = useStore();
    const user = computed(() => store.getters["auth/user"])
    const { processing, logout } = useAuth();
</script>

<style>
    
</style>