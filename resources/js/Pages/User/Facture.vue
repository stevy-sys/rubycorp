<template>
    <AppLayout :showSidebar="true">
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            id
                        </th>
                        <th scope="col" class="px-6 py-3">
                            date
                        </th>
                        <th scope="col" class="px-6 py-3">
                            action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(cate, index) in 10" :key="index" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            ch-1231321
                        </th>
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            25/25/75
                        </th>
                        <td class="px-6 py-4 flex ">
                            <div @click="updateCategorie('update',cate)" class="border w-25 mx-2 px-3 rounded cursor-pointer">modifier</div>
                            <div @click="updateCategorie('delete',cate)" class="border w-25 mx-2 px-3 rounded cursor-pointer">Supprimer</div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </AppLayout>
</template>
<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';

defineProps({
    factures:Array
})
</script>
<style lang="">
    
</style>