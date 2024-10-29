<template>
    <AdminLayout>
        <ModalLayout classes="bg-red-400 text-white w-auto " :isOpen="showModalChat">
            <template #content>
                <div>
                    <label for="chat" class="my-1">Entrer votre message</label>
                    <input type="text" v-model="messageChat" name="chat" class="text-red-400 w-full focus:boder-0 ">
                </div>
            </template>
            <template #footer>
                <div class="flex justify-around w-full">
                    <button class="px-3 py-2 rounded-lg bg-blue-400 " @click="sendMessage">Envoyer</button>
                    <button class="px-3 py-2 rounded-lg bg-blue-400 " @click="showModalChat = false">fermer</button>
                </div>
            </template>
        </ModalLayout>

        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Email
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(user, index) in props.users" :key="index"
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ user.name }}
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ user.email }}
                        </th>
                        <td class="px-6 py-4 flex ">
                            <div class="border w-25 mx-2 px-3 rounded cursor-pointer">voir</div>
                            <div  @click="showModalChat = true ; user_id = user.id" class="border w-25 mx-2 px-3 rounded cursor-pointer">message</div>
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
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

const props = defineProps({
    users:{
        type:Array
    }
})

const showModalChat = ref(false)
const messageChat = ref("")
const user_id = ref(null)
const sendMessage = async () => {
    if (messageChat.value == '') {
        return alert('pas de message');
    }
    

    const response = await window.axios.post('/admin/startMessage',{user_id:user_id.value,message : messageChat.value});
    showModalChat.value = false
    alert('emessage envoyer avec sucess')
    // router.push('/admin/chat');
}
</script>
<style></style>