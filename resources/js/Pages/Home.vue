<template>
    <div class="bg-gradient" id="container">
        <AdminLayout />
        <div class="container-fluid">
            
            <div class="row">
                <div  class="col-3">
                    <CardProfile v-if="usuarioLogado" :usuario="usuarioLogado || usuarioDefault" />
                </div>
                
                <div class="col-6">
                    <NewPost v-if="usuarioLogado" :usuario="usuarioLogado || usuarioDefault" />
                    <Card :postagens="postagens"/>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Navbar from '../Components/Navbar.vue';
import AdminLayout from '@/Layouts/Admin.vue';
import CardProfile from '@/Components/CardProfile.vue';
import Card from '@/Components/Card.vue';
import NewPost from '@/Components/Form/NewPost.vue';

export default {
    name: 'Home',
    components: {
        Navbar,
        AdminLayout,
        CardProfile,
        Card,
        NewPost
    },
    props: {
        postagens: Array,
        cursos: Array,
    },
    data () {
        return {
            usuarioLogado: this.$page.props.auth.user,
            usuarioDefault: {
                name: "Perfil",
                tipo: "Usuário",
                curso: "Etec Araçatuba",
                imagem: ''
            }
        }
    }
}
</script>

<style>
#container {
    background-color: rgb(236, 236, 236);
}
</style>