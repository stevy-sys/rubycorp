<script setup>
import { ref } from 'vue';
const MenuChat = ref(false)
const ShowmenuChat = () => {
    MenuChat.value = !MenuChat.value
    console.log(MenuChat.value);
}
</script>

<template>
    <div class="text-white">
        <!-- Tita -->
        <div class="  border border-white h-auto rounded-xl p-2 ">
            <div class="relative mb-10 ">
                <input
                    class="w-full text-black rounded-xl p-2 pr-12 border border-red-300 focus:border-red-500 focus:outline-none"
                    type="text" placeholder="Recherche">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none"
                    stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-search absolute top-1/2 right-3 transform -translate-y-1/2 pointer-events-none">
                    <circle cx="11" cy="11" r="8"></circle>
                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                </svg>
            </div>
            <div class="relative bg-[#1a1a1a] hover:bg-[#1e293b] transition-colors duration-300">
                <div class="flex">
                    <div class="flex items-center p-2">
                        <div class="w-20 h-20 rounded-full overflow-hidden border border-white">
                            <img class="w-full h-full object-cover"
                                src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTdyhj65-Cz6UvgVh8YUCAQM_ElfcG0gJJ7NA&s"
                                alt="">
                        </div>
                        <div class="ml-5">
                            <p class="font-semibold text-[25px]">Kim Lorie</p>
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none">
                                    <path d="M4 4h16a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H6l-2 2v-2H4V4z" fill="#f87171" />
                                    <path d="M4 4h16a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H6l-2 2v-2H4V4z" stroke="#f87171"
                                        stroke-width="1.5" />
                                    <path d="M12 15l4-4-4-4" stroke="#f87171" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                                <p class="font-sans text-[12px] ml-1">efa nalefanao ve le vola</p>
                            </div>
                        </div>
                    </div>
                </div>
                <svg class="mr-1 absolute left-[70px] bottom-3" xmlns="http://www.w3.org/2000/svg" width="16"
                    height="16" viewBox="0 0 16 16" fill="green">
                    <circle cx="8" cy="8" r="8"></circle>
                </svg>
                <div class="absolute right-4 top-1/2 transform -translate-y-1/2">
                    <svg class="relative" @click="ShowmenuChat" xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" viewBox="0 0 24 24" fill="none">
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
                        <p class="hover:bg-[#1a1a1a] rounded text-center text-sm">Désactiver les notifications</p>
                        <p class="hover:bg-[#1a1a1a] rounded text-center text-sm">Réactiver les notifications</p>
                    </div>
                </div>
            </div>
        </div>
           


        

        <!-- fin tita -->


        <!-- stevy -->


        Lorem ipsum dolor sit amet.
        <!-- fin stevy -->
    </div>

</template>