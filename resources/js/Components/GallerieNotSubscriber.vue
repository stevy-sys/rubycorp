<script setup>
import { Icon } from '@iconify/vue';
import { Head, Link, router, usePage } from '@inertiajs/vue3';

defineProps({
    products: {
        type: Array,
    }
});
</script>

<template>
    <!-- <div> -->
        <Link :href="route('media', { product_id: product.id })" v-for="(product, index) in products" :key="index" class="relative border border-black px-1 my-2 w-[300px] h-[300px] rounded-lg cursor-pointer overflow-hidden">
            <span v-if="product.extentionType == 'image'">
                <img :class="product.is_free == false ? 'filter blur' : ''" class="w-full h-full object-cover " :src="`/storage/data/image/${product.name}`" alt="Product Image" />
                <div v-if="product.is_free == false" class="absolute z-10 inset-0 flex items-center justify-center bg-white bg-opacity-60 rounded-lg">
                    <Icon icon="material-symbols:lock" style="color: black; font-size: 30px ; margin-right: 5px;" size="2em" />
                </div>
            </span>
            <span v-else>
                <video :class="product.is_free == false ? 'filter blur' : ''" class="w-full h-full object-cover" controls>
                    <source :src="`/storage/data/image/${product.name}`" type="video/mp4" />
                    Your browser does not support the video tag.
                </video>
                <div v-if="product.is_free == false" class="absolute z-10 inset-0 flex items-center justify-center bg-white bg-opacity-60 rounded-lg">
                    <Icon icon="material-symbols:lock" style="color: black; font-size: 30px ; margin-right: 5px;" size="2em" />
                </div>
                <div class="absolute z-20 inset-0 flex items-center justify-center bg-white bg-opacity-60 rounded-lg">
                    <Icon icon="icon-park-twotone:play" style="color: black; font-size: 50px ; margin-right: 5px;" size="2em" />
                </div>
            </span>
        </Link>
    <!-- </div> -->
</template>
