<script setup>
import { Head, Link } from '@inertiajs/vue3';

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
});
</script>

<template>

    <Head title="Aphrodite" />
    <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50 w-[50%] mx-auto">
        <img id="background" class="absolute -left-20 top-0 max-w-[877px]" src="https://laravel.com/assets/img/welcome/background.svg" />
        <div
            class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
            <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                <header class="flex justify-between items-center">
                    <div class="flex lg:justify-center lg:col-start-2 text-2xl text-white">
                        Aphrodite
                    </div>
                    <nav v-if="canLogin" class="-mx-3 flex flex-1 justify-end">
                        <Link v-if="$page.props.auth.user" :href="route('dashboard')" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                            Dashboard
                        </Link>

                        <template v-else>
                            <Link :href="route('login')" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                            Connexion
                            </Link>

                            <Link v-if="canRegister" :href="route('register')" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                            Inscription
                            </Link>
                        </template>
                    </nav>
                </header>

                <div class="bg-red-500 h-[400px] mt-5 rounded">

                </div>
                <div class="relative bottom-[100px] left-[50%] rounded-full">
                    <div
                        class="bg-red-500 absolute w-[200px] rounded-full h-[200px] border z-100 bg-white transform -translate-x-1/2  ">
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


                <div class="mt-[150px]  mx-auto flex justify-center flex-wrap">

                    <div v-for="(item) in 20" :key="index" class="border border-black bg-red-500 w-[400px] h-[500px] rounded-lg relative cursor-pointer">
                        <div  v-if="Math.random() < 0.5 == true" class="absolute left-1/2 top-1/2 transform -translate-x-1/2 -translate-y-1/2">
                            cadena
                        </div>
                    </div>
                </div> 

                <footer class="py-16 text-center text-sm text-black dark:text-white/70">
                    Laravel v{{ laravelVersion }} (PHP v{{ phpVersion }})
                </footer>
            </div>
        </div>
    </div>
</template>
