<template>
    <AdminLayout>
        <div>
            <div class="flex justify-end mb-5">
            <div @click="showUpload = !showUpload" class="cursor-pointer border px-5 rounded hover:text-black hover:bg-white"> {{showUpload ? 'fermer' : 'ajouter'}} </div>
        </div>

        <div v-if="showUpload">
            <section class="bg-black mb-5">
                <div class="lg:py-0">
                    <div class="bg-black rounded-lg shadow border md:mt-0">
                        <div class="w-full p-6 sm:p-8">
                            <h1 class="text-xl font-bold leading-tight tracking-tight  md:text-2xl text-white-900">
                                Enregistrer une categorie
                            </h1>
                            <form @submit.prevent="submit" class="space-y-4 md:space-y-6 " action="#">
                                <div class="flex">
                                    <div class="w-1/2 mx-2">
                                        <div class="my-2">
                                            <label for="email" class="block mb-2 text-sm font-medium text-white-900 ">nom</label>
                                            <input v-model="form.name" type="texte" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="nom de photo" required="">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="border hover:bg-white hover:text-black w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Enregistrer</button>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <div v-if="showUpdate">
            <section class="bg-black mb-5">
                <div class="lg:py-0">
                    <div class="bg-black rounded-lg shadow border md:mt-0">
                        <div class="w-full p-6 sm:p-8">
                            <h1 class="text-xl font-bold leading-tight tracking-tight  md:text-2xl text-white-900">
                                Modifier le categorie
                            </h1>
                            <form @submit.prevent="sendUpdate" class="space-y-4 md:space-y-6 " action="#">
                                <div class="flex">
                                    <div class="w-1/2 mx-2">
                                        <div class="my-2">
                                            <label for="email" class="block mb-2 text-sm font-medium text-white-900 ">nom</label>
                                            <input v-model="data.name" type="texte" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="nom de photo" required="">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="border hover:bg-white hover:text-black w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Modifier</button>
                                <button type="button" @click="showUpdate = false" class="border hover:bg-white hover:text-black w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Annuler</button>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>


            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                categorie
                            </th>
                            <th scope="col" class="px-6 py-3">
                                action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(cate, index) in props.categories" :key="index" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{cate.name}}
                            </th>
                            <td class="px-6 py-4 flex ">
                                <div @click="updateCategorie('update',cate)" class="border w-25 mx-2 px-3 rounded cursor-pointer">modifier</div>
                                <div @click="updateCategorie('delete',cate)" class="border w-25 mx-2 px-3 rounded cursor-pointer">Supprimer</div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </AdminLayout>
</template>
<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

const props = defineProps({
    categories:Array
})

const showUpdate = ref(false)

const data = ref({
    id:"",
    name:""
})

const form = useForm({
    name: '',
});

const showUpload = ref(false)


const updateCategorie = async (action,cate) => {
    console.log(cate.name);
    
    if (action == 'update') {
        data.value.id = cate.id
        data.value.name = cate.name
        showUpdate.value = true
    }else{
        const response = confirm('voulez vous supprimer cette vategorie');
        if (response) {
            let payload = {
                action:'delete',
                id:cate.id,
            }
            const response = await window.axios.post('/admin/update-categorie',payload)
            window.location.reload()
            console.log(response);
        }
    }
}

const sendUpdate = async () => {
    let payload = {
        action:'update',
        id:data.value.id,
        name:data.value.name,
    }
    const response = await window.axios.post('/admin/update-categorie',payload)
    window.location.reload()
    // console.log(response);
}


const submit =  () => {
    form.transform(data => ({
        ...data,
    })).post(route('admin.categorie.store'), {
        onFinish: () => form.reset(),
    });
}
</script>
<style></style>