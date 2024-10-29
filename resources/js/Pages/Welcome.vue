<script setup>
import MentionLegal from '@/Components/MentionLegal.vue';
import ModalLayout from '@/Components/ModalLayout.vue';
import { Icon } from '@iconify/vue';
import { Head, Link, router, usePage } from '@inertiajs/vue3';
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
const showModalFiltre = ref(false)
const showData = ref('post')
const showMention = ref(false)

const showModalChat = ref(false)
const showModalSubscribe = ref(false)

const messageChat = ref('')

const page = usePage();
console.log(page.props.translations.message)
const translations = computed(() => {
    return page.props.translations.message || {};
});
const config = computed(() => {
    console.log(page);
    
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
    showModalFiltre.value = false
}

const sendMessage = async () => {
    if (messageChat.value == '') {
        return alert('pas de message');
    }

    if (!page.props.auth.user) {
        return alert("Inscriver vous avant d'envoyer message")
    }

    const response = await window.axios.post('/user/sendMessage',{message : messageChat.value});
    showModalChat.value = false
    alert('emessage envoyer avec sucess')
    // router.push('/user/chat');
}

</script>

<template>

    <Head title="Aphrodite" />
    <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50 w-full lg:w-[50%] mx-auto">
        <!-- <img id="background" class="absolute -left-20 top-0 max-w-[877px]" src="https://laravel.com/assets/img/welcome/background.svg" /> -->
        <div class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
            <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                <header class="flex justify-between items-center">
                    <div class="flex lg:justify-center lg:col-start-2 text-2xl text-white">
                        {{ page.props.translations.message.app_name }}
                    </div>
                    <nav v-if="canLogin" class="-mx-3 flex flex-1 items-center justify-end">
                        <div  v-if="$page.props.auth.user">
                            <Link :href="$page.props.auth.user.is_admin == true ? route('admin.allproduct') : route('user.gallerie.index') " class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                {{ $page.props.auth.user.name }}
                            </Link>
                            <span class="border px-2">
                                {{ $page.props.auth.user.token }} Token
                            </span>
                        </div>
                        <template v-else >
                            <Link :href="route('login')" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                Connexion
                            </Link>

                            <Link v-if="canRegister" :href="route('register')" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                Inscription
                            </Link>
                        </template>
                    </nav>
                </header>

                <div class="bg-red-500 h-auto lg:h-[400px] mt-5 rounded">
                    <img v-if="config.pdc" class="h-auto lg:h-[400px] w-full rounded" :src="`/storage/data/image/${config.pdc}`"
                        alt="" srcset="">
                </div>
                <div class="relative bottom-[100px] left-[50%] rounded-full">
                    <div class="bg-red-500 absolute w-[200px] rounded-full h-[200px] border z-100 bg-white transform -translate-x-1/2  ">
                        <img v-if="config.pdp" class="w-[200px] h-[200px] rounded-full" :src="`/storage/data/image/${config.pdp}`" alt="" srcset="">
                    </div>
                </div>

                <div class="text-center mt-[120px]">
                    <div>
                        <div class="text-4xl font-bold text-white">
                        {{ page.props.translations.message.title_name }}
                        </div>
                        <div class="text-xl my-5">
                            {{ page.props.translations.message.sub_title }}
                        </div>
                    </div>
                    <div class="my-5">
                        <hr class=" mx-auto" />
                    </div>
                    <div class="my-5">
                        <span>{{ page.props.translations.message.sub_title2 }}</span>
                        <div class="my-3 text-xs ">
                            <ModalLayout classes="bg-red-400 text-white w-full lg:w-[50%]" :isOpen="showModalSubscribe">
                                <template #button>
                                    <button @click="showModalSubscribe= true" class="border bg-red-400 text-white border-0 px-10 py-3 rounded-lg font-black mx-2">S'abonner</button>
                                </template>
                                <template #header>
                                    <div class="text-white">
                                        Abonnement
                                    </div>
                                </template>
                                <template #content>
                                    <div>
                                        Votre abonnement est fait avec success
                                    </div>
                                </template>
                                <template #footer>
                                    <div>
                                        <button class="px-3 py-2 rounded-lg bg-blue-400 " @click="showModalSubscribe = false">fermer</button>
                                    </div>
                                </template>
                            </ModalLayout>
                        </div>
                        <ul class="my-3">
                            <li>{{ page.props.translations.message.texte1 }}</li>
                            <li>{{ page.props.translations.message.texte2 }}</li>
                            <li> {{ page.props.translations.message.texte3 }} </li>
                            <li> {{ page.props.translations.message.texte4 }} </li>
                        </ul>
                        <div class="my-3 text-xs">
                            {{ page.props.translations.message.description1 }}
                        </div>
                        <div class="my-3 flex justify-center text-xs">
                            <button class="hover:bg-red-400 border-white px-10 py-3 text-white rounded-lg font-black mx-2">{{ page.props.translations.message.tips }}</button>
                            
                            <ModalLayout classes="bg-red-400 text-white w-auto " :isOpen="showModalChat">
                                <template #button>
                                    <button @click="showModalChat = true" class="hover:bg-red-400 border-white px-10 py-3 text-white rounded-lg font-black mx-2">{{ page.props.translations.message.message }}</button>
                                </template>
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
                        </div>
                        <div class="my-5 flex justify-center">
                            <Icon class="cursor-pointer hover:text-red-400" icon="la:facebook-f" style="font-size: 30px; margin-left: 5px;" size="2em" />
                            <Icon class="cursor-pointer hover:text-red-400" icon="mdi:instagram" style="font-size: 30px ; margin-left: 5px;" size="2em" />
                            <Icon class="cursor-pointer hover:text-red-400" icon="mdi:snapchat" style="font-size: 30px ; margin-left: 5px;" size="2em" />
                        </div>
                    </div>
                    <div class="my-5">
                        <hr class=" mx-auto" />
                    </div>
                </div>

                <div class="bg-slate-800 w-full px-2 py-5 flex justify-center items-center">
                    <div @click="showData = 'post'" :class="showData == 'post' ? 'border-red-400 border-b-4' :''" class="hover:text-red-400 cursor-pointer mx-5 p-5  ">
                        {{ page.props.translations.message.post }} (12)
                    </div>
                    <div @click="showData = 'demande'" :class="showData == 'demande' ? 'border-red-400 border-b-4' :''" class="hover:text-red-400 cursor-pointer mx-5 p-5">
                        {{ page.props.translations.message.demande }} (34)
                    </div>
                </div>

                <div class="p-4">
                    <div class="relative mt-2 w-1/4">
                        <div class="items-start mt-5 hover:text-red-400">
                            <ModalLayout classes="bg-red-400 text-white w-auto " :isOpen="showModalFiltre">
                                <template #button>
                                    <label @click="showModalFiltre = true" for="password" class="cursor-pointer block flex items-center mb-2 text-sm font-medium text-white-900 ">
                                        <Icon icon="bx:copy" style="font-size: 30px ; margin-right: 5px;" size="2em" />
                                        <div class="text-lg">
                                            Choisir categorie
                                        </div>
                                        <Icon icon="mdi:filter" style="font-size: 30px ; margin-right: 5px;" size="2em" />
                                    </label>
                                </template>
                                <template #header>
                                    <div class="text-white">
                                        Choiri la categorie selon votre choix
                                    </div>
                                </template>
                                <template #content>
                                    <div>
                                        <select @change="filtre($event)" id="countries" class="border-0 text-gray-900 text-sm rounded-lg  block w-full p-2.5 bg-red-400 dark:placeholder-gray-400 dark:text-white ">
                                            <option selected value="all">Tout</option>
                                            <option v-for="(cate, index) in categories" :key="index" :value="cate.id">{{ cate.name }}</option>
                                        </select>
                                    </div>
                                </template>
                                <template #footer>
                                    <div>
                                        <button class="px-3 py-2 rounded-lg bg-blue-400 " @click="showModalFiltre = false">fermer</button>
                                    </div>
                                </template>
                            </ModalLayout>
                        </div>
                    </div>
                </div>
                
                <div v-if="showData == 'post'">
                    <div v-if="productsFiltre" class="mx-auto flex justify-center flex-wrap">
                        <Link :href="route('media', { product_id: product.id })" v-for="(product, index) in productsFiltre" :key="index" class="relative border border-black px-1 my-2 w-[300px] h-[300px] rounded-lg cursor-pointer overflow-hidden">
                            <span v-if="product.extentionType == 'image'">
                                <img :class="product.is_free == false ? 'filter blur' : ''" class="w-full h-full object-cover " :src="`/storage/data/image/${product.name}`" alt="Product Image" />
                                <div v-if="product.is_free == false" class="absolute  z-10 inset-0 flex items-center justify-center bg-white bg-opacity-60 rounded-lg">
                                    <Icon icon="material-symbols:lock" style="color: black; font-size: 30px ; margin-right: 5px;" size="2em" />
                                </div>
                            </span>
                            <span v-else>
                                <video :class="product.is_free == false ? 'filter blur' : ''" class="w-full h-full object-cover" controls>
                                    <source :src="`/storage/data/image/${product.name}`" type="video/mp4" />
                                    Your browser does not support the video tag.
                                </video>
                                <div v-if="product.is_free == false" class="absolute z-10 inset-0 flex items-center justify-center bg-white bg-opacity-60 rounded-lg">
                                    <Icon icon="material-symbols:lock" style="color: black; font-size: 30px ; margin-right: 5px;" size="2em" />
                                </div>
                                <div class="absolute z-20 inset-0 flex items-center justify-center bg-white bg-opacity-60 rounded-lg">
                                    <Icon icon="icon-park-twotone:play" style="color: black; font-size: 50px ; margin-right: 5px;" size="2em" />
                                </div>
                            </span>
                        </Link>
                    </div>
                    <div v-else class=" mx-auto flex justify-center flex-wrap">
                        <Link :href="route('media', { product_id: product.id })" v-for="(product, index) in products" :key="index" class="relative border border-black px-1 my-2 w-[300px] h-[300px] rounded-lg cursor-pointer overflow-hidden">
                            <span v-if="product.extentionType == 'image'">
                                <img :class="product.is_free == false ? 'filter blur' : ''" class="w-full h-full object-cover " :src="`/storage/data/image/${product.name}`" alt="Product Image" />
                                <div v-if="product.is_free == false" class="absolute z-10 inset-0 flex items-center justify-center bg-white bg-opacity-60 rounded-lg">
                                    <Icon icon="material-symbols:lock" style="color: black; font-size: 30px ; margin-right: 5px;" size="2em" />
                                </div>
                            </span>
                            <span v-else>
                                <video :class="product.is_free == false ? 'filter blur' : ''" class="w-full h-full object-cover" controls>
                                    <source :src="`/storage/data/image/${product.name}`" type="video/mp4" />
                                    Your browser does not support the video tag.
                                </video>
                                <div v-if="product.is_free == false" class="absolute z-10 inset-0 flex items-center justify-center bg-white bg-opacity-60 rounded-lg">
                                    <Icon icon="material-symbols:lock" style="color: black; font-size: 30px ; margin-right: 5px;" size="2em" />
                                </div>
                                <div class="absolute z-20 inset-0 flex items-center justify-center bg-white bg-opacity-60 rounded-lg">
                                    <Icon icon="icon-park-twotone:play" style="color: black; font-size: 50px ; margin-right: 5px;" size="2em" />
                                </div>
                            </span>
                        </Link>
                    </div>
                </div>
                <div v-else>
                    
                </div>
                
                <ModalLayout classes="bg-red-400 text-white w-auto" :isOpen="showMention">
                    <template #button>
                        <footer @click="showMention = true" class="cursor-pointer py-16 text-center text-sm text-black dark:text-white/70">
                            {{ page.props.translations.message.mention }}
                        </footer>
                    </template>
                    <template #header>
                        <div class="text-white">
                            Mention legale
                        </div>
                    </template>
                    <template #content>
                        <div>
                            <MentionLegal />
                        </div>
                    </template>
                    <template #footer>
                        <div>
                            <button class="px-3 py-2 rounded-lg bg-blue-400 " @click="showMention = false">fermer</button>
                        </div>
                    </template>
                </ModalLayout>
            </div>
        </div>
    </div>
</template>
