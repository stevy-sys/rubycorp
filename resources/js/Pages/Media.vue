<template>
    <AppLayout :showSidebar="false" title="Dashboard">
        <div class="text-white">
            <div class="lg:flex justify-between">
                <div class="lg:w-[55%]">
                    <div class="w-full bg-red-500 h-[500px] rounded-lg relative">
                        <!-- Si c'est une image -->
                        <span v-if="product.extentionType == 'image'" class="block w-full h-full relative">
                            <img :class="product.is_free == false ? 'filter blur' : ''" class="w-full h-full object-cover" :src="`/storage/data/image/${product.name}`" alt="Product Image" />
                            <!-- Icône du cadenas -->
                            <div v-if="product.is_free == false" class="absolute z-10 inset-0 flex items-center justify-center bg-white bg-opacity-60 rounded-lg">
                                <Icon icon="material-symbols:lock" style="color: black; font-size: 30px; margin-right: 5px;" size="2em" />
                            </div>
                        </span>

                        <!-- Si c'est une vidéo -->
                        <span v-if="product.extentionType == 'video'" class="block w-full h-full relative">
                            <video :class="product.is_free == false ? 'filter blur' : ''" class="w-full h-full object-cover" controls>
                                <source :src="`/storage/data/image/${product.name}`" type="video/mp4" />
                                Your browser does not support the video tag.
                            </video>
                            <!-- Icône du cadenas et du play -->
                            <div v-if="product.is_free == false" class="absolute z-10 inset-0 flex items-center justify-center bg-white bg-opacity-60 rounded-lg">
                                <Icon icon="material-symbols:lock" style="color: black; font-size: 30px; margin-right: 5px;" size="2em" />
                            </div>
                            <div class="absolute z-20 inset-0 flex items-center justify-center bg-white bg-opacity-60 rounded-lg">
                                <Icon icon="icon-park-twotone:play" style="color: black; font-size: 50px; margin-right: 5px;" size="2em" />
                            </div>
                        </span>
                    </div>

                    <div class="p-5 border mt-10">
                        <div class="mt-5 font-bold text-xl">{{ page.props.translations.message.description }}</div>
                        <div class="w-full mt-3">
                            {{ product.description }}
                        </div>
                    </div>
                </div>

                <div class="lg:w-[40%] mt-5 lg:mt-0">
                    <div class="border mb-5 p-5 h-auto rounded bg-grey-500">
                        <div class="mb-2 font-bold text-xl">Details</div>

                        <div class="my-5"><span>{{ page.props.translations.message.upload }} : {{ product.created_at }}</span></div>
                        <div class="my-5">{{ page.props.translations.message.partage }}
                            <div class="flex">
                                <Icon class="cursor-pointer hover:text-red-400" icon="la:facebook-f"
                                    style="font-size: 30px; margin-left: 5px;" size="2em" />
                                <Icon class="cursor-pointer hover:text-red-400" icon="mdi:twitter"
                                    style="font-size: 30px; margin-left: 5px;" size="2em" />
                            </div>
                        </div>
                    </div>

                    <div class="border my-5 p-5 h-auto rounded bg-grey-500">
                        <div v-if="product.is_free == false" class="mb-2 font-bold text-xl">Intéressé ?</div>
                        <div class="flex justify-start items-center">
                            <div v-if="product.is_free == true">{{ page.props.translations.message.gratuit }}</div>
                            <div v-else>{{ product.price / 100 }} €</div>
                        </div>
                        <form v-if="product.is_free == false" class="mt-5 text-white" id="payment-form">
                            <div class="mb-2" ref="cardElement" id="card-element"></div>
                            <button @click="handleSubmit" class="border px-5 py-1 rounded-lg bg-red-500 text-white"
                                type="submit" id="pay-button">Payer</button>
                            <p id="error-message"></p>
                        </form>
                    </div>

                    <div class="border my-5 p-5 rounded bg-grey-500">
                        <div class="mb-2 font-bold text-xl">{{ page.props.translations.message.relatif }}</div>
                        <div class="flex justify-around flex-wrap p-5">
                            <div v-for="(prod, index) in relatif" :key="index"
                                class="rounded-lg mx-1 my-1 w-[70px] h-[70px]">
                                <Link :href="route('media', { product_id: prod.id })"
                                    class="relative  px-1 my-2 rounded-lg cursor-pointer overflow-hidden w-[70px] h-[70px]">

                                <!-- Si c'est une image -->
                                <span v-if="prod.extentionType == 'image'" class="block w-full h-full">
                                    <img :class="prod.is_free == false ? 'filter blur' : ''"
                                        class="w-full h-full object-cover" :src="`/storage/data/image/${prod.name}`"
                                        alt="Product Image" />
                                    <div v-if="prod.is_free == false"
                                        class="absolute z-10 inset-0 flex items-center justify-center bg-white bg-opacity-60 rounded-lg">
                                        <Icon icon="material-symbols:lock"
                                            style="color: black; font-size: 30px ; margin-right: 5px;" size="2em" />
                                    </div>
                                </span>

                                <!-- Si c'est une vidéo -->
                                <span v-if="prod.extentionType == 'video'" class="block w-full h-full">
                                    <video :class="prod.is_free == false ? 'filter blur' : ''"
                                        class="w-full h-full object-cover" controls>
                                        <source :src="`/storage/data/image/${prod.name}`" type="video/mp4" />
                                        Your browser does not support the video tag.
                                    </video>
                                    <div v-if="prod.is_free == false"
                                        class="absolute z-10 inset-0 flex items-center justify-center bg-white bg-opacity-60 rounded-lg">
                                        <Icon icon="material-symbols:lock"
                                            style="color: black; font-size: 30px ; margin-right: 5px;" size="2em" />
                                    </div>
                                    <div
                                        class="absolute z-20 inset-0 flex items-center justify-center bg-white bg-opacity-60 rounded-lg">
                                        <Icon icon="icon-park-twotone:play"
                                            style="color: black; font-size: 50px ; margin-right: 5px;" size="2em" />
                                    </div>
                                </span>

                                </Link>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </AppLayout>

    <div class="mx-auto mt-[100px]">

    </div>
</template>
<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { onMounted, ref } from 'vue';
import { loadStripe } from '@stripe/stripe-js';
import { Icon } from '@iconify/vue';
import { Link, usePage } from '@inertiajs/vue3';
const props = defineProps({
    product: Object,
    relatif: Array,
});
const page = usePage();
console.log(page.props.translations.message)

const handleSubmit = async (event) => {
    event.preventDefault();

    try {
        const response = await window.axios.get(`/create-checkout-session?product_id=${props.product.id}`);
        console.log('response', response);

        const sessionId = response.data.id;

        // Charger Stripe et attendre qu'il soit prêt
        const stripe = await loadStripe('pk_test_51PkRRP2MBhGS3IWFTGLplKKcFukYg76dRAzhXsMXSjjSaQDNdW3dgabblGZcQx7U1SVd1LDkVdoR9BgIdThPw5jz00hNF4xZys');

        if (!stripe) {
            console.error('Échec du chargement de Stripe.');
            return;
        }

        // Rediriger l'utilisateur vers Stripe Checkout
        const { error } = await stripe.redirectToCheckout({
            sessionId: sessionId,
        });

        if (error) {
            console.error('Erreur lors de la redirection vers Stripe Checkout', error);
        }
    } catch (error) {
        console.error('Erreur lors de la création de la session de paiement', error);
    }
}

</script>
<style lang="">

</style>