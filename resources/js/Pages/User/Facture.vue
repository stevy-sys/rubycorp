<template>
    <AppLayout :showSidebar="true">


        <ModalLayout classes="w-[50%] text-white " :isOpen="showInvoce">
            <template #content>
                <div class="bg-white border rounded-lg shadow-lg px-6 py-8 max-w-md mx-auto mt-8">
                    <h1 class="font-bold text-2xl my-4 text-center text-blue-600">KRP Services</h1>
                    <hr class="mb-2">
                    <div class="flex justify-between mb-6">
                        <h1 class="text-lg font-bold">Facture</h1>
                        <div class="text-gray-700">
                            <div>Date:{{ invoice.created_at }}</div>
                            <div>Invoice #: {{ invoice.id }}</div>
                        </div>
                    </div>
                    <div class="mb-8">
                        <h2 class="text-lg font-bold mb-4">Bill To:</h2>
                        <div class="text-gray-700 mb-2">{{ invoice.user.name }}</div>
                        <div class="text-gray-700 mb-2">123 Main St.</div>
                        <div class="text-gray-700 mb-2">Anytown, USA 12345</div>
                        <div class="text-gray-700">{{ invoice.user.email }}</div>
                    </div>
                    <table class="w-full mb-8">
                        <thead>
                            <tr>
                                <th class="text-left font-bold text-gray-700">Description</th>
                                <th class="text-right font-bold text-gray-700">Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-left text-gray-700">{{ invoice.product.name }}</td>
                                <td class="text-right text-gray-700">€{{ invoice.product.price / 100 }}</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td class="text-left font-bold text-gray-700">Total</td>
                                <td class="text-right font-bold text-gray-700">€{{ invoice.product.price / 100 }}</td>
                            </tr>
                        </tfoot>
                    </table>
                    <div class="text-gray-700 mb-2">Merci beaucoup!</div>
                    <!-- <div class="text-gray-700 text-sm">Please remit payment within 30 days.</div> -->
                </div>
            </template>

            <template #footer>
                <button class="border px-3 flex justify-end" @click="showInvoce = false">fermer</button>
            </template>

        </ModalLayout>

        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            id
                        </th>
                        <th scope="col" class="px-6 py-3">
                            date
                        </th>
                        <th scope="col" class="px-6 py-3">
                            action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(fact, index) in factures" :key="index"
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ fact.id }}
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ fact.created_at }}
                        </th>
                        <td class="px-6 py-4 flex ">
                            <div @click="showInvoice(fact)" class="border w-25 mx-2 px-3 rounded cursor-pointer">Voir
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </AppLayout>
</template>
<script setup>
import ModalLayout from '@/Components/ModalLayout.vue';
import AppLayout from '@/Layouts/AppLayout.vue';
import { ref } from 'vue';

defineProps({
    factures: Array
})

const showInvoce = ref(false)
const invoice = ref(null)
const showInvoice = (fact) => {
    invoice.value = fact
    showInvoce.value = true
}
</script>
<style lang="">

</style>


<!-- <div class="bg-white border rounded-lg shadow-lg px-6 py-8 max-w-md mx-auto mt-8">
    <h1 class="font-bold text-2xl my-4 text-center text-blue-600">KRP Services</h1>
    <hr class="mb-2">
    <div class="flex justify-between mb-6">
        <h1 class="text-lg font-bold">Invoice</h1>
        <div class="text-gray-700">
            <div>Date: 01/05/2023</div>
            <div>Invoice #: INV12345</div>
        </div>
    </div>
    <div class="mb-8">
        <h2 class="text-lg font-bold mb-4">Bill To:</h2>
        <div class="text-gray-700 mb-2">John Doe</div>
        <div class="text-gray-700 mb-2">123 Main St.</div>
        <div class="text-gray-700 mb-2">Anytown, USA 12345</div>
        <div class="text-gray-700">johndoe@example.com</div>
    </div>
    <table class="w-full mb-8">
        <thead>
            <tr>
                <th class="text-left font-bold text-gray-700">Description</th>
                <th class="text-right font-bold text-gray-700">Amount</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="text-left text-gray-700">Product 1</td>
                <td class="text-right text-gray-700">$100.00</td>
            </tr>
            <tr>
                <td class="text-left text-gray-700">Product 2</td>
                <td class="text-right text-gray-700">$50.00</td>
            </tr>
            <tr>
                <td class="text-left text-gray-700">Product 3</td>
                <td class="text-right text-gray-700">$75.00</td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <td class="text-left font-bold text-gray-700">Total</td>
                <td class="text-right font-bold text-gray-700">$225.00</td>
            </tr>
        </tfoot>
    </table>
    <div class="text-gray-700 mb-2">Thank you for your business!</div>
    <div class="text-gray-700 text-sm">Please remit payment within 30 days.</div>
</div> -->