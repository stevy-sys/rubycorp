<template>
    <AdminLayout>
        <div class="flex justify-end mb-5">
            <div @click="showUpload = !showUpload" class="cursor-pointer border px-5 rounded hover:text-black hover:bg-white"> {{showUpload ? 'fermer' : 'uploader'}} </div>
        </div>

        <div v-if="showUpload">
            <section class="bg-black mb-5">
                <div class="lg:py-0">
                    <div class="bg-black rounded-lg shadow border md:mt-0">
                        <div class="w-full p-6 sm:p-8">
                            <h1 class="text-xl font-bold leading-tight tracking-tight  md:text-2xl text-white-900">
                                Imorter votre produit
                            </h1>
                            <form @submit.prevent="submit" class="space-y-4 md:space-y-6 " action="#">
                                <div class="flex">
                                    <div class="w-1/2 mx-2">
                                        <div class="my-2">
                                            <label for="email"
                                                class="block mb-2 text-sm font-medium text-white-900 ">nom</label>
                                            <input v-model="form.name" type="texte" name="name" id="name"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="nom de photo" required="">
                                        </div>
                                        <div class="my-2">
                                            <label for="password"
                                                class="block mb-2 text-sm font-medium text-white-900 ">description</label>
                                            <textarea v-model=form.description type="texte" name="slug" id="slug"
                                                placeholder="votre-slug-lug"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                required=""></textarea>
                                        </div>
                                        
                                        <div class="flex items-center justify-between">
                                            <div v-if="!form.is_free" class="">
                                                <label for="password"
                                                    class="block mb-2 text-sm font-medium text-white-900 ">prix €</label>
                                                <input v-model=form.price type="texte" name="slug" id="slug"
                                                    placeholder="votre-slug-lug"
                                                    class="p-2.5 bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    required="" />
                                            </div>
                                            <div class="flex items-start">
                                                <div class="flex items-center h-5">
                                                    <input v-model=form.is_free :checked="remember" id="remember"
                                                        aria-describedby="remember" type="checkbox"
                                                        class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800"
                                                        >
                                                </div>
                                                <div class="ml-3 text-sm">
                                                    <label for="remember"
                                                        class="text-white-500 dark:text-gray-300">gratuit ?</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-1/2">
                                        <div class="border w-full h-[150px] my-1"></div>
                                        <button @click="upload.click()" type="button" class="border px-1 rounded">uploder</button>
                                        <input @change="handleFileUpload" ref="upload" class="border px-1 hidden rounded" type="file" />
                                    </div>
                                </div>
                                <button type="submit" class="border hover:bg-white hover:text-black w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Enregistrer</button>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div v-for="(product, index) in props.products" :key="index" class="flex ">
            <div class="border w-[200px] h-[50px] bg-red-500 border-none">
            </div>
        </div>
    </AdminLayout>
</template>
<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Link, useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

const showUpload = ref(false)
const upload = ref("")
const form = useForm({
    name: '',
    description: '',
    base64: '',
    price:10,
    is_free:true
});

const props = defineProps({
    products: Object
})

const submit = () => {
    form.transform(data => ({
        ...data
    })).post(route('admin.store.product'), {
        onFinish: () => form.reset('password'),
    });
}

const handleFileUpload = (event) => {
    const target = event.target;
    const file = target.files?.[0];

    if (file) {
        const reader = new FileReader();

        reader.onload = (e) => {
            form.base64 = e.target?.result;
        };

        reader.onerror = (error) => {
            console.error('Error: ', error);
        };

        reader.readAsDataURL(file);
    }
}
</script>
<style></style>