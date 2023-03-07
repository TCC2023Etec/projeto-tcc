<template>
    <AdminLayout />

    <div class="container-fluid">
        <header>
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

export default {
    name: "Show",
    components: {
        AdminLayout
    },
    props: {
        postagem: Object
    }
}
</script>

<style>
.container {
    border: 1px solid blue;

    
}
</style>