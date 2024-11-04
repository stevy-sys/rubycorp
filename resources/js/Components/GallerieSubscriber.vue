<script setup>
import { Link } from '@inertiajs/vue3';

defineProps({
    products: {
        type: Array,
    }
});
</script>

<template>
    <!-- <div > -->
        <Link :href="route('media', { product_id: product.id })" v-for="(product, index) in products" :key="index" class="relative border border-black px-1 my-2 w-[300px] h-[300px] rounded-lg cursor-pointer overflow-hidden">
            <span v-if="product.extentionType == 'image'">
                <img class="w-full h-full object-cover " :src="`/storage/data/image/${product.name}`" alt="Product Image" />
            </span>
            <span v-else>
                <video class="w-full h-full object-cover" controls>
                    <source :src="`/storage/data/image/${product.name}`" type="video/mp4" />
                    Your browser does not support the video tag.
                </video>
            </span>
        </Link>
    <!-- </div> -->
</template>
