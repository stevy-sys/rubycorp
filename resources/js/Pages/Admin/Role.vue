<template>
    <AdminLayout>
        <ModalLayout classes="text-white w-[50%]" :isOpen="openPopup">
            <template #content>
                <div class="flex justify-center wrap">
                    <div>
                        <label for="texte" class="block mb-2 text-sm font-medium text-white-900 ">Nom de role</label>
                        <div class="flex">
                            <input v-model="roleSelected.name" type="texte" name="password" id="password"
                                placeholder="aphrodite"
                                class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required="">
                        </div>
                    </div>
                </div>
                <div class="flex justify-around wrap mt-5">
                    <div v-for=" (menu, index) in roleSelected.menus" class="flex items-center mb-4 wrap">
                        <input v-model="menu.is_inclus" id="default-checkbox" type="checkbox" value=""
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="default-checkbox"
                            class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ menu.name }}</label>
                    </div>
                </div>
            </template>
            <template #footer>
                <div class="flex justify-around">
                    <button class="px-3 py-2 rounded-lg bg-blue-400 " @click="openPopup = false">fermer</button>
                    <button class="px-3 py-2 rounded-lg bg-blue-400 " @click="updateRole">Enregister</button>
                </div>
            </template>
        </ModalLayout>

        <ModalLayout classes="text-white w-[50%]" :isOpen="createAdmin">
            <template #content>
                <div class="flex justify-center wrap border p-20">
                    <form @submit.prevent="storeAdmin" action="">
                        <div class="my-5">
                            <label for="texte" class="block mb-2 text-sm font-medium text-white-900 ">name</label>
                            <div class="flex">
                                <input v-model="newAdmin.name"  height="200" type="texte" name="password" id="password" placeholder="aphrodite" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                            </div>
                        </div>
                        <div class="my-5">
                            <label for="texte" class="block mb-2 text-sm font-medium text-white-900 ">email</label>
                            <div class="flex">
                                <input v-model="newAdmin.email" height="200" type="email" name="password" id="password" placeholder="aphrodite" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                            </div>
                        </div>
                        <div class="my-5">
                            <label for="texte" class="block mb-2 text-sm font-medium text-white-900 ">password</label>
                            <div class="flex">
                                <input v-model="newAdmin.password" height="200" type="password" name="password" id="password" placeholder="aphrodite" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                            </div>
                        </div>
                        
                        <div class="my-5">
                            <label for="texte" class="block mb-2 text-sm font-medium text-white-900 ">Role</label>
                            <div class="flex">
                                <select v-model="newAdmin.role_id" id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option :value="role.id" v-for="role in roles" >{{role.name}}</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="my-5">
                            <div class="flex">
                                <input height="200" type="submit" value="enregistrer" name="password" id="password" placeholder="aphrodite" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            </div>
                        </div>
                    </form>
                </div>
            </template>
            <template #footer>
                <div class="flex justify-around">
                    <button class="px-3 py-2 rounded-lg bg-blue-400 " @click="createAdmin = false">fermer</button>
                    <!-- <button class="px-3 py-2 rounded-lg bg-blue-400 " @click="updateRole">Enregister</button> -->
                </div>
            </template>
        </ModalLayout>

        <ModalLayout classes="text-white w-[50%]" :isOpen="createRole">
            <template #content>
                <div class="flex justify-center wrap">

                </div>
            </template>
            <template #footer>
                <div class="flex justify-around">
                    <button class="px-3 py-2 rounded-lg bg-blue-400 " @click="createRole = false">fermer</button>
                    <!-- <button class="px-3 py-2 rounded-lg bg-blue-400 " @click="updateRole">Enregister</button> -->
                </div>
            </template>
        </ModalLayout>

        <div class="relative overflow-x-auto">
            <div class="flex justify-end my-5">
                <button @click="createAdmin = true" class="px-2 border mr-2">Creer Admin</button>
                <button @click="createRole = true" class="px-2 border">Creer Role</button>
            </div>
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Name
                        </th>

                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(role, index) in props.roles" :key="index"
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ role.name }}
                        </th>
                        <td class="px-6 py-4 flex ">
                            <div @click="selectRole(role)" class="border w-25 mx-2 px-3 rounded cursor-pointer">voir
                            </div>
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
import { onMounted, ref } from 'vue';

const props = defineProps({
    roles: {
        type: Array
    }
})

const createAdmin = ref(false);
const createRole = ref(false);

const roleSelected = ref()
const openPopup = ref(false)
const selectRole = (role) => {
    openPopup.value = true
    roleSelected.value = role
}



const newAdmin = ref({
    name:"",
    email:"",
    password:"",
    role_id:""
})


const storeAdmin = async () => {
    const response = await window.axios.post('/admin/createAdmin', newAdmin.value)
    alert('admin creer avec success')
}


const updateRole = async () => {
    let menu = [];
    roleSelected.value.menus.forEach(element => {
        if (element.is_inclus) {
            menu.push(element.id)
        }
    });
    const data = {
        role_id: roleSelected.value.id,
        name: roleSelected.value.name,
        menus: menu
    }
    const response = await window.axios.post('/admin/updateRole', data)
    alert('menu modifier avec success')
}

onMounted(() => {
    console.log(props?.roles);
})
</script>
<style></style>