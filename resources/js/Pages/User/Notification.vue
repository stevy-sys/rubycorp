<template>
    <AppLayout :showSidebar="true">
        <div class="">
            <div class="bg-black rounded-xl mx-auto border p-10 shadow-sm">
                <p class="font-medium text-gray-500 text-sm sm:text-base dark:text-white">
                    Aujourdhui
                </p>
                <div class="border mt-2 px-6 py-4 bg-grey-400 rounded-lg shadow w-full">
                    <div class="inline-flex items-center justify-between w-full">
                        <div class="inline-flex items-center">
                            <img src="https://cdn-icons-png.flaticon.com/128/763/763812.png" alt="Training Icon" class="w-6 h-6 mr-3" />
                            <h3 class="font-bold text-base text-white"> Photo </h3>
                        </div>
                        <p class="text-xs text-gray-500">2 min ago</p>
                    </div>
                    <p class="mt-1 text-sm">
                        L'admin a uplodader une nouvel photo
                    </p>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";

defineProps({
    notifications: Array,
});
</script>
<style lang=""></style>
