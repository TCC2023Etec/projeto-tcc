<template>
    <button 
        @click.prevent="like(postagem)" 
        :class="{ 'text-blue-800': postagem.usuario_logado_curtiu}" 
        class="d-flex justify-content-center align-items-center"
        >
        <i class='bx bxs-like me-1' :class="{'btn-animacao': animacaoAtiva}" :style="{color: postagem.usuario_logado_curtiu ? 'blue' : ''}"></i>
        Curtir
    </button>
</template>

<script>
    export default {
        name: "BotaoCurtida",
        data() {
            return {
                usuarioLogado: this.$page.props.auth.user,
                curtiu: false,
                animacaoAtiva: false
            }
        },
        props: {
            postagem: Object,
        },
        methods: {
            like(postagem) {
                this.$inertia.post(route('postagens.like', postagem.id), {}, {
                    preserveScroll: true,
                })
                this.animacaoAtiva = true;
                setTimeout(() => {
                    this.animacaoAtiva = false;
                }, 2000);
            }
        },
    }
</script>

<style>
.btn-animacao {
    animation-name: rotacao-curtida;
    animation-duration: 2s;
    animation-timing-function: ease-in-out;
    animation-delay: 100ms;
}

@keyframes rotacao-curtida {
    0% {
        transform: rotate(0);
    }
    25% {
        transform: rotate(-45deg);
    }
    50% {
        transform: rotate(0);
    }
    /* 75% {
        transform: rotate(45deg);
    }
    100% {
        transform: rotate(0);
    } */
}
</style>