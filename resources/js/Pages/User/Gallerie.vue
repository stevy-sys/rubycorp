<template>
    <AppLayout :showSidebar="true">
        <div class="flex flex-wrap">
            <div v-for="(item, index) in products" :key="index" class="border mx-3 my-5 w-[200px] h-[200px] bg-red-500 border-none">
                <img class="w-[200px] h-[200px]" :src="`/storage/data/image/${item.name}`" alt="" srcset="">
            </div>
        </div>
    </AppLayout>
</template>
<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';

defineProps({
    products:Array
})

</script>
<style lang="">

</style>