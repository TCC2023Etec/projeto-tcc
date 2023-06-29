<template>
    <div class="bg-gradient" id="container">
        <AdminLayout />
        <div class="container-fluid">
            <div class="row d-flex flex-row flex-sm-column flex-md-row">
                <div class="col-3">
                    <CardProfile v-if="usuarioLogado" :usuario="usuario" />
                </div>
                
                <div class="col-6 d-flex flex-column align-items-start gap-4">
                    <img :src="`/storage/postagem/${postagem.imagem}`" alt="Postagem" class="img-fluid">
                    <div>
                        <h1 class="fw-bold fs-1">{{ postagem.titulo }}</h1>
                        <p>{{ postagem.usuario.name }}</p>
                    </div>
                    <div class="descricao">
                        <p>{{ postagem.descricao }}</p>
                    </div>
                    
                    <div class="rodape">
                        <p class="fs-5">{{ postagem.conteudo }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import AdminLayout from '@/Layouts/Admin.vue';
import Layout from '@/Layouts/Layout.vue';
import Carousel from '@/Components/Carousel.vue';
import CardProfile from '@/Components/CardProfile.vue';

export default {
    name: "Show",
    components: {
        AdminLayout,
        Layout,
        Carousel,
        CardProfile
    },
    props: {
        postagem: Object,
        usuario: Object
    },
    data() {
        return {
            usuarioLogado: this.$page.props.auth.user
        }
    },
}
</script>

<style>
.cabecalho {
    width: 100%;
    height: 60%;
}

.cabecalho img {
    width: 100%;
    height: 70%;
}

.cabecalho h1 {
    margin: 0;
}

.rodape {
    white-space: pre-wrap;
}
</style>