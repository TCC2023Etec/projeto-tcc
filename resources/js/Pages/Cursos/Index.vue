<template>
    <Layout>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <Link :href="route('cursos.create')" as="button" class="btn rounded-pill btn-primary">
                <span class="tf-icons bx bx-plus-circle"></span> Novo Curso
            </Link>
        </div>
        <table class="table  table-striped table-hover table-responsive">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Duração</th>
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
                        <button as="button" @click.prevent="apagarCurso(curso)"><i class='bx bxs-trash'></i></button>
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
    components: {
        Layout,
        Link
    },
    props: {
        cursos: {
            type: Array
        }
    },
    methods: {
        apagarCurso(curso) {
            if(!confirm('Deseja apagar esse curso?')) {
                this.$inertia.get(route('cursos.index'))
            } else {
                this.$inertia.delete(route('cursos.destroy', curso.id))
            }
        }
    },
}
</script>