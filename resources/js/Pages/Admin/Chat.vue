<template>
    <AdminLayout>
        <div class="flex h-screen overflow-hidden">
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
                <!-- Contact List -->
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

            <!-- Main Chat Area -->
            <div v-if="conversationActif" class="w-full">
                <!-- Chat Header -->
                <header class="bg-white p-4 text-gray-700">
                    <h1 class="text-2xl font-semibold">{{ conversationActif.user.name}}</h1>
                </header>

                <!-- Chat Messages -->
                <div class="h-[500px] overflow-y-auto p-4 pb-36">
                    <!-- Incoming Message -->
                     <div v-for="(message,index) in messages" :key="index">
                         <div v-if="$attrs.auth.user.id !== message.user_id " class="flex mb-4 cursor-pointer">
                             <div class="w-9 h-9 rounded-full flex items-center justify-center mr-2">
                                 <img src="https://placehold.co/200x/ffa8e4/ffffff.svg?text=ʕ•́ᴥ•̀ʔ&font=Lato" alt="User Avatar" class="w-8 h-8 rounded-full">
                             </div>
                             <div class="flex max-w-96 bg-white rounded-lg p-3 gap-3">
                                 <p class="text-gray-700">{{ message.message }}</p>
                             </div>
                         </div>
     
                         <!-- Outgoing Message -->
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

                <!-- Chat Input -->
            </div>
        </div>
    </AdminLayout>
</template>

<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { ref } from 'vue';

const props = defineProps({
    conversations:{
        type:Array
    }
})

const messages = ref([])
const newMessage = ref('')
const conversationActif = ref(null)

const changeConversation = async (conversation) => {
    const response = await  window.axios.get('/admin/getMessage/'+ conversation.id)
    conversationActif.value = conversation ;
    messages.value = response.data.messages
}

const sendMessage = async () => {
    const data = {
        message:newMessage.value,
        conversation_id:conversationActif.value.id
    }
    const response = await  window.axios.post('/admin/sendMessage',data)
    messages.value.push(response.data.message)
    conversationActif.value.last_message = response.data.message
    newMessage.value = ''
}
</script>