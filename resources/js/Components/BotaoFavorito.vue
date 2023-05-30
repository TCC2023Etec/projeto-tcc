<template>
    <!-- <button @click.prevent="favorito(postagem)" :class="{ 'text-yellow-800': postagem.usuario_logado_favoritos}" class="d-flex justify-content-center align-items-center"><i class='bx bxs-like me-1' :style="{color: postagem.usuario_logado_favoritos ? 'yellow' : ''}"></i>Curtir</button> -->

    <button @click.prevent="favorito(postagem)" :class="{ 'text-yellow-500': postagem.favoritos}" class="d-flex justify-content-center align-items-center">
        <i class='bx bxs-star me-1' :style="{color: postagem.favoritos ? 'yellow-500' : ''}"></i>
        Favorito
    </button>
</template>

<script>
    export default {
        name: "BotaoFavorito",
        data() {
            return {
                
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
            },
        }
    }
</script>