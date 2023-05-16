<template>
    <button @click.prevent="like(postagem)" :class="{ 'text-blue-800': postagem.usuario_logado_curtiu}" class="d-flex justify-content-center align-items-center"><i class='bx bx-like me-1'></i>Curtir</button>
</template>

<script>
    export default {
        name: "BotaoCurtida",
        data() {
            return {
                usuarioLogado: this.$page.props.auth.user,
                curtiu: false
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
            },
        },
    }
</script>