<template>
    <AppLayout :showSidebar="false" title="Dashboard">
        <div class="text-white">
            <div class="lg:flex justify-between">
                <div class="lg:w-[55%]">
                    <div class="w-full bg-red-500 h-[500px] rounded-lg"></div>
                    <div class="p-5 border mt-10">
                        <div class="mt-5 font-bold text-xl">Descriptions</div>
                        <div class="w-full mt-3">
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Officia fugit sed ullam nulla
                            odit.
                            Sequi eum praesentium inventore illum commodi?
                        </div>
                    </div>
                </div>

                <div class="lg:w-[40%] mt-5 lg:mt-0">
                    <div class="border mb-5 p-5 h-auto rounded bg-grey-500">
                        <div class="mb-2 font-bold text-xl">Details</div>
                        <div class="my-5"><span>24 vu</span></div>
                        <div class="my-5"><span>24 acheter</span></div>
                        <div class="my-5"><span>upload : 24 juillet</span></div>
                        <div class="my-5">Partager sur : <span class="mx-5">facebook</span> <span
                                class="mx-5">twitter</span></div>
                    </div>

                    <div class="border my-5 p-5 h-auto rounded bg-grey-500">
                        <div class="mb-2 font-bold text-xl">Intéressé ?</div>
                        <div class="flex justify-start items-center">
                            <div>24€</div>
                        </div>
                        <form class="mt-5 text-white" id="payment-form">
                            <div class="mb-2" ref="cardElement" id="card-element"></div>
                            <button @click="handleSubmit" class="border px-5 py-1 rounded-lg bg-red-500 text-white"
                                type="submit" id="pay-button">Payer</button>
                            <p id="error-message"></p>
                        </form>
                    </div>

                    <div class="border my-5 p-5 h-auto rounded bg-grey-500">
                        <div class="mb-2 font-bold text-xl">Produits relatifs</div>
                        <div class="flex justify-around flex-wrap">
                            <div v-for="i in 10" :key="i" class="bg-red-500 rounded-lg border my-1 w-[70px] h-[70px]">
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
const props = defineProps({
    product: Object,
});

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