<template>
    <Layout>
        <div>
            <h1 class="fs-4">Histórico de Postagens</h1>
            
            <table class="table  table-striped table-hover table-responsive">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Título</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Autor</th>
                        <th scope="col">Aprovado/Reprovado por</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <tr v-for="postagem in postagens" :key="postagem.id" :class="{ 'bg-green-200': postagem.situacao == 'aprovado', 'bg-red-200': postagem.situacao == 'reprovado' }" >
                        <th scope="row">{{ postagem.id }}</th>
                        <td>{{ postagem.titulo }}</td>
                        <td>{{ postagem.descricao }}</td>
                        <td>{{ postagem.usuario.name }}</td>
                        <td>{{ postagem.aprovador.name }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </Layout>
</template>

<script>
import { Link } from '@inertiajs/vue3';
import Layout from '@/Layouts/Layout.vue';

export default {
    name: 'Historico',
    data() {
        return {
            buscaUsuario: '',
        }
    },
    components: {
        Link,
        Layout
    },
    props: {
        postagens: {
            type: Array,
        },
        msg: String
    },
    methods: {
        
    },
    mounted() {
        console.log(this.postagens)
    }
}
</script>