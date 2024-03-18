import { ref, inject } from 'vue'
import { useRouter } from 'vue-router'
import store from "../store";

export default function useProfile() {
    const profile = ref({
        name: '',
        email: '',
    })

    const router = useRouter()
    const validationErrors = ref({})
    const isLoading = ref(false)
    const swal = inject('$swal')

    const getProfile = async () => {
        profile.value = store.getters["auth/user"]
        // axios.get('/api/user')
        //     .then(({data}) => {
        //         profile.value = data.data;
        //     })
    }

    function updateProfile(profile) {
        if (isLoading.value) return;
    
        isLoading.value = true;
        validationErrors.value = {};
    
        axios.put('/api/user', profile)
            .then(response => {
                if (response.data.success) {
                    swal({
                        icon: 'success',
                        title: 'Perfil actualizado exitosamente'
                    });
                }
            })
            .catch(error => {
                if (error.response) {
                    // Se produjo un error en la respuesta de la API
                    console.error('Error de respuesta de la API:', error.response.data);
                } else if (error.request) {
                    // La solicitud fue realizada pero no se recibió respuesta
                    console.error('No se recibió respuesta de la API:', error.request);
                } else {
                    // Se produjo un error al configurar la solicitud
                    console.error('Error al configurar la solicitud:', error.message);
                }
                validationErrors.value = error.message; // Puedes mostrar este mensaje de error en tu interfaz de usuario si es necesario
            })
            .finally(() => isLoading.value = false);
    }
    
    
    return {
        profile,
        getProfile,
        updateProfile,
        validationErrors,
        isLoading
    }
}
