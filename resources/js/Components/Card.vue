<template>
    <div v-for="postagem in postagens" class="card mb-3 w-md-15 w-lg-15" id="card-post">
        <img v-if="postagem.imagem" :src="`storage/postagem/${postagem.imagem}`" class="card-img-top img-fuild object-fit-fill" style="height: 250px" alt="Postagem">
        <div class="card-body">
            <h5 class="card-title fw-bold fs-4 mb-0">{{ postagem.titulo }}</h5>
            <p class="card-text mb-3"><small class="text-body-secondary">{{ postagem.usuario.name }} | {{ postagem.created_at }}</small></p>
            <p class="card-text">{{ postagem.conteudo }}</p>
            <!-- <p class="card-text"><small class="text-body-secondary">{{ postagem.usuario.name }}</small></p> -->
            <span>{{ postagem.like }} <i class='bx bx-like me-1'></i></span>
        </div>
        <div class="card-footer d-flex justify-around">
            <button @click.prevent="like(postagem)" class="d-flex justify-content-center align-items-center" :class="{ 'text-blue-600': publicacaoLike, 'disabled': publicacaoLike }"><i class='bx bx-like me-1'></i>Curtir</button>
            <!-- <i class='bx bx-like bx-tada bx-flip-horizontal' ></i>     Animação do botão de like -->
            <button @click.prevent="unlike(postagem)" class="d-flex justify-content-center align-items-center"><i class='bx bx-message-dots me-1'></i>Comentar</button>
        </div>
    </div>
</template>

<script>
import { Link } from '@inertiajs/vue3';

export default {
    name: 'Card',
    components: {
        Link
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
        like(postagem) {
            this.$inertia.post(route('postagens.like', postagem.id));
            this.publicacaoLike = true
            
            // atualiza a postagem para exibir o novo número de curtidas
            // this.$inertia.reload();
        },

        unlike(postagem) {
            this.$inertia.delete(route('postagens.unlike', postagem.id))
            this.publicacaoLike = false
        }
    }
}
</script>

<style>
#card-post {
    width: 650px;
}

</style>