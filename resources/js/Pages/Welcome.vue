<script setup>
import { Head, Link, usePage } from '@inertiajs/vue3';
import { ref } from 'vue';
import { computed } from 'vue';
defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
    products: {
        type: Array,
        required: true,
    },
    categories: {
        type: Array,
        required: true,
    },
});

const productsFiltre = ref(null)
const showNotFilter = ref(false)
const page = usePage();
console.log(page.props.translations.message)
const translations = computed(() => {
    return page.props.translations.message || {};
});
const config = computed(() => {
    return page.props.config || {};
});


const filtre = async (event) => {
    let categorie = {
        categorie : event.target.value
    }
    const response = await window.axios.post('/filtre',categorie)
    if (response) {
        productsFiltre.value = response.data
    }
}

</script>

<template>

    <Head title="Aphrodite" />
    <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50 lg:w-[50%] mx-auto">
        <!-- <img id="background" class="absolute -left-20 top-0 max-w-[877px]" src="https://laravel.com/assets/img/welcome/background.svg" /> -->
        <div
            class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
            <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                <header class="flex justify-between items-center">
                    <div class="flex lg:justify-center lg:col-start-2 text-2xl text-white">
                        App
                    </div>
                    <nav v-if="canLogin" class="-mx-3 flex flex-1 justify-end">
                        <Link v-if="$page.props.auth.user" :href="route('app.dashboard')"
                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                        Dashboard
                        </Link>

                        <template v-else>
                            <Link :href="route('login')"
                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                            Connexion
                            </Link>

                            <Link v-if="canRegister" :href="route('register')"
                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                            Inscription
                            </Link>
                        </template>
                    </nav>
                </header>

                <div class="bg-red-500 h-[400px] mt-5 rounded">
                    <img v-if="config.pdc" class="h-[400px] w-full rounded" :src="`/storage/data/image/${config.pdc}`"
                        alt="" srcset="">
                </div>
                <div class="relative bottom-[100px] left-[50%] rounded-full">
                    <div
                        class="bg-red-500 absolute w-[200px] rounded-full h-[200px] border z-100 bg-white transform -translate-x-1/2  ">
                        <img v-if="config.pdp" class="w-[200px] h-[200px] rounded-full"
                            :src="`/storage/data/image/${config.pdp}`" alt="" srcset="">
                    </div>
                </div>

                <div class="text-center mt-[120px]">
                    <div>
                        <div class="text-4xl font-bold">
                            Lolitasse
                        </div>
                        <div class="text-xl my-5">
                            Adult - Paris
                        </div>
                    </div>
                    <div class="my-5">
                        <hr class=" mx-auto" />
                    </div>
                    <div class="my-5">
                        <span>𝐏𝐀𝐒𝐒𝐈𝐎𝐍𝐍𝐄́𝐄 𝐏𝐀𝐑 𝐋𝐀 𝐁𝐄𝐀𝐔𝐓𝐄́ 𝐃𝐔 𝐂𝐎𝐑𝐒</span>
                        <ul class="my-3">
                            <li> • Venir en privée pour plus de contenu spicy ! </li>
                            <li> • Nue/Lingerie/Plaisir seul/Pieds/S </li>
                            <li> • Plusieurs médias publiés par jours pour votre plus grand plaisir </li>
                            <li> • Bonnet E/Morphologie </li>
                        </ul>
                        <div class="my-3 text-xs">
                            Les 50 premiers qui s'abonneront bénéficieront de promotions importantes sur les prochains
                            abonnement et les
                            pushs !
                        </div>
                        <div class="my-5 flex justify-center">
                            <Icon name="mdi:facebook"
                                style="color: red ; background-color: red !important; margin-left: 5px;" size="2em" />
                            <Icon name="mdi:instagram"
                                style="color: red ; background-color: red !important; margin-left: 5px;" size="2em" />
                            <Icon name="mdi:snapchat"
                                style="color: red ; background-color: red !important; margin-left: 5px;" size="2em" />
                        </div>
                    </div>
                    <div class="my-5">
                        <hr class=" mx-auto" />
                    </div>
                </div>

                <div class="p-4">
                    <div class="relative mt-2 w-1/4">
                        <div class="items-start mt-5 ">
                            <div>
                                <label for="password" class="block mb-2 text-sm font-medium text-white-900 ">Choisir
                                    categorie</label>
                            </div>
                            <div>
                                <select @change="filtre($event)" id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option selected value="all">Tout</option>
                                    <option v-for="(cate, index) in categories" :key="index" :value="cate.id">{{
                                        cate.name }}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div v-if="productsFiltre" class="mx-auto flex justify-center flex-wrap">
                    <Link :href="route('media', { product_id: product.id })" v-for="(product, index) in productsFiltre"
                        :key="index"
                        class="relative border border-black px-1 my-2 w-[300px] h-[300px] rounded-lg cursor-pointer overflow-hidden">
                    <img :class="product.is_free == false ? 'filter blur' : ''" class="w-full h-full object-cover "
                        :src="`/storage/data/image/${product.name}`" alt="Product Image" />
                    <div v-if="product.is_free == false"
                        class="absolute z-50 inset-0 flex items-center justify-center bg-white bg-opacity-60 rounded-lg">
                        <span class="text-2xl font-bold text-gray-700">🔒</span>
                    </div>
                    </Link>
                </div>
                <div v-else class=" mx-auto flex justify-center flex-wrap">
                    <Link :href="route('media', { product_id: product.id })" v-for="(product, index) in products"
                        :key="index"
                        class="relative border border-black px-1 my-2 w-[300px] h-[300px] rounded-lg cursor-pointer overflow-hidden">
                    <img :class="product.is_free == false ? 'filter blur' : ''" class="w-full h-full object-cover "
                        :src="`/storage/data/image/${product.name}`" alt="Product Image" />
                    <div v-if="product.is_free == false"
                        class="absolute z-50 inset-0 flex items-center justify-center bg-white bg-opacity-60 rounded-lg">
                        <span class="text-2xl font-bold text-gray-700">🔒</span>
                    </div>
                    </Link>
                </div>

                <footer class="py-16 text-center text-sm text-black dark:text-white/70">
                    Laravel v{{ laravelVersion }} (PHP v{{ phpVersion }})
                </footer>
            </div>
        </div>
    </div>
</template>
