<template>
    <AdminLayout>
        <div class="flex justify-end mb-5">
            <button class="px-5 border hover:bg-red-400" @click="showConversation = true">Conversation</button>
        </div>

        <ModalLayout classes="text-white w-[75%]" :isOpen="showConversation">
            <template #content>
                <div class="text-white flex justify-center">
                    <div class="w-[50%] border border-white h-auto rounded-xl p-2 ">
                        <div class="relative mb-10 ">
                            <input
                                class="w-full text-black rounded-xl p-2 pr-12 border border-red-300 focus:border-red-500 focus:outline-none"
                                type="text" placeholder="Recherche">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"
                                fill="none" stroke="black" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"
                                class="feather feather-search absolute top-1/2 right-3 transform -translate-y-1/2 pointer-events-none">
                                <circle cx="11" cy="11" r="8"></circle>
                                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                            </svg>
                        </div>
                        <div v-for="(conv,index) in conversations" :key="index" class="relative bg-[#1a1a1a] hover:bg-[#1e293b] transition-colors duration-300">
                            <div @click="changeConversation(conv)"ss="flex">
                                <div class="flex items-center p-2">
                                    <div class="w-20 h-20 rounded-full overflow-hidden border border-white">
                                        <img class="w-full h-full object-cover"
                                            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTdyhj65-Cz6UvgVh8YUCAQM_ElfcG0gJJ7NA&s"
                                            alt="">
                                    </div>
                                    <div class="ml-5">
                                        <p class="font-semibold text-[25px]">{{conv.user.name}}</p>
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
                                            <p class="font-sans text-[12px] ml-1">{{ conv.last_message.message }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <svg class="mr-1 absolute left-[70px] bottom-3" xmlns="http://www.w3.org/2000/svg"
                                width="16" height="16" viewBox="0 0 16 16" fill="green">
                                <circle cx="8" cy="8" r="8"></circle>
                            </svg>
                            <div class="absolute z-100 right-4 top-1/2 transform -translate-y-1/2">
                                <svg class="relative z-100" @click="MenuChat = !MenuChat" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <circle cx="12" cy="6" r="2" fill="#333" />
                                    <circle cx="12" cy="12" r="2" fill="#333" />
                                    <circle cx="12" cy="18" r="2" fill="#333" />
                                </svg>
                                <div v-if="MenuChat === true" class=" absolute z-100 right-[10px] top-[25px] border bg-[#1e293b] rounded p-2 w-[200px] ">
                                    <p class="hover:bg-[#1a1a1a] rounded text-center text-sm">Voir profil</p>
                                    <p class="hover:bg-[#1a1a1a] rounded text-center text-sm">Archiver</p>
                                    <p class="hover:bg-[#1a1a1a] rounded text-center text-sm">Supprimmer</p>
                                    <p class="hover:bg-[#1a1a1a] rounded text-center text-sm">Bloquer</p>
                                    <p class="hover:bg-[#1a1a1a] rounded text-center text-sm">Retirer</p>
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

        <div v-if="conversationActif" class="flex text-white w-[100%]">
            <!-- stevy -->
            <div class="w-full">
                <div class="flex items-center ">
                    <div class="w-[100px] h-[100px] relative rounded-full bg-red-500">
                        <img class="w-[100px] h-[100px] rounded-full"
                            src="https://plus.unsplash.com/premium_photo-1664474619075-644dd191935f?fm=jpg&q=60&w=3000&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8aW1hZ2V8ZW58MHx8MHx8fDA%3D">
                        <span
                            class="w-[20px] border bg-green-500 h-[20px] right-[6px] bottom-[6px] absolute rounded-full">
                        </span>
                    </div>
                    <div class="w-[75%] pl-10">
                        <h1 class="text-2xl">{{ conversationActif.user.name }}</h1>
                        <span class="text-sm">4520 messages</span>
                    </div>
                    <div @click="MenuMore = true" class="relative">
                        <Icon @click="" class=" w-10 h-10 text-white-500 transition duration-75 group-hover:text-white dark:group-hover:text-white" icon="solar:gallery-bold" />
                        <ModalLayout classes="text-white w-full lg:w-[50%]" :isOpen="MenuMore">
                            <template #content>
                                <div class="flex justify-center wrap">
                                    <div class="w-[100px] h-[100px] mx-1 bg-red-400 border"></div>
                                    <div class="w-[100px] h-[100px] mx-1 bg-red-400 border"></div>
                                    <div class="w-[100px] h-[100px] mx-1 bg-red-400 border"></div>
                                    <div class="w-[100px] h-[100px] mx-1 bg-red-400 border"></div>
                                </div>
                            </template>
                            <template #footer>
                                <div class="flex justify-center">
                                    <button class="px-3 py-2 rounded-lg bg-blue-400 " @click="MenuMore = false">fermer</button>
                                </div>
                            </template>
                        </ModalLayout>
                        
                        <!-- <div v-if="MenuMore === true"
                            class="  border bg-[#1e293b] rounded p-2 w-[200px] absolute right-[18px] top-[35px]"> -->
                            <!-- <p class="hover:bg-[#1a1a1a] rounded text-center text-sm">Voir profil</p> -->
                            <!-- <p class="hover:bg-[#1a1a1a] rounded text-center text-sm">Archiver</p> -->
                            <!-- <p class="hover:bg-[#1a1a1a] rounded text-center text-sm">Voir contenue multimedia</p> -->
                            <!-- <p class="hover:bg-[#1a1a1a] rounded text-center text-sm">Supprimmer</p> -->
                            <!-- <p class="hover:bg-[#1a1a1a] rounded text-center text-sm">Bloquer</p> -->
                            <!-- <p class="hover:bg-[#1a1a1a] rounded text-center text-sm">Retirer</p> -->
                        <!-- </div> -->
                    </div>

                </div>

                <div ref="chatContainer" class="chat-container">
                    <!-- ***************************************************************************************************** -->
                     <div  v-for="(message,index) in messages" :key="index">
                        <!-- toi -->
                        <div v-if=" !verifAdmin(message.user_id)" class="mt-10 flex">
                            <div class="min-w-[50px]">
                                <img class="w-[50px] h-[50px] rounded-full"
                                    src="https://plus.unsplash.com/premium_photo-1664474619075-644dd191935f?fm=jpg&q=60&w=3000&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8aW1hZ2V8ZW58MHx8MHx8fDA%3D">
                            </div>
                            <div class="mx-5">
                                <div class="relative max-w-[50%] min-w-[100px] py-5 px-5 border rounded-tr-[20px] rounded-bl-[20px] min-h-[50px]">
                                    {{ message.message }}
                                </div>
                                <img v-if="message.mediable && message.mediable.length > 0" class="w-[25%] h-auto border rounded mt-3" :src="`/storage/data/image/${message.mediable[0].name}`">
                                <span class="text-sm ml-5 text-white mt-3"> 20:45</span>
                            </div>
                        </div>

                        <!-- moi -->
                        <div v-else class="mt-10">
                            <div class="mx-5 justify-end flex">
                                <div class="relative z-40 bg-red-400 max-w-[50%] py-5 px-5 rounded-tl-[20px] rounded-br-[20px] min-h-[50px]">
                                    {{message.message}}
                                </div>
                            </div>
                            <div v-if="message.mediable && message.mediable.length > 0" class="justify-end flex">
                                <img class="w-[25%]  h-auto border border-red-400 rounded mt-3 mr-5" :src="`/storage/data/image/${message.mediable[0].name}`">
                            </div>
                            <span class="justify-end mt-3 flex text-sm mr-5 text-white">20:45</span>
                        </div>
                     </div>
                </div>
 

                <div v-if="fileData" class="flex  w-full  mt-2  h-20 bg-[#1e293b] text-black z-50 border-none rounded-t-2xl">
                    <div class="relative  text-xs ml-5 mx-2 w-[30px] p-4 h-[30px] bg-green">
                        <div class="border rounded border-black w-[50px] h-[50px]">
                            <img class="w-[50px] h-[50px]" :src="fileData" alt="" srcset="">
                        </div>
                        <Icon @click="fileData = null" class="cursor-pointer absolute top-[10px] right-[6px] left-0 w-6 h-6 text-white" icon="carbon:close-outline" />
                    </div>
                </div>

                <div class="flex justify-end items-center mt-2 ">
                    <div class="flex items-center  w-[20%] ">
                        <div class="ml-1">
                            <Icon @click="fileInput.click();" class="cursor-pointer w-10 h-10 text-white-500 transition duration-75 group-hover:text-white dark:group-hover:text-white" icon="gravity-ui:picture" />
                            <input 
                                type="file" 
                                ref="fileInput" 
                                @change="handleFileChange" 
                                class="hidden"
                            />
                        </div>
                        <div class="ml-5">
                            <Icon
                                class="w-10 h-10 text-white-500 transition duration-75 group-hover:text-white dark:group-hover:text-white"
                                icon="solar:file-bold" />
                        </div>
                    </div>
                    <div class=" w-[75%] ml-5 flex items-center">
                        <div class="text-black w-full rounded-2xl">

                            <div class="relative w-full">
                                <span v-if="showEmo" class="absolute right-2 bottom-[50px] z-[9999]"> 
                                    <Picker :data="emojiIndex" set="twitter" @select="showEmoji" />
                                </span>
                                <input v-model="newMessage" class="border-none text-black w-full rounded-2xl pr-10 pl-4 py-2" type="text" />
                                <Icon @click="showEmo = !showEmo" class="absolute right-3 top-1/2 transform -translate-y-1/2 w-6 h-6 text-[#1e293b]"
                                    icon="fluent:emoji-smile-slight-24-filled" />

                            </div>
                        </div>
                        <div @click="sendMessage" class="cursor-pointer w-10 h-10">
                            <Icon class="w-10 h-10 text-[#1e293b] ml-1  " icon="fluent:send-48-filled" />
                        </div>
                    </div>
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

import { Icon } from '@iconify/vue';
const props = defineProps({
    conversations: {
        type: Array
    },
    idAdmin:{
        type: Array
    }
})




const showEmo = ref(false)
const emojiIndex = new EmojiIndex(data);
const emojisOutput = ref("");
const showEmoji = (emoji) => {
    newMessage.value += emoji.native;
};


const fileInput = ref(null);
const fileData = ref(null)

const handleFileChange = async (event) => {
    const file = event.target.files[0];
  if (file) {
    const reader = new FileReader();
    
    reader.onload = async () => {
        fileData.value = await reader.result;
    };
    
    reader.readAsDataURL(file);
  }
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
    showConversation.value=false
    scrollToBottom();

}

const sendMessage = async () => {
    const data = {
        message: newMessage.value,
        conversation_id: conversationActif.value.id,
        file:fileData.value
    }
    const response = await window.axios.post('/admin/sendMessage', data)
    messages.value.push(response.data.message)
    conversationActif.value.last_message = response.data.message
    newMessage.value = await ''
    await scrollToBottom();
}


const scrollToBottom = () => {
    if (chatContainer.value) {
        chatContainer.value.scrollTop = chatContainer.value.scrollHeight;
    }
};
const MenuChat = ref(false)

const MenuMore = ref(false)

const verifAdmin = (user_id) => {
    let existe = props.idAdmin.filter((elemnt) => {
        return elemnt.id == user_id
    })
    return existe.length > 0 ? true : false ;
}
</script>

<style scoped>
.chat-container {
    max-height: 500px;
    overflow-y: auto;
    padding: 10px;
}





.emoji-mart {
    background-color: #1f2937;
    /* Fond sombre */
    color: #374151;
    /* Texte en blanc */
}

.emoji-mart-search input {
    background-color: #374151;
    /* Fond sombre pour la barre de recherche */
    color: #374151;
    /* Texte en blanc */
}

.emoji-mart-bar {
    background-color: #374151;
    /* Fond sombre pour la barre d'outils */
}

.emoji-mart-category-label {
    background-color: #4b5563;
    /* Fond des étiquettes de catégorie */
}

.emoji-mart-emoji {
    background-color: transparent;
}

.emoji-mart-preview {
    background-color: #1f2937;
    /* Fond sombre pour l'aperçu */
    color: #ffffff;
}

.emoji-mart-title,
.emoji-mart-preview-emoji,
.emoji-mart-preview-name {
    color: #ffffff;
    /* Texte en blanc pour les titres et l'aperçu */
}
</style>