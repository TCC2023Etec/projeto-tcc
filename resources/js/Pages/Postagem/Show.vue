<template>
    <AdminLayout />
    <!-- <Layout v-if="usuarioLogado.tipo == 'administrador' || usuarioLogado.tipo == 'professor'"/> -->

    <div class="container-fluid d-flex flex-column align-items-center vh-100">
        <header>
            <!-- <Carousel v-if="postagem.imagem.length > 1" :postagem="postagem"/> -->
            <img :src="`/storage/postagem/${postagem.imagem}`" alt="Postagem" class="img-fluid">
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
import AdminLayout from '@/Layouts/Admin.vue';
import Layout from '@/Layouts/Layout.vue';
import Carousel from '@/Components/Carousel.vue';

export default {
    name: "Show",
    components: {
        AdminLayout,
        Layout,
        Carousel
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