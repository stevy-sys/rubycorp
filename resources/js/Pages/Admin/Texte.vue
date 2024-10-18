<template>
    <AdminLayout>
        <div>
            <ModalLayout classes="text-white w-auto lg:w-[50%]" :isOpen="openPopup">
                <template #content>
                    <div class="flex justify-center wrap">
                        Modification fait avec success
                    </div>
                </template>
                <template #footer>
                    <div class="flex justify-center">
                        <button class="px-3 py-2 rounded-lg bg-blue-400 " @click="openPopup = false">fermer</button>
                    </div>
                </template>
            </ModalLayout>
            <div class="relative overflow-x-auto">
                <div class="max-h-[700px] overflow-y-auto"> <!-- Conteneur avec défilement vertical -->
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Clé
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Valeur
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(value, key) in textes" :key="key"
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ key }}
                                </th>
                                <td class="px-6 py-4">
                                    <input type="text" v-model="textes[key]" class="w-full text-black" />
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="mt-5">
                    <button @click="send" class="border px-3">Enregister</button>
                </div>
            </div>
        </div>
    </AdminLayout>
</template>

<script setup>
import ModalLayout from '@/Components/ModalLayout.vue';
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { useForm, usePage } from '@inertiajs/vue3';
import { onMounted, ref } from 'vue';
const openPopup = ref(false)
const textes = ref({});
const page = usePage();

onMounted(() => {
    textes.value = page.props.translations.message;
    console.log(textes.value);
});

const send =async () => {
    const response = await window.axios.post('/admin/updateMessages',textes.value)
    openPopup.value = true
}
</script>