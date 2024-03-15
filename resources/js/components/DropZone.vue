<template>
    <div
        class="dropzone-container"
        @dragover="dragover"
        @dragleave="dragleave"
        @drop="drop"
    >
        <input
            type="file"
            name="file"
            id="fileInput"
            class="hidden-input"
            @change="onChange('thumbnail1')"
            ref="refFiles1"
            accept=".gif,.webp,.jpg,.jpeg,.png,.mp4,.mkv,.avi,.mov"
        />

        <input
            type="file"
            name="file"
            id="fileInput"
            class="hidden-input"
            @change="onChange('thumbnail2')"
            ref="refFiles1"
            accept=".gif,.webp,.jpg,.jpeg,.png,.mp4,.mkv,.avi,.mov"
        />


        <div class="file-label text-center" v-if="thumbnail1 || modelValueVideo">
            <div v-if="thumbnail1">
                <video class="preview-img" controls>
                    <source :src="makePreviewUrl(thumbnail1)" type="video/mp4" />
                    Tu navegador no soporta el elemento de video.
                </video>
                <p>{{ makeName(thumbnail1.name) }}</p>
            </div>
            <div v-else>
                <video class="preview-img" controls>
                    <source :src="modelValueVideo" type="video/mp4" />
                    Tu navegador no soporta el elemento de video.
                </video>
                <p>{{ makeName(modelValueVideo.name) }}</p>
            </div>
            <div>
                <a href="javascript:void(0)" class="ml-2" type="button" @click="remove('video')" title="Remove video">
                    <b>&times;</b>
                </a>
            </div>
        </div>

<!-- Mostrar el segundo thumbnail para imágenes -->
        <div class="file-label text-center" v-if="thumbnail2 || modelValueImage">
            <div v-if="thumbnailImage">
                <img class="preview-img" :src="makePreviewUrl(thumbnail2)" />
                <p>{{ makeName(thumbnail2.name) }}</p>
            </div>
            <div v-else>
                <img class="preview-img" :src="modelValueImage" />
                <p>{{ makeName(modelValueImage.name) }}</p>
            </div>
            <div>
                <a href="javascript:void(0)" class="ml-2" type="button" @click="remove('image')" title="Remove image">
                    <b>&times;</b>
                </a>
            </div>
        </div>
    </div>
</template>

<script setup>
import {onMounted, ref, watch} from "vue";

const props = defineProps({
    modelValue: String
});

const thumbnail = ref('')
const isDragging = ref(false)
const refFiles = ref(null)
const isVideo = ref(false);
let img = ref('')

const emit = defineEmits(['update:modelValue'])




const onChange = () => {
    thumbnail.value = refFiles.value.files;
    const fileType = refFiles.value.files[0].type.split("/")[0];
    isVideo.value = fileType === "video";
};

/*
const generateThumbnail = ((file) => {
    return URL.createObjectURL(file);
    if (props.modelValue) {
        return props.modelValue
    } else  {
        let fileSrc = URL.createObjectURL(file);
        
        setTimeout(() => {
            URL.revokeObjectURL(fileSrc);
        }, 1000);
        return fileSrc;
    }
})
*/
const makeName = ((name) => {
    if (!props.modelValue) {
        return (
            name.split(".")[0].substring(0, 3) +
            "..." +
            name.split(".")[name.split(".").length - 1]
        );
    }
})

const remove = ((i) => {
    thumbnail.value = ""
    img = ""
    emit('update:modelValue', "")
})

const dragover = ((e) => {
    e.preventDefault();
    isDragging.value = true;
})

const dragleave = (() => {
    isDragging.value = false;
})

const drop = ((e) => {
    e.preventDefault();
    refFiles.value.files = e.dataTransfer.files;
    onChange();
    isDragging.value = false;
})

watch(thumbnail, () => {
    emit('update:modelValue', thumbnail.value[0])
})

/*export default {
    props: ['thefile'],
    data() {
        return {
            isDragging: false,
            files: [],
        };
    },
    methods: {
        onChange() {
            this.files = [...this.$refs.file.files];
            console.log(thefile)
        },

        generateThumbnail(file) {
            let fileSrc = URL.createObjectURL(file);
            setTimeout(() => {
                URL.revokeObjectURL(fileSrc);
            }, 1000);
            return fileSrc;
        },

        makeName(name) {
            return (
                name.split(".")[0].substring(0, 3) +
                "..." +
                name.split(".")[name.split(".").length - 1]
            );
        },

        remove(i) {
            this.files.splice(i, 1);
        },

        dragover(e) {
            e.preventDefault();
            this.isDragging = true;
        },

        dragleave() {
            this.isDragging = false;
        },

        drop(e) {
            e.preventDefault();
            this.$refs.file.files = e.dataTransfer.files;
            this.onChange();
            this.isDragging = false;
        },
    },
};*/
</script>

<style scoped>
.dropzone-container {
    padding: 0rem;
    background: #f7fafc;
    border: 1px solid #e2e8f0;
}

.hidden-input {
    opacity: 0;
    overflow: hidden;
    position: absolute;
    width: 1px;
    height: 1px;
}

.file-label {
    font-size: 20px;
    display: block;
    cursor: pointer;
}

.preview-container {
    display: flex;
    margin-top: 2rem;
}

.preview-card {
    display: flex;
    border: 1px solid #a2a2a2;
    padding: 5px;
    margin-left: 5px;
    object-fit: cover;
}

.preview-img {
    height: 100%;
    width: 100%;
    object-fit: cover;
    border-radius: 5px;
    border: 1px solid #a2a2a2;
    background-color: #a2a2a2;
}
</style>
