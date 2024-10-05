<template>
    <AppLayout :showSidebar="true">
        <!-- <div class="flex h-screen overflow-hidden">
            <div class="w-full">
                <div v-if="!messages">
                    Pas de messages pour le moment
                </div>
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
                <div v-if="messages" class=" bg-black border-t border-gray-300 p-4">
                    <div class="flex items-center">
                        <input v-model="newMessage" type="text" placeholder="Type a message..." class="w-full text-black p-2 rounded-md focus:outline-none focus:border-blue-500">
                        <button @click="sendMessage" class="bg-indigo-500 text-white px-4 py-2 rounded-md ml-2">Send</button>
                    </div>
                </div>

            </div>
        </div> -->
        <div class="flex text-white w-[100%]">
            <!-- stevy -->
            <div class="w-full">
                <div class="flex">
                    <div class="w-[100px] h-[100px] relative rounded-full bg-red-500">
                        <img class="w-[100px] h-[100px] rounded-full"
                            src="https://plus.unsplash.com/premium_photo-1664474619075-644dd191935f?fm=jpg&q=60&w=3000&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8aW1hZ2V8ZW58MHx8MHx8fDA%3D">
                        <span
                            class="w-[20px] border bg-green-500 h-[20px] right-[6px] bottom-[6px] absolute rounded-full">
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
                            <div class="max-w-[50%] py-5 px-5 border rounded-tr-[20px] rounded-bl-[20px] min-h-[50px]">
                                Lorem ipsum
                                dolor sit amet consectetur, adipisicing elit. Blanditiis explicabo velit necessitatibus
                                obcaecati omnis
                                iste incidunt. Voluptatum, iure. Temporibus, repellendus. Lorem ipsum dolor sit amet
                                consectetur
                                adipisicing elit. Voluptates, repudiandae vero architecto voluptatibus obcaecati
                                veritatis
                                nesciunt
                                dolore nihil alias hic!
                            </div>
                            <span class="text-sm ml-5 text-white mt-3">20:45</span>
                        </div>
                    </div>

                    <div class="mt-10">
                        <div class="mx-5 justify-end flex">
                            <div
                                class="bg-red-400 max-w-[50%] py-5 px-5 rounded-tl-[20px] rounded-br-[20px] min-h-[50px]">
                                Lorem
                                ipsum dolor sit amet consectetur, adipisicing elit. Blanditiis explicabo velit
                                necessitatibus obcaecati
                                omnis iste incidunt. Voluptatum, iure. Temporibus, repellendus. Lorem ipsum dolor sit
                                amet
                                consectetur
                                adipisicing elit. Voluptates, repudiandae vero architecto voluptatibus obcaecati
                                veritatis
                                nesciunt
                                dolore nihil alias hic!</div>
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
                            <div class="  max-w-[50%] py-5 px-5 rounded-tr-[20px] rounded-bl-[20px] min-h-[50px]">
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
                                necessitatibus
                                obcaecati omnis iste incidunt. Voluptatum, iure. Temporibus, repellendus. Lorem ipsum
                                dolor
                                sit amet
                                consectetur adipisicing elit. Voluptates, repudiandae vero architecto voluptatibus
                                obcaecati
                                veritatis
                                nesciunt dolore nihil alias hic!</div>
                        </div>
                        <div class="justify-end flex">
                            <img class="w-[25%]  h-auto border border-red-400 rounded mt-3 mr-5" src="https://plus.unsplash.com/premium_photo-1664474619075-644dd191935f?fm=jpg&q=60&w=3000&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8aW1hZ2V8ZW58MHx8MHx8fDA%3D">
                        </div>
                        <span class="justify-end mt-3 flex text-sm mr-5 text-white">20:45</span>
                    </div>

                    <!-- ***************************************************************************************************** -->
                </div>
            </div>
            <!-- fin stevy -->
        </div>
    </AppLayout>
</template>
<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { onMounted, ref } from 'vue';
const chatContainer = ref(null);

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
</style>