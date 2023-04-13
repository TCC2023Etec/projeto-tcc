<template>
    <Layout />

    <div class="container-fluid d-flex flex-column align-items-center vh-100">
        <header>
            <img :src="`/storage/postagem/${postagem.imagem}`" alt="Postagem">
            <h1>{{ postagem.titulo }}</h1>
        </header>

        <section>
            <p>{{ postagem.descricao }}</p>
        </section>

        <footer>
            <p>{{ postagem.conteudo }}</p>
        </footer>
    </div>
</template>

<script>
import Layout from '@/Layouts/Layout.vue';

export default {
    name: "Show",
    components: {
        Layout
    },
    props: {
        postagem: Object
    },
    data() {
        return {
            usuarioLogado: this.$page.props.auth.user
        }
    },
}
</script>

<style>
.container {
    border: 1px solid blue;

    
}
</style>