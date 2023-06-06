<template>
    <div class="bg-light rounded-3 shadow p-6 mb-8 d-flex justify-content-around new-post w-md-15">
        <!-- profile pic -->
        <div class="cursor-pointer w-10 h-12 bg-gray-300 flex aling-items-center justify-content-center rounded-5 me-3">
            <img v-if="usuario.imagem" :src="`storage/users/${usuario.imagem}`" alt="Perfil" class="rounded-5">
            <img v-else src="../../../../public/img/perfil.png" alt="Perfil" class="rounded-5">
        </div>
        
        <!-- Form post -->
        <div class="flex-1">
            <button 
            class="bg-gray-200 focus:shadow-outline hover:bg-gray-100 border border-transparent rounded-lg py-2 px-4 block appearance-none font-light resize-none w-full cursor-pointer h-full text-start"
            data-bs-toggle="modal" data-bs-target="#postModal"
            >
            Qual será sua próxima publicação?
        </button>
        
        <!-- divider line -->
        <div class="w-auto border rounded-lg mt-1"></div>
        <!-- Modal -->
        <ModalPostagem />
    </div>
</div>
</template>

<script>
import { useForm } from '@inertiajs/vue3';
import MensagemErro from '@/Components/MensagemErro.vue';
import ModalPostagem from '@/Components/Form/ModalPostagem.vue';

export default {
    name: 'NewPost',
    components: {
        MensagemErro,
        ModalPostagem
    },
    props: {
        usuario: Object
    },
}
</script>

<style>


</style>