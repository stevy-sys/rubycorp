<template>
    <AppLayout :showSidebar="true">
        <div class="flex text-white w-[100%]">
            <!-- stevy -->
            <div class="w-full">
                <div class="flex items-center ">
                    <div class="w-[100px] h-[100px] relative rounded-full bg-red-500">
                        <img class="w-[100px] h-[100px] rounded-full" :src="`/storage/data/image/${config.pdp}`">
                        <span class="w-[20px] border bg-green-500 h-[20px] right-[6px] bottom-[6px] absolute rounded-full">
                        </span>
                    </div>
                    <div class="w-[75%] pl-10">
                        <h1 class="text-2xl">Aphrodite</h1>
                        <span class="text-sm">{{ count }} messages</span>
                    </div>
                    <div @click="MenuMore = true" class="relative">
                        <Icon @click="" class=" w-10 h-10 text-white-500 transition duration-75 group-hover:text-white dark:group-hover:text-white" icon="solar:gallery-bold" />
                        <ModalLayout classes="text-white w-[50%]" :isOpen="MenuMore">
                            <template #content>
                                <div class="flex justify-center wrap">
                                    <div v-for="gallerie in media" class="w-[100px] h-[100px] mx-1 bg-red-400 border">
                                        <img  class="w-[100px] h-[100px]" :src="`/storage/data/image/${gallerie.name}`" />
                                    </div>
                                </div>
                            </template>
                            <template #footer>
                                <div class="flex justify-center">
                                    <button class="px-3 py-2 rounded-lg bg-blue-400 " @click="MenuMore = false">fermer</button>
                                </div>
                            </template>
                        </ModalLayout>
                       
                    </div>

                </div>

                <div ref="chatContainer" class="chat-container">
                    <!-- ***************************************************************************************************** -->
                     <div  v-for="(message,index) in messages" :key="index">
                        <div v-if="$attrs.auth.user.id !== message.user_id " class="mt-10 flex">
                            <div class="min-w-[50px]">
                                <img class="w-[50px] h-[50px] rounded-full" :src="`/storage/data/image/${config.pdp}`">
                            </div>
                            <div class="mx-5">
                                <div class="relative max-w-[50%] min-w-[100px] py-5 px-5 border rounded-tr-[20px] rounded-bl-[20px] min-h-[50px]">
                                {{message.message}}
                                </div>
                                <img v-if="message.mediable && message.mediable.length > 0" class="w-[25%] h-auto border rounded mt-3" :src="`/storage/data/image/${message.mediable[0].name}`">
                                <span class="text-sm ml-5 text-white mt-3">20:45</span>
                            </div>
                        </div>

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
                    <div class="flex justify-start ">
                        <div class="ml-1">
                            <Icon @click="fileInput.click();" class="cursor-pointer w-10 h-10 text-white-500 transition duration-75 group-hover:text-white dark:group-hover:text-white" icon="gravity-ui:picture" />
                            <input 
                                type="file" 
                                ref="fileInput" 
                                @change="handleFileChange" 
                                class="hidden"
                            />
                        </div>
                        <!-- <div class="ml-5">
                            <Icon
                                class="w-10 h-10 text-white-500 transition duration-75 group-hover:text-white dark:group-hover:text-white"
                                icon="solar:file-bold" />
                        </div> -->
                    </div>
                    <div class=" w-[90%] ml-5 flex items-center">
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
                            <Icon class="w-10 h-10 text-red-400 text-[#1e293b] ml-1  " icon="fluent:send-48-filled" />
                        </div>
                    </div>
                </div>
            </div>
            <!-- fin stevy -->
        </div>
    </AppLayout>
</template>

<script setup>
import ModalLayout from '@/Components/ModalLayout.vue';
import AppLayout from '@/Layouts/AppLayout.vue';
import { computed, onMounted, ref } from 'vue';

//emoji
import data from "emoji-mart-vue-fast/data/all.json";
import "emoji-mart-vue-fast/css/emoji-mart.css";
import { Picker, EmojiIndex } from "emoji-mart-vue-fast/src";

import { Icon } from '@iconify/vue';
import { usePage } from '@inertiajs/vue3';
const props = defineProps({
    conversations: {
        type: Array
    },
    count: {
        type: Number
    },
    media:{
        type: Array
    }
})



const page = usePage();

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


const messages = ref(props.conversations.messages)
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


const config = computed(() => {
    console.log(page);
    return page.props.config || {};
});

const sendMessage = async () => {
    const data = {
        message:newMessage.value,
        file:fileData.value
    }
    const response = await  window.axios.post('/user/sendMessage',data)
    messages.value.push(response.data.message)
    // conversationActif.value.last_message = response.data.message
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