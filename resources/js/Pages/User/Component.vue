<script setup>
import { ref } from 'vue';
const MenuChat = ref(false)
const ShowmenuChat = () => {
    MenuChat.value = !MenuChat.value
    console.log(MenuChat.value);
}


import data from "emoji-mart-vue-fast/data/all.json";
import "emoji-mart-vue-fast/css/emoji-mart.css";

import { Picker, EmojiIndex } from "emoji-mart-vue-fast/src";

const emojiIndex = new EmojiIndex(data);

const emojisOutput = ref("");

const showEmoji = (emoji) => {
    console.log(emoji);

    emojisOutput.value += emoji.native;
};

</script>

<template>
    <div class="flex text-white">
        <!-- Tita -->
        <div class="w-[25%] border border-white h-auto rounded-xl p-2 ">
            <div class="relative mb-10 ">
                <input
                    class="w-full text-black rounded-xl p-2 pr-12 border border-red-300 focus:border-red-500 focus:outline-none"
                    type="text" placeholder="Recherche">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none"
                    stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-search absolute top-1/2 right-3 transform -translate-y-1/2 pointer-events-none">
                    <circle cx="11" cy="11" r="8"></circle>
                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                </svg>
            </div>
            <div class="relative bg-[#1a1a1a] hover:bg-[#1e293b] transition-colors duration-300">
                <div class="flex">
                    <div class="flex items-center p-2">
                        <div class="w-20 h-20 rounded-full overflow-hidden border border-white">
                            <img class="w-full h-full object-cover"
                                src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTdyhj65-Cz6UvgVh8YUCAQM_ElfcG0gJJ7NA&s"
                                alt="">
                        </div>
                        <div class="ml-5">
                            <p class="font-semibold text-[25px]">Kim Lorie</p>
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none">
                                    <path d="M4 4h16a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H6l-2 2v-2H4V4z" fill="#f87171" />
                                    <path d="M4 4h16a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H6l-2 2v-2H4V4z" stroke="#f87171"
                                        stroke-width="1.5" />
                                    <path d="M12 15l4-4-4-4" stroke="#f87171" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                                <p class="font-sans text-[12px] ml-1"> J'attend votre paiement</p>
                            </div>
                        </div>
                    </div>
                </div>
                <svg class="mr-1 absolute left-[70px] bottom-3" xmlns="http://www.w3.org/2000/svg" width="16"
                    height="16" viewBox="0 0 16 16" fill="green">
                    <circle cx="8" cy="8" r="8"></circle>
                </svg>
                <div class="absolute right-4 top-1/2 transform -translate-y-1/2">
                    <svg class="relative" @click="ShowmenuChat" xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" viewBox="0 0 24 24" fill="none">
                        <circle cx="12" cy="6" r="2" fill="#333" />
                        <circle cx="12" cy="12" r="2" fill="#333" />
                        <circle cx="12" cy="18" r="2" fill="#333" />
                    </svg>
                    <div v-if="MenuChat === true"
                        class=" absolute right-[10px] top-[25px] border bg-[#1e293b] rounded p-2 w-[200px] ">
                        <p class="hover:bg-[#1a1a1a] rounded text-center text-sm">Voir profil</p>
                        <p class="hover:bg-[#1a1a1a] rounded text-center text-sm">Archiver</p>
                        <p class="hover:bg-[#1a1a1a] rounded text-center text-sm">Supprimmer</p>
                        <p class="hover:bg-[#1a1a1a] rounded text-center text-sm">Bloquer</p>
                        <p class="hover:bg-[#1a1a1a] rounded text-center text-sm">Retirer</p>
                        <p class="hover:bg-[#1a1a1a] rounded text-center text-sm">Désactiver les notifications</p>
                        <p class="hover:bg-[#1a1a1a] rounded text-center text-sm">Réactiver les notifications</p>
                    </div>
                </div>
            </div>
        </div>


        <div>
            <div class="w-[400px] p-4 rounded-2xl border-[#1e293b] mx-2 my-2 border-2">
    <div class="relative">
        <input class="text-black w-full rounded-2xl h-20 pr-12" type="text" placeholder="Ecrivez votre commentaire...">
        <svg class="absolute right-4 top-1/2 transform -translate-y-1/2 h-8 w-8 text-gray-400 cursor-pointer hover:text-gray-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 10-5.656-5.656M14 10h.01M10 10h.01M12 16h.01M17 16.5a7.5 7.5 0 11-10-10 7.5 7.5 0 0110 10z"/>
        </svg>
    </div>

    <div class="w-full rounded-2xl my-2">
        <p class="bg-[#1e293b] rounded-2xl p-2 text-white">
            Nice picture
        </p>
        <span class="ml-4 text-sm cursor-pointer hover:underline">
            J'aime
        </span>
        <span class="text-sm ml-6 cursor-pointer hover:underline">
            Partager
        </span>
    </div>
