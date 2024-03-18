<template>
    <h2 class="t-profile">EDITAR PERFIL</h2>
    <div class="container">
        
    </div>
    <div>
    <!-- Icono del perfil -->
    <i class="pi pi-user" @click="showGallery = true"></i>

    <!-- Dialogo para la galería de imágenes -->
        <Dialog v-model="showGallery" header="Selecciona una foto de perfil">
            <div class="p-grid">
            <!-- Iterar sobre las fotos de perfil -->
                <div v-for="photo in photos" :key="photo.id" class="p-col-3">
                    <img :src="photo.url" alt="Photo" @click="selectProfilePhoto(photo)">
                </div>
            </div>
        </Dialog>
    </div>
</template>

<script>
import { ref, onMounted } from "vue";
import Dialog from "primevue/dialog";
import useProfile from "@/composables/profile";

export default {
    components: {
    Dialog
    },
    setup() {

        const { profile: profileData, getProfile, updateProfile, validationErrors, isLoading } = useProfile()

        const showGallery = ref(false);
        const photos = ref([]);

        const selectProfilePhoto = (photo) => {
        // Aquí puedes implementar la lógica para cambiar la foto de perfil
            console.log('Seleccionaste la foto de perfil:', photo);
        // Por ejemplo, puedes emitir un evento o llamar a una función para cambiar la foto de perfil
        };

        return {
            showGallery,
            photos,
            selectProfilePhoto
        };

        onMounted(() => {
            getProfile()
        })
    }
};
</script>

<style>
    .t-profile{
        margin-top: 60px;
        text-align: center;
    }

</style>