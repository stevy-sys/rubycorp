<template>
    <AppLayout :showSidebar="true">
        <div class="flex h-screen overflow-hidden">
            <!-- Main Chat Area -->
            <div class="w-full">
                <div v-if="!messages">
                    Pas de messages pour le moment
                </div>
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
                <div v-if="messages" class=" bg-black border-t border-gray-300 p-4">
                    <div class="flex items-center">
                        <input v-model="newMessage" type="text" placeholder="Type a message..." class="w-full text-black p-2 rounded-md focus:outline-none focus:border-blue-500">
                        <button @click="sendMessage" class="bg-indigo-500 text-white px-4 py-2 rounded-md ml-2">Send</button>
                    </div>
                </div>

                <!-- Chat Input -->
            </div>
        </div>
    </AppLayout>
</template>
<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { ref } from 'vue';

const props = defineProps({
    conversations:Object
})

const messages = ref(props.conversations.messages)

const newMessage = ref(null)


const sendMessage = async () => {
    const data = {
        message:newMessage.value,
    }
    const response = await  window.axios.post('/user/sendMessage',data)
    messages.value.push(response.data.message)
    newMessage.value = ''
}

</script>
<style lang="">

</style>