</div>
absolute right-4 top-1/2 transform -translate-y-1/2 h-8 w-8 text-gray-400 cursor-pointer hover:text-gray-600


        </div>
        <!-- fin tita -->

        <!-- stevy -->
        <div class="w-[75%]">
            <div class="flex">
                <div class="w-[100px] h-[100px] relative rounded-full bg-red-500">
                    <img class="w-[100px] h-[100px] rounded-full"
                        src="https://plus.unsplash.com/premium_photo-1664474619075-644dd191935f?fm=jpg&q=60&w=3000&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8aW1hZ2V8ZW58MHx8MHx8fDA%3D">
                    <span class="w-[20px] border bg-green-500 h-[20px] right-[6px] bottom-[6px] absolute rounded-full">
                    </span>
                </div>
                <div class="w-[50%] pl-10">
                    <h1 class="text-2xl">Chat with Khalid</h1>
                    <span class="text-sm">4520 messages</span>
                </div>
            </div>


            <!-- ***************************************************************************************************** -->
            <div class="mt-10 flex">
                <div class="min-w-[2%]">
                    <img class="w-[35px] h-[35px] rounded-full"
                        src="https://plus.unsplash.com/premium_photo-1664474619075-644dd191935f?fm=jpg&q=60&w=3000&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8aW1hZ2V8ZW58MHx8MHx8fDA%3D">
                </div>
                <div class="mx-5">
                    <div class="  max-w-[50%] py-5 px-5 border rounded-tr-[20px] rounded-bl-[20px] min-h-[50px]"> Lorem
                        ipsum dolor sit amet consectetur, adipisicing elit. Blanditiis explicabo velit necessitatibus
                        obcaecati omnis iste incidunt. Voluptatum, iure. Temporibus, repellendus. Lorem ipsum dolor sit
                        amet consectetur adipisicing elit. Voluptates, repudiandae vero architecto voluptatibus
                        obcaecati veritatis nesciunt dolore nihil alias hic!</div>
                    <span class="text-sm ml-5 text-white mt-3">20:45</span>
                </div>
            </div>

            <div class="mt-10">
                <div class="mx-5 justify-end flex">
                    <div
                        class="bg-red-400 max-w-[50%] py-5 px-5 border rounded-tl-[20px] rounded-br-[20px] min-h-[50px]">
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Blanditiis explicabo velit
                        necessitatibus obcaecati omnis iste incidunt. Voluptatum, iure. Temporibus, repellendus. Lorem
                        ipsum dolor sit amet consectetur adipisicing elit. Voluptates, repudiandae vero architecto
                        voluptatibus obcaecati veritatis nesciunt dolore nihil alias hic!</div>
                </div>
                <span class="justify-end mt-3 flex text-sm mr-5 text-white">20:45</span>
            </div>

            <!-- ***************************************************************************************************** -->






            <!-- ***************************************************************************************************** -->

            <div class="mt-10 flex">
                <div class="min-w-[2%]">
                    <img class="w-[35px] h-[35px] rounded-full"
                        src="https://plus.unsplash.com/premium_photo-1664474619075-644dd191935f?fm=jpg&q=60&w=3000&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8aW1hZ2V8ZW58MHx8MHx8fDA%3D">
                </div>
                <div class="mx-5">
                    <div class="  max-w-[50%] py-5 px-5 border rounded-tr-[20px] rounded-bl-[20px] min-h-[50px]"> Lorem
                        ipsum dolor sit amet consectetur, adipisicing elit. Blanditiis explicabo velit necessitatibus
                        obcaecati omnis iste incidunt. Voluptatum, iure. Temporibus, repellendus. Lorem ipsum dolor sit
                        amet consectetur adipisicing elit. Voluptates, repudiandae vero architecto voluptatibus
                        obcaecati veritatis nesciunt dolore nihil alias hic!</div>
                    <img class="w-[25%] h-auto border rounded mt-3"
                        src="https://plus.unsplash.com/premium_photo-1664474619075-644dd191935f?fm=jpg&q=60&w=3000&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8aW1hZ2V8ZW58MHx8MHx8fDA%3D">
                    <span class="text-sm ml-5 text-white mt-3">20:45</span>
                </div>
            </div>

            <div class="mt-10">
                <div class="mx-5 justify-end flex">
                    <div
                        class="bg-red-400 max-w-[50%] py-5 px-5 border border-red-400 rounded-tl-[20px] rounded-br-[20px] min-h-[50px]">
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Blanditiis explicabo velit
                        necessitatibus obcaecati omnis iste incidunt. Voluptatum, iure. Temporibus, repellendus. Lorem
                        ipsum dolor sit amet consectetur adipisicing elit. Voluptates, repudiandae vero architecto
                        voluptatibus obcaecati veritatis nesciunt dolore nihil alias hic!</div>
                </div>
                <div class="justify-end flex">
                    <img class="w-[25%]  h-auto border border-red-400 rounded mt-3 mr-5"
                        src="https://plus.unsplash.com/premium_photo-1664474619075-644dd191935f?fm=jpg&q=60&w=3000&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8aW1hZ2V8ZW58MHx8MHx8fDA%3D">
                </div>
                <span class="justify-end mt-3 flex text-sm mr-5 text-white">20:45</span>
            </div>

            <!-- ***************************************************************************************************** -->
        </div>
        <!-- fin stevy -->



    </div>

    <div class="row text-white">
        <!-- Utilisation du composant Picker -->
        <Picker :data="emojiIndex" set="twitter" @select="showEmoji" />
    </div>

    <div class="row">
        <div>
            {{ emojisOutput }}
        </div>
    </div>


</template>

<style scoped>
.row {
    display: flex;
}

.row>* {
    margin: auto;
}
</style>
