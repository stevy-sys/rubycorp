<template>
    <AdminLayout>
        <div>
            <div>
                <label for="texte" class="block mb-2 text-sm font-medium text-white-900 ">Nom du site</label>
                <div class="flex">
                    <input type="texte" name="password" id="password" placeholder="aphrodite"
                        class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required="">
                    <button class="border px-2 rounded cursor-pointer">update</button>
                </div>
            </div>

            <div class="my-5">
                <label for="texte" class="block mb-2 text-sm font-medium text-white-900 ">Description dessous profile</label>
                <div class="flex">
                    <textarea v-model="something" height="200" type="texte" name="password" id="password" placeholder="aphrodite"
                        class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required="">
                        𝐏𝐀𝐒𝐒𝐈𝐎𝐍𝐍𝐄́𝐄 𝐏𝐀𝐑 𝐋𝐀 𝐁𝐄𝐀𝐔𝐓𝐄́ 𝐃𝐔 𝐂𝐎𝐑𝐒
                        • Venir en privée pour plus de contenu spicy !
                        • Nue/Lingerie/Plaisir seul/Pieds/S
                        • Plusieurs médias publiés par jours pour votre plus grand plaisir
                        • Bonnet E/Morphologie
                    </textarea>
                    <button class="border px-2 rounded cursor-pointer mx-1">update</button>
                </div>

            </div>

            <div class="my-5">
                <div class="border w-full h-[150px] my-1"></div>
                <button @click="uploadPdc.click()" type="button" class="border px-1 rounded">Upload Photo de couverture</button>
                <input @change="handleFileUploadPdc" ref="uploadPdc" class="border px-1 hidden rounded" type="file" />
                <button class="border px-2 rounded cursor-pointer mx-1">update</button>
            </div>

            <div class="my-5">
                <div class="border w-[100px] h-[100px] my-1"></div>
                <button @click="uploadPdp.click()" type="button" class="border px-1 rounded">Upload Photo de profile</button>
                <input @change="handleFileUploadPdp" ref="uploadPdp" class="border px-1 hidden rounded" type="file" />
                <button class="border px-2 rounded cursor-pointer mx-1">update</button>
            </div>

        </div>
    </AdminLayout>
</template>
<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

const name = ref("")
const descirption = ref("")
const pdp = ref("")
const pdc = ref("")

const uploadPdp = ref("")
const uploadPdc = ref("")

const handleFileUploadPdc = () => {

}

const handleFileUploadPdp = () => {

}
</script>
<style></style>