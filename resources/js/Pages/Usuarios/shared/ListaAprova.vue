<template>
        <div>
            <div class="d-flex flex-column mb-3">
                <div class="d-flex flex-row">
                    <div class="input-group w-60 me-3">
                        <input type="text" v-model="buscaUsuario" @change="pesquisar" placeholder="Pesquisar usuário...">
                        <button class="btn btn-outline-secondary" type="button" id="button-pesquisar"><i class='bx bx-search'></i></button>
                    </div>
                    <Link :href="route('user.create')" as="button" class="btn rounded-pill btn-primary">
                        <span class="tf-icons bx bx-plus-circle"></span> Novo Usuário
                    </Link>
                </div>
                <p v-if="!msg" class="text-muted">Pesquise por: nome ou tipo</p>
                <div v-if="msg" class="row">
                    <div  class="col">
                        <p class="text-muted mb-3">{{ msg }}</p>
                        <button class="btn btn-secondary" @click.prevent="limparPesquisa">Limpar Pesquisa</button>
                    </div>
                </div>
            </div>

            <h1 class="fs-4">Lista de usuários aguardando aprovação</h1>

            <table class="table  table-striped table-hover table-responsive">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Curso</th>
                        <th scope="col">Ações</th>
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
                            <button as="button" class="btn btn-success me-3" @click.prevent="aprovarUsuario(usuario)"><i class='bx bx-check'></i></button>
                            <!-- <button type="button" class="btn btn-danger"><i class='bx bxs-trash'></i></button> -->
                            <button as="button" class="btn btn-danger" @click.prevent="negarUsuario(usuario)"><i class='bx bx-x' ></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
</template>

<script>
import { Link } from '@inertiajs/vue3';

export default {
    name: 'ListaAprova',
    data() {
        return {
            buscaUsuario: '',
        }
    },
    components: {
        Link
    },
    props: {
        usuarios: {
            type: Array,
        },
        msg: String
    },
    methods: {
        pesquisar() {
            if (this.buscaUsuario !== '') {
                this.$inertia.get(route('user.index', {
                    search: this.buscaUsuario
                }));
            } else {
                this.$inertia.get(route('user.index'));
            }
        },
        limparPesquisa() {
            this.$inertia.get(route('user.index'));
        },
        aprovarUsuario(usuario) {
            if (confirm('Deseja aprovar esse usuário?')) {
                this.$inertia.post(route('user.aprovado', usuario.id));
            } 
        },
        negarUsuario(usuario) {
            if (confirm('Deseja reprovar esse usuário?')) {
                this.$inertia.post(route('user.negado', usuario.id));
            } 
        },
    }
}
</script>