<template>
    <Layout>
        <div class="d-flex flex-row mb-3">
            <div class="input-group w-60 me-3">
                <input type="text" v-model="buscaCurso" @change="pesquisar" placeholder="Pesquisar cursos...">
                <button class="btn btn-outline-secondary" type="button" id="button-pesquisar"><i class='bx bx-search'></i></button>
            </div>
            <Link :href="route('user.create')" as="button" class="btn rounded-pill btn-primary">
                <span class="tf-icons bx bx-plus-circle"></span> Novo Usuário
            </Link>
        </div>
        <div class="row">
            <div v-if="msg" class="col">
                <p class="text-muted mb-3">{{ msg }}</p>
                <button class="btn btn-secondary" @click.prevent="limparPesquisa">Limpar Pesquisa</button>
            </div>
        </div>
        <table class="table  table-striped table-hover table-responsive">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Curso</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <tr v-for="usuario in usuarios" :key="usuario.id">
                    <th scope="row">{{ usuario.id }}</th>
                    <td>{{ usuario.name }}</td>
                    <td>{{ usuario.email  }}</td>
                    <td>{{ usuario.tipo  }}</td>
                    <td>{{ usuario.curso ? usuario.curso.nome : '-' }}</td>
                    <td>
                        <Link as="button" :href="route('user.edit', usuario.id)" class="btn btn-warning me-3"><i class='bx bx-edit-alt'></i></Link>
                        <!-- <button type="button" class="btn btn-danger"><i class='bx bxs-trash'></i></button> -->
                        <button as="button" class="btn btn-danger" @click.prevent="apagarUsuario(usuario)"><i class='bx bxs-trash'></i></button>
                    </td>
                </tr>
            </tbody>
        </table>
    </Layout>
</template>

<script>
import Layout from '@/Layouts/Layout.vue';
import { Link } from '@inertiajs/vue3';

export default {
    name: 'Index',
    data() {
        return {
            buscaCurso: '',
        }
    },
    components: {
        Layout,
        Link
    },
    props: {
        usuarios: {
            type: Object,
        },
        msg: String
    },
    methods: {
        apagarUsuario(usuario) {
            if(!confirm('Deseja apagar esse usuário?')) {
                this.$inertia.get(route('user.index'))
            } else {
                this.$inertia.delete(route('user.destroy', usuario.id))
            }
        },
        pesquisar() {
            if (this.buscaCurso !== '') {
                this.$inertia.get(route('cursos.index', {
                    search: this.buscaCurso
                }));
            } else {
                this.$inertia.get(route('cursos.index'));
            }
        },
        limparPesquisa() {
            this.$inertia.get(route('cursos.index'));
        }
    }
}
</script>