<template>
    <AppLayout :showSidebar="true">

        <ModalLayout classes=" w-auto lg:w-[50%] text-white " :isOpen="showModal">
            <template #content>
                <div class="border rounded-lg shadow-lg px-6 py-8 max-w-md mx-auto mt-8">
                    Voulez vous acheter un token a {{ price }} € ? 
                </div>
            </template>

            <template #footer>
                <div class="flex justify-end">
                    <button class="border px-3 mx-1 flex justify-end" @click="showModal = false">fermer</button>
                    <button class="border px-3 mx-1 flex justify-end" @click="payment">Acheter</button>
                </div>
            </template>

        </ModalLayout>

        <ModalLayout classes=" w-auto lg:w-[50%] text-white " :isOpen="showModalSuccess">
            <template #content>
                <div class="border rounded-lg shadow-lg px-6 py-8 max-w-md mx-auto mt-8">
                    Payment avec success . Vous avez maintenant {{ newToken  }} token 
                </div>
            </template>

            <template #footer>
                <div class="flex justify-end">
                    <button class="border px-3 mx-1 flex justify-end" @click="showModalSuccess = false">fermer</button>
                </div>
            </template>
        </ModalLayout>

        <div class="">
            <div class="mb-5 bg-black rounded-xl mx-auto border p-10 shadow-sm">
                Vous avez {{ $attrs.auth.user.token }} token en ce moment 
            </div>
            <div class="bg-black rounded-xl mx-auto border p-10 shadow-sm">
                Achtez un token 1token = {{ priceToken }}€  
            </div>
            <div class="my-5">
                Prix : 500€
            </div>
            <input v-model="token" class=" my-5 border-none text-black w-full rounded-2xl pr-10 pl-4 py-2" type="number" />
            <div class="my-5">
                <button @click="handleModal" class="border px-3 bg-red-400 rounded">Acheter</button>
            </div>
        </div>
    </AppLayout>
</template>
<script setup>
import ModalLayout from "@/Components/ModalLayout.vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import { usePage } from "@inertiajs/vue3";
import { onMounted, ref } from "vue";
const page = usePage();

const props = defineProps({
    user: Object,
    newToken: Number
});

const token = ref("")
const priceToken = ref(page.props.config.price_token)
const price = ref()
const showModal = ref(false)
const showModalSuccess = ref(false)

const handleModal = () => {
    price.value = token.value * priceToken.value
    showModal.value = true
}

const payment = async () => {
    const response = await  window.axios.post('/create-checkout-session-token',{amount : price.value , token : token.value})
    window.location.href = await response.data.url;
    // console.log(response);
}

onMounted(() => {
    if (props.newToken) {
        showModalSuccess.value = true
    }
})
</script>
<style lang=""></style>
