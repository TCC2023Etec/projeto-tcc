<template>
    <div>
        <div class="d-flex flex-column mb-3">
            <div class="d-flex flex-row">
                <div class="input-group w-60 me-3 ">
                    <input type="text" v-model="buscaUsuario" @change="pesquisar" placeholder="Pesquisar usuário...">
                    <button class="btn btn-outline-secondary" type="button" id="button-pesquisar"><i class='bx bx-search'></i></button>
                </div>
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
                    <th scope="col">Título</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Autor</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <tr v-for="postagem in postagens" :key="postagem.id">
                    <th scope="row">{{ postagem.id }}</th>
                    <td>
                        <Link :href="route('postagens.show.admin', postagem.id)">
                            {{ postagem.titulo }}
                        </Link>
                    </td>
                    <td>{{ postagem.descricao  }}</td>
                    <td>{{ postagem.usuario.name  }}</td>
                    <td>
                        <button as="button" class="btn btn-success me-3" @click.prevent="aprovarPostagem(postagem)"><i class='bx bx-check'></i></button>
                        <!-- <button type="button" class="btn btn-danger"><i class='bx bxs-trash'></i></button> -->
                        <button as="button" class="btn btn-danger" @click.prevent="negarPostagem(postagem)"><i class='bx bx-x' ></i></button>
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
    postagens: {
        type: Array,
    },
    msg: String
},
methods: {
    pesquisar() {
        if (this.buscaUsuario !== '') {
            this.$inertia.get(route('postagens.aprova', {
                search: this.buscaUsuario
            }));
        } else {
            this.$inertia.get(route('postagens.aprova'));
        }
    },
    limparPesquisa() {
        this.$inertia.get(route('postagens.aprova'));
    },
    aprovarPostagem(postagem) {
        if (confirm('Deseja aprovar essa postagem?')) {
            this.$inertia.post(route('postagens.aprovada', postagem.id));
        } 
    },
    negarPostagem(postagem) {
        if (confirm('Deseja reprovar essa postagem?')) {
            this.$inertia.post(route('postagens.negada', postagem.id));
        } 
    },
}
}
</script>