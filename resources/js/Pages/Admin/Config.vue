<template>
    <AdminLayout>
        <div>
            <!-- <div>
                <label for="texte" class="block mb-2 text-sm font-medium text-white-900 ">Nom du site</label>
                <div class="flex">
                    <input type="texte" name="password" id="password" placeholder="aphrodite"
                        class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required="">
                    <button class="border px-2 rounded cursor-pointer">modifier</button>
                </div>
            </div> -->

            <div class="my-5">
                <label for="texte" class="block mb-2 text-sm font-medium text-white-900 ">Description dessous profile</label>
                <div class="flex">
                    <textarea v-model="something" height="200" type="texte" name="password" id="password"
                        placeholder="aphrodite"
                        class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required="">
                        𝐏𝐀𝐒𝐒𝐈𝐎𝐍𝐍𝐄́𝐄 𝐏𝐀𝐑 𝐋𝐀 𝐁𝐄𝐀𝐔𝐓𝐄́ 𝐃𝐔 𝐂𝐎𝐑𝐒
                        • Venir en privée pour plus de contenu spicy !
                        • Nue/Lingerie/Plaisir seul/Pieds/S
                        • Plusieurs médias publiés par jours pour votre plus grand plaisir
                        • Bonnet E/Morphologie
                    </textarea>
                    <button class="border px-2 rounded cursor-pointer mx-1">modifier</button>
                </div>

            </div>

            <div class="my-5">
                <label for="texte" class="block mb-2 text-sm font-medium text-white-900 ">Photo de couverture</label>
                <img v-if="croppedImagePdc" :src="croppedImagePdc" />
                <input type="file" @change="onFileChange" />
                <div v-if="image" class="crop-container">
                    <img ref="imageRef" class="w-full" :src="image" />
                </div>
                <button v-if="showBtnCrop" class="px-2 border" @click="cropImagePdc">Crop Image</button>
                <button v-if="!showBtnCrop" @click="savePdc" class="px-2 border">Enregistrer</button>
            </div>

            <div class="my-5">
                <label for="texte" class="block mb-2 text-sm font-medium text-white-900 ">Photo de profile</label>
                <img v-if="croppedImagePdp" :src="croppedImagePdp" />
                <input type="file" @change="onFileChangePdp" />
                <div v-if="imagePdp" class="crop-container">
                    <img ref="imageRefPdp" class="w-full" :src="imagePdp" />
                </div>
                <button v-if="showBtnCropPdp" class="px-2 border" @click="cropImagePdp">Crop Image</button>
                <button v-if="!showBtnCropPdp" @click="savePdp" class="px-2 border">Enregistrer</button>
            </div>

            <div class="my-5">
                <label for="texte" class="block mb-2 text-sm font-medium text-white-900 ">Mention legale</label>
                <textarea v-model="metionLegale" class="w-full text-black" name="" id="">

                </textarea>
                <div @click="updateMention">
                    <button class="px-3 border">Enregister</button>
                </div>
            </div>
        </div>
    </AdminLayout>
</template>
<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';
import Cropper from 'cropperjs';
import 'cropperjs/dist/cropper.css';
import { nextTick } from 'vue';
const props = defineProps({
    configs:Object
})


const name = ref("")
const descirption = ref("")
const pdp = ref("")
const pdc = ref("")

const uploadPdp = ref("")
const uploadPdc = ref("")

const metionLegale = ref(props.configs.mention)
// Références
const image = ref(null);
const croppedImagePdc = ref(null);
const imageRef = ref(null); // Référence à l'élément image
const showBtnCrop = ref(false)
let cropper = null;


const imagePdp = ref(null);
const croppedImagePdp = ref(null);
const imageRefPdp = ref(null); // Référence à l'élément image
const showBtnCropPdp = ref(false)
// Fonction de gestion du fichier
function onFileChange(event) {
    croppedImagePdc.value = ""
    showBtnCrop.value = true
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = async (e) => {
            image.value = e.target.result;
            await nextTick();
            if (imageRef.value) {
                cropper = new Cropper(imageRef.value, {
                    aspectRatio: 16 / 9, // Ratio de la photo de couverture (ex: 16:9)
                    viewMode: 1,
                    autoCropArea: 1,
                });
            }
        };
        reader.readAsDataURL(file);
    }
}

// Fonction de recadrage
function cropImagePdc() {
    showBtnCrop.value = false
    if (cropper) {
        const canvas = cropper.getCroppedCanvas({
            width: 1600, // Largeur souhaitée de l'image recadrée
            height: 900, // Hauteur souhaitée de l'image recadrée
        });
        croppedImagePdc.value = canvas.toDataURL('image/jpeg');
        image.value = ""
        console.log(croppedImagePdc.value);
    }
}



function onFileChangePdp(event) {
    croppedImagePdp.value = ""
    showBtnCropPdp.value = true
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = async (e) => {
            imagePdp.value = e.target.result;
            await nextTick();
            if (imageRefPdp.value) {
                cropper = new Cropper(imageRefPdp.value, {
                    aspectRatio: 1, // Format carré pour la photo de profil
                    viewMode: 1,
                    autoCropArea: 1,
                    responsive: true,
                });
            }
        };
        reader.readAsDataURL(file);
    }
}

function cropImagePdp() {
    showBtnCropPdp.value = false
    if (cropper) {
        const canvas = cropper.getCroppedCanvas({
            width: 200, // Largeur souhaitée de l'image recadrée
            height: 200, // Hauteur souhaitée de l'image recadrée
        });
        croppedImagePdp.value = canvas.toDataURL('image/jpeg');
        imagePdp.value = ""
        console.log(croppedImagePdp.value);
    }
}


const savePdp = async () => {
    const response = await window.axios.post('/admin/updateConfig',{pdp : croppedImagePdp.value})
    console.log(response);
    
}

const savePdc = async () => {
    const response = await window.axios.post('/admin/updateConfig',{pdc : croppedImagePdc.value})
    console.log(response);
}


const updateMention =  async () => {
    const response = await window.axios.post('/admin/updateMention',{mention : metionLegale.value});
    console.log(response);
}
</script>

<style scoped>
.cover-container {
    display: flex;
    flex-direction: column;
    align-items: center;
}

.crop-container {
    width: 100%;
    max-width: 100%;
    height: 450px;
    /* Ajustez cette hauteur selon vos besoins */
    position: relative;
}

img {
    width: 100%;
    height: auto;
}
</style>