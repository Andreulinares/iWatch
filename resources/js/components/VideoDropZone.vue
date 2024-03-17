<template>
    <div class="dropzone-container">
        <input
            type="file"
            @change="handleFileChange"
            accept="video/*"
        />
        <div v-if="videoPreview" class="preview-container">
            <video :src="videoPreview" controls class="preview-video"></video>
        </div>
        <p v-if="videoName">{{ videoName }}</p>
    </div>
    </template>

    <script setup>
    import { ref } from 'vue';
    const videoFile = ref(null);
    const videoPreview = ref('');
    const videoName = ref('');
    
    const handleFileChange = (event) => {
        const file = event.target.files[0];
        if (file) {
        videoFile.value = file;
        videoName.value = file.name;
        videoPreview.value = URL.createObjectURL(file);
        }
    };

    const clearVideo = () => {
        videoFile.value = null;
        videoPreview.value = '';
        videoName.value = '';
};

    const getVideoData = () => ({
        file: videoFile.value,
        name: videoName.value,
        preview: videoPreview.value,
    });
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

    .preview-video {
        height: 100%;
        width: 100%;
        object-fit: cover;
        border-radius: 5px;
        border: 1px solid #a2a2a2;
        background-color: #a2a2a2;
    }
    </style>
