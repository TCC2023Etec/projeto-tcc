<template>
    <div v-for="postagem in postagens" class="card mb-3 w-md-15 w-lg-15 shadow-sm" id="card-post">
        <img v-if="postagem.imagem" :src="`storage/postagem/${postagem.imagem}`" class="card-img-top img-fuild object-fit-fill" style="height: 250px" alt="Postagem">
        <div class="card-body d-flex flex-column">
            <h5 class="card-title fw-bold fs-4 mb-0">{{ postagem.titulo }}</h5>
            <p class="card-text mb-3"><small class="text-body-secondary">{{ postagem.usuario.name }} | {{ postagem.created_at }}</small></p>
            <!-- <p class="card-text">{{ postagem.conteudo }}</p> -->
            <div :class="{'visivel': !postagem.visivel}" class="card-text" v-html="postagem.conteudo"></div>
            <button v-if="postagem.conteudo.length > 100 && !postagem.visivel" @click="mostrarTexto(postagem)" class="btn btn-link text-start p-0 text-decoration-none">Ver mais</button>
            <button v-if="postagem.conteudo.length > 100 && postagem.visivel" @click="esconderTexto(postagem)" class="btn btn-link text-start p-0 text-decoration-none">Ver menos</button>
            <span>{{ postagem.like }} <i class='bx bx-like me-1'></i></span>
        </div>
        <div class="card-footer d-flex justify-content-around">
            <BotaoCurtida :postagem="postagem"/>
            <!-- <i class='bx bx-like bx-tada bx-flip-horizontal' ></i>     Animação do botão de like -->
            <button class="d-flex justify-content-center align-items-center"><i class='bx bx-message-dots me-1'></i>Comentar</button>
        </div>
        <Comentario :postagem="postagem"/>
    </div>
</template>

<script>
import { Link } from '@inertiajs/vue3';
import BotaoCurtida from '@/Components/BotaoCurtida.vue';
import Comentario from '@/Components/Form/Comentario.vue';

export default {
    name: 'Card',
    components: {
        Link,
        BotaoCurtida,
        Comentario
    },
    data() {
        return {
            usuarioLogado: this.$page.props.auth.user,
            publicacaoLike: false,
        }
    },
    props: {
        postagens: Array
    },
    methods: {
        mostrarTexto(postagem) {
            postagem.visivel = true;
        },
        esconderTexto(postagem) {
            postagem.visivel = false;
        }
    }
}
</script>

<style>
#card-post {
    width: 650px;
}

.visivel {
    white-space: pre-wrap;
    overflow: hidden;
    text-overflow: ellipsis;
    display: -webkit-box;
    -webkit-line-clamp: 5;
    -webkit-box-orient: vertical;
}
</style>