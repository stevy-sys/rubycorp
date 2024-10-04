<template>
    <AdminLayout>
        <!-- <div class="flex h-screen overflow-hidden">
            <div class="w-[40%] bg-black border-r border-gray-300">
                <header class="p-4 border-b border-gray-300 flex justify-between items-center bg-black text-white">
                    <h1 class="text-2xl font-semibold">Chat Web</h1>
                    <div class="relative">
                        <button id="menuButton" class="focus:outline-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-100" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                <path d="M2 10a2 2 0 012-2h12a2 2 0 012 2 2 2 0 01-2 2H4a2 2 0 01-2-2z" />
                            </svg>
                        </button>
                    </div>
                </header>
                <div class="overflow-y-auto h-screen p-3 mb-9 pb-20">
                    <div v-for="(conversation,index) in conversations" :key="index" @click="changeConversation(conversation)"  class="flex items-center mb-4 cursor-pointer hover:bg-gray-700 p-2 rounded-md">
                        <div class="w-12 h-12 bg-gray-300 rounded-full mr-3">
                            <img src="https://placehold.co/200x/ffa8e4/ffffff.svg?text=ʕ•́ᴥ•̀ʔ&font=Lato"
                                alt="User Avatar" class="w-12 h-12 rounded-full">
                        </div>
                        <div class="flex-1">
                            <h2 class="text-lg font-semibold">{{ conversation.user.name}}</h2>
                            <p class="text-gray-600">{{ conversation.last_message.message }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div v-if="conversationActif" class="w-full">
                <header class="bg-white p-4 text-gray-700">
                    <h1 class="text-2xl font-semibold">{{ conversationActif.user.name}}</h1>
                </header>

                <div class="h-[500px] overflow-y-auto p-4 pb-36">
                     <div v-for="(message,index) in messages" :key="index">
                         <div v-if="$attrs.auth.user.id !== message.user_id " class="flex mb-4 cursor-pointer">
                             <div class="w-9 h-9 rounded-full flex items-center justify-center mr-2">
                                 <img src="https://placehold.co/200x/ffa8e4/ffffff.svg?text=ʕ•́ᴥ•̀ʔ&font=Lato" alt="User Avatar" class="w-8 h-8 rounded-full">
                             </div>
                             <div class="flex max-w-96 bg-white rounded-lg p-3 gap-3">
                                 <p class="text-gray-700">{{ message.message }}</p>
                             </div>
                         </div>
     
                         <div v-else class="flex justify-end mb-4 cursor-pointer">
                             <div class="flex max-w-[75%] bg-indigo-500 text-white rounded-lg p-3 gap-3">
                                 <p>{{ message.message }}</p>
                             </div>
                         </div>

                     </div>
                    
                </div>
                <div class=" bg-black border-t border-gray-300 p-4">
                    <div class="flex items-center">
                        <input v-model="newMessage" type="text" placeholder="Type a message..." class="w-full text-black p-2 rounded-md focus:outline-none focus:border-blue-500">
                        <button @click="sendMessage" class="bg-indigo-500 text-white px-4 py-2 rounded-md ml-2">Send</button>
                    </div>
                </div>
            </div>
        </div> -->
        <div class="flex justify-end mb-5">
            <button class="px-5 border hover:bg-red-400" @click="showConversation = true">Conversation</button>
        </div>

        <ModalLayout classes="text-white w-[75%]" :isOpen="showConversation">
            <template #content>
                <div class="text-white flex justify-center">
                    <div class="w-[50%] border border-white h-auto rounded-xl p-2 ">
                        <div class="relative mb-10 ">
                            <input class="w-full text-black rounded-xl p-2 pr-12 border border-red-300 focus:border-red-500 focus:outline-none" type="text" placeholder="Recherche">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"
                                fill="none" stroke="black" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"
                                class="feather feather-search absolute top-1/2 right-3 transform -translate-y-1/2 pointer-events-none">
                                <circle cx="11" cy="11" r="8"></circle>
                                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                            </svg>
                        </div>
                        <div class="relative bg-[#1a1a1a] hover:bg-[#1e293b] transition-colors duration-300">
                            <div class="flex">
                                <div class="flex items-center p-2">
                                    <div class="w-20 h-20 rounded-full overflow-hidden border border-white">
                                        <img class="w-full h-full object-cover" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTdyhj65-Cz6UvgVh8YUCAQM_ElfcG0gJJ7NA&s" alt="">
                                    </div>
                                    <div class="ml-5">
                                        <p class="font-semibold text-[25px]">Kim Lorie</p>
                                        <div class="flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none">
                                                <path d="M4 4h16a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H6l-2 2v-2H4V4z"
                                                    fill="#f87171" />
                                                <path d="M4 4h16a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H6l-2 2v-2H4V4z"
                                                    stroke="#f87171" stroke-width="1.5" />
                                                <path d="M12 15l4-4-4-4" stroke="#f87171" stroke-width="1.5"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                            <p class="font-sans text-[12px] ml-1"> J'attend votre paiement</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <svg class="mr-1 absolute left-[70px] bottom-3" xmlns="http://www.w3.org/2000/svg"
                                width="16" height="16" viewBox="0 0 16 16" fill="green">
                                <circle cx="8" cy="8" r="8"></circle>
                            </svg>
                            <div class="absolute right-4 top-1/2 transform -translate-y-1/2">
                                <svg class="relative" @click="ShowmenuChat" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" viewBox="0 0 24 24" fill="none">
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
                                    <p class="hover:bg-[#1a1a1a] rounded text-center text-sm">Désactiver les
                                        notifications</p>
                                    <p class="hover:bg-[#1a1a1a] rounded text-center text-sm">Réactiver les
                                        notifications</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </template>
            <template #footer>
                <div class="flex justify-center">
                    <button class="px-3 py-2 rounded-lg bg-blue-400 " @click="showConversation = false">fermer</button>
                </div>
            </template>
        </ModalLayout>
        <div class="flex text-white w-[100%]">
            <!-- stevy -->
            <div class="w-full">
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

                <div ref="chatContainer" class="chat-container">
                    <!-- ***************************************************************************************************** -->
                    <div class="mt-10 flex">
                        <div class="min-w-[50px]">
                            <img class="w-[50px] h-[50px] rounded-full"
                                src="https://plus.unsplash.com/premium_photo-1664474619075-644dd191935f?fm=jpg&q=60&w=3000&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8aW1hZ2V8ZW58MHx8MHx8fDA%3D">
                        </div>
                        <div class="mx-5">
                            <div class="relative max-w-[50%] py-5 px-5 border rounded-tr-[20px] rounded-bl-[20px] min-h-[50px]">
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Blanditiis explicabo velit necessitatibus obcaecati omnis iste incidunt. Voluptatum, iure. Temporibus, repellendus. Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates, repudiandae vero architecto voluptatibus obcaecati veritatis nesciunt dolore nihil alias hic!
                                <span @click="showEmo = true" class="absolute cursor-pointer bottom-[-13px] text-xl border p-0 m-0 w-[29px] h-[29px] rounded-full text-center bg-red-100 right-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="29" height="29">
                                    <path d="M12 0C5.373 0 0 5.373 0 12s5.373 12 12 12 12-5.373 12-12S18.627 0 12 0m0 22C6.486 22 2 17.514 2 12S6.486 2 12 2s10 4.486 10 10-4.486 10-10 10"></path>
                                    <path d="M8 7a2 2 0 1 0-.001 3.999A2 2 0 0 0 8 7M16 7a2 2 0 1 0-.001 3.999A2 2 0 0 0 16 7M15.232 15c-.693 1.195-1.87 2-3.349 2-1.477 0-2.655-.805-3.347-2H15m3-2H6a6 6 0 1 0 12 0"></path>
                                    </svg>
                                </span>

                                <!-- Picker component for emojis -->
                                <span v-if="showEmo" class="absolute right-2 bottom-[-250px] z-[9999]"> <!-- Adjust the bottom value as needed -->
                                    <Picker :data="emojiIndex" set="twitter" @select="showEmoji" />
                                </span>
                            </div>
                            <span class="text-sm ml-5 text-white mt-3">20:45</span>
                        </div>
                    </div>

                    <div class="mt-10">
                        <div class="mx-5 justify-end flex">
                            <div
                                class="relative bg-red-400 max-w-[50%] py-5 px-5 rounded-tl-[20px] rounded-br-[20px] min-h-[50px]">
                                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Blanditiis explicabo velit necessitatibus obcaecati
                                omnis iste incidunt. Voluptatum, iure. Temporibus, repellendus. Lorem ipsum dolor sit amet
                                consectetur adipisicing elit. Voluptates, repudiandae vero architecto voluptatibus obcaecati
                                veritatis nesciunt dolore nihil alias hic!
                                <span class="absolute bottom-[-13px] text-xl border p-0 m-0 w-[29px] h-[29px] rounded-full text-center bg-red-100 right-4">🙂</span>
                            </div>
                        </div>
                        <span class="justify-end mt-3 flex text-sm mr-5 text-white">20:45</span>
                    </div>

                    <!-- ***************************************************************************************************** -->



                    <!-- ***************************************************************************************************** -->

                    <div class="mt-10 flex">
                        <div class="min-w-[50px]">
                            <img class="w-[50px] h-[50px] rounded-full"
                                src="https://plus.unsplash.com/premium_photo-1664474619075-644dd191935f?fm=jpg&q=60&w=3000&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8aW1hZ2V8ZW58MHx8MHx8fDA%3D">
                        </div>
                        <div class="mx-5">
                            <div class="border max-w-[50%] py-5 px-5 rounded-tr-[20px] rounded-bl-[20px] min-h-[50px]">
                                Lorem ipsum
                                dolor sit amet consectetur, adipisicing elit. Blanditiis explicabo velit necessitatibus
                                obcaecati omnis
                                iste incidunt. Voluptatum, iure. Temporibus, repellendus. Lorem ipsum dolor sit amet
                                consectetur
                                adipisicing elit. Voluptates, repudiandae vero architecto voluptatibus obcaecati
                                veritatis
                                nesciunt
                                dolore nihil alias hic!</div>
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
                                necessitatibus obcaecati omnis iste incidunt. Voluptatum, iure. Temporibus, repellendus. Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates, repudiandae vero architecto voluptatibus
                                obcaecati veritatis nesciunt dolore nihil alias hic!</div>
                        </div>
                        <div class="justify-end flex">
                            <img class="w-[25%]  h-auto border border-red-400 rounded mt-3 mr-5"
                                src="https://plus.unsplash.com/premium_photo-1664474619075-644dd191935f?fm=jpg&q=60&w=3000&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8aW1hZ2V8ZW58MHx8MHx8fDA%3D">
                        </div>
                        <span class="justify-end mt-3 flex text-sm mr-5 text-white">20:45</span>
                    </div>

                    <!-- ***************************************************************************************************** -->
                </div>
            </div>
            <!-- fin stevy -->
        </div>

    </AdminLayout>
</template>

<script setup>
import ModalLayout from '@/Components/ModalLayout.vue';
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { onMounted, ref } from 'vue';

//emoji
import data from "emoji-mart-vue-fast/data/all.json";
import "emoji-mart-vue-fast/css/emoji-mart.css";
import { Picker, EmojiIndex } from "emoji-mart-vue-fast/src";

const props = defineProps({
    conversations: {
        type: Array
    }
})




const showEmo = ref(false)
const emojiIndex = new EmojiIndex(data);
const emojisOutput = ref("");
const showEmoji = (emoji) => {
  emojisOutput.value += emoji.native;
};





const messages = ref([])
const newMessage = ref('')
const conversationActif = ref(null)
const showConversation = ref(false)
const chatContainer = ref(null);

const changeConversation = async (conversation) => {
    const response = await window.axios.get('/admin/getMessage/' + conversation.id)
    conversationActif.value = conversation;
    messages.value = response.data.messages
}

const sendMessage = async () => {
    const data = {
        message: newMessage.value,
        conversation_id: conversationActif.value.id
    }
    const response = await window.axios.post('/admin/sendMessage', data)
    messages.value.push(response.data.message)
    conversationActif.value.last_message = response.data.message
    newMessage.value = ''
}

onMounted(() => {
    scrollToBottom();
});

const scrollToBottom = () => {
    if (chatContainer.value) {
        chatContainer.value.scrollTop = chatContainer.value.scrollHeight;
    }
};
</script>

<style scoped>
.chat-container {
    max-height: 500px;
    overflow-y: auto;
    padding: 10px;
}





.emoji-mart {
  background-color: #1f2937; /* Fond sombre */
  color: #374151; /* Texte en blanc */
}

.emoji-mart-search input {
  background-color: #374151; /* Fond sombre pour la barre de recherche */
  color: #374151; /* Texte en blanc */
}

.emoji-mart-bar {
  background-color: #374151; /* Fond sombre pour la barre d'outils */
}

.emoji-mart-category-label {
  background-color: #4b5563; /* Fond des étiquettes de catégorie */
}

.emoji-mart-emoji {
  background-color: transparent;
}

.emoji-mart-preview {
  background-color: #1f2937; /* Fond sombre pour l'aperçu */
  color: #ffffff;
}

.emoji-mart-title, .emoji-mart-preview-emoji, .emoji-mart-preview-name {
  color: #ffffff; /* Texte en blanc pour les titres et l'aperçu */
}

</style>