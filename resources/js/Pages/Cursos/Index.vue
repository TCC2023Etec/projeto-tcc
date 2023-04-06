<template>
    <Layout>
        <div class="d-flex flex-row mb-3">
            <div class="input-group w-60 me-3">
                <input type="text" v-model="buscaCurso" @change="pesquisar" placeholder="Pesquisar cursos...">
                <button class="btn btn-outline-secondary" type="button" id="button-pesquisar"><i class='bx bx-search'></i></button>
            </div>
            <!-- <Link :href="route('cursos.create')" as="button" class="btn rounded-pill btn-primary">
                <span class="tf-icons bx bx-plus-circle"></span> Novo Curso
            </Link> -->
            <modalFormCursos :rota="rota" :curso="curso"/>
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
                    <th scope="col">Duração (semestres)</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <tr v-for="curso in cursos" :key="curso.id">
                    <th scope="row">{{ curso.id }}</th>
                    <td>{{ curso.nome }}</td>
                    <td>{{ curso.duracao  }}</td>
                    <td>
                        <Link as="button" :href="route('cursos.edit', curso.id)" class="btn btn-warning me-3"><i class='bx bx-edit-alt'></i></Link>
                        <!-- <button type="button" class="btn btn-danger"><i class='bx bxs-trash'></i></button> -->
                        <button as="button" class="btn btn-danger" @click.prevent="apagarCurso(curso)"><i class='bx bxs-trash'></i></button>
                    </td>
                </tr>
            </tbody>
        </table>
    </Layout>
</template>

<script>
import Layout from '@/Layouts/Layout.vue';
import { Link } from '@inertiajs/vue3';
import modalFormCursos from './shared/ModalFormCursos.vue';

export default {
    name: 'Index',
    data() {
        return {
            buscaCurso: '',
            rota: route('cursos.store'),
            curso: {
                id: null,
                nome: '',
                duracao: ''
            }
        }
    },
    components: {
        Layout,
        Link,
        modalFormCursos
    },
    props: {
        cursos: {
            type: Array
        },
        msg: String
    },
    methods: {
        apagarCurso(curso) {
            if(!confirm('Deseja apagar esse curso?')) {
                this.$inertia.get(route('cursos.index'))
            } else {
                this.$inertia.delete(route('cursos.destroy', curso.id))
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
    },
}
</script>