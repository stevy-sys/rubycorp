<template>
    <AdminLayout>
        <ModalLayout classes="bg-red-400 text-white w-auto " :isOpen="showModalCreate">
            <template #content>
                <div>
                    <label for="chat" class="my-1">Entrer le titre</label>
                    <input type="text" v-model="form.titre" name="chat" class="text-red-400 w-full focus:boder-0 ">
                </div>
                <div>
                    <label for="chat" class="my-1">Entrer le descrption</label>
                    <input type="text" v-model="form.description"  name="chat" class="text-red-400 w-full focus:boder-0 ">
                </div>
                <div>
                    <label for="chat" class="my-1">Entrer le prix</label>
                    <input type="text" v-model="form.price" name="chat" class="text-red-400 w-full focus:boder-0 ">
                </div>
            </template>
            <template #footer>
                <div class="flex justify-around w-full">
                    <button class="px-3 py-2 rounded-lg bg-blue-400 " @click="storeSubscribe" >Enregistrer</button>
                    <button class="px-3 py-2 rounded-lg bg-blue-400 " @click="showModalCreate = false">fermer</button>
                </div>
            </template>
        </ModalLayout>

        <div class="relative overflow-x-auto">
            <div class="flex justify-end my-5 ">
                <button class="border px-4" @click="showModalCreate=true">Creer</button>
            </div>
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Titre
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Description
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Prix
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(subscribe,index) in data" :key="index" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                           {{ subscribe.name }}
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ subscribe.description }}
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ subscribe.price }} €
                        </th>
                        <td class="px-6 py-4 flex ">
                            <div class="border w-25 mx-2 px-3 rounded cursor-pointer" @click="deleteSubscription(subscribe.id)">supprimer</div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </AdminLayout>
</template>
<script setup>
import ModalLayout from '@/Components/ModalLayout.vue';
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { ref } from 'vue';

const props = defineProps({
    subscribes:{
        type:Array
    }
})
const data = ref(props.subscribes)
const showModalCreate = ref(false)
const messageChat = ref("")
const user_id = ref(null)
const form = ref({
    titre:"",
    price:"",
    description:""
})
const storeSubscribe = async () => {
    const response = await window.axios.post('/admin/subscription/create', form.value)
    data.value.push(response.data)
    showModalCreate.value = false
    form.value = {
        titre:"",
        price:"",
        description:""
    }
}

const deleteSubscription = async (subscribe_id) => {
    if(confirm('voulez vous supprimer ?')){
        const response = await window.axios.post('/admin/subscription/delete', {subscribe_id:subscribe_id})
        data.value = data.value.filter((element) => {
            return element.id !== subscribe_id
        })
    }
}
</script>
<style></style>