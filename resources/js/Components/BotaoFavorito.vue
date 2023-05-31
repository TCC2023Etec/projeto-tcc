<template>
    <!-- <button @click.prevent="favorito(postagem)" :class="{ 'text-yellow-800': postagem.usuario_logado_favoritos}" class="d-flex justify-content-center align-items-center"><i class='bx bxs-like me-1' :style="{color: postagem.usuario_logado_favoritos ? 'yellow' : ''}"></i>Curtir</button> -->

    <button 
    @click.prevent="favorito(postagem)" 
    :class="{ 'text-yellow-500': postagem.usuario_logado_favoritos}" 
    class="d-flex justify-content-center align-items-center">
        <i class='bx bxs-star me-1' :class="{'btn-animacao': animacaoAtiva}" :style="{color: postagem.usuario_logado_favoritos ? 'yellow-500' : ''}"></i>
        Favorito
    </button>
</template>

<script>
    export default {
        name: "BotaoFavorito",
        data() {
            return {
                animacaoAtiva: false
            }
        },
        props: {
            postagem: Object,
        },
        methods: {
            favorito(postagem) {
                this.$inertia.post(route('postagens.favorito', postagem.id), {}, {
                    preserveScroll: true,
                })
                this.animacaoAtiva = true;
                setTimeout(() => {
                    this.animacaoAtiva = false;
                }, 2000);
            },
        }
    }
</script>

<style>
.btn-animacao {
    animation-name: rotacao-favorito;
    animation-duration: 2s;
    animation-timing-function: ease-in-out;
    animation-delay: 100ms;
}

@keyframes rotacao-favorito {
    0% {
        transform: scale(1);
    }

    50% {
        transform: scale(1.4);
    }

    100% {
        transform: scale(1);
    }
}
</style>