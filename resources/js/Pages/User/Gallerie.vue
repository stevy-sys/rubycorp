<template>
    <AppLayout :showSidebar="true">
        <div class="flex flex-wrap">
            <div v-for="(item, index) in products" :key="index"
                class="border mx-3 my-5 w-[200px] h-[200px] bg-red-500 border-none">

                <!-- Affichage de l'image -->
                <img v-if="item.extentionType == 'image'" class="w-full h-full object-cover"
                    :src="`/storage/data/image/${item.name}`" alt="Image" />

                <!-- Affichage de la vidéo -->
                <video v-else class="w-full h-full object-cover" controls>
                    <source :src="`/storage/data/image/${item.name}`" type="video/mp4" />
                    Your browser does not support the video tag.
                </video>

            </div>
        </div>

    </AppLayout>
</template>
<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';

defineProps({
    products: Array
})

</script>
<style lang="">

</style>