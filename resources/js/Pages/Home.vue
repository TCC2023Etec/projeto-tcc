<template>
    <div class="bg-gradient" id="container">
        <AdminLayout />
        <div class="container-fluid">
            
            <div class="row d-flex flex-column flex-md-row">
                <div  class="col-sm-12 col-md-3">
                    <CardProfile v-if="usuarioLogado" :usuario="usuario" />
                </div>
                
                <div class="col-sm-12 col-md-6">
                    <NewPost v-if="usuarioLogado" :usuario="usuario" />
                    <Card :postagens="postagens" :source="source"/>
                </div>

                <div  class="col-sm-12 col-md-3">
                    <CardDestaque  :postagens="postagemDestaque"/>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Navbar from '../Components/Navbar.vue';
import AdminLayout from '@/Layouts/Admin.vue';
import CardProfile from '@/Components/CardProfile.vue';
import CardDestaque from '@/Components/CardDestaque.vue';
import Card from '@/Components/Card.vue';
import NewPost from '@/Components/Form/NewPost.vue';

export default {
    name: 'Home',
    components: {
        Navbar,
        AdminLayout,
        CardProfile,
        Card,
        NewPost,
        CardDestaque
    },
    props: {
        postagens: Array,
        postagemDestaque: Array,
        cursos: Array,
        source: String,
        usuario: Object
    },
    data () {
        return {
            usuarioLogado: this.$page.props.auth.user,
        }
    }
}
</script>

<style>
#container {
    background-color: rgb(236, 236, 236);
    min-height: 100vh;
}
</style>