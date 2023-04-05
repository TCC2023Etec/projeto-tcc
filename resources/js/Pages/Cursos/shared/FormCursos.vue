<template>
    <form class="position-relative form border border-light-subtle p-2 rounded" @submit.prevent="formSubmit" enctype="multipart/form-data">
            <div class="container-xxl">
                <div class="form-floating mb-4 border border-0">
                    <input type="text" class="form-control shadow-sm bg-body-tertiary rounded" id="floatingInput" placeholder="Título" v-model="form.nome">
                    <label for="titulo">Nome</label>
                    <MensagemErro :mensagem="form.errors.nome"/>
                </div>

                <div class="form-floating mb-4">
                    <input type="number" class="form-control shadow-sm bg-body-tertiary rounded" id="floatingInput" placeholder="Duração (em semetres)" v-model="form.duracao">
                    <label for="descricao">Duração (em semetres)</label>
                    <MensagemErro :mensagem="form.errors.duracao"/>
                </div>

                <div class="col-12">
                    <button class="btn btn-primary" type="submit" :disabled="form.processing">Salvar</button>
                    <button class="btn btn-danger ms-3" @click.prevent="cancelar" :disabled="form.processing">Cancelar</button>
                </div>
            </div>
    </form>
</template>


<script>
import { useForm } from '@inertiajs/vue3';
import AdminLayout from '@/Layouts/Admin.vue';
import MensagemErro from '@/Components/MensagemErro.vue';

export default {
    name: 'FormCursos',
    data() {
        return {
        }
    },
    props: {
        curso: Object,
        rota: String,
        metodo: String
    },
    components: {
        AdminLayout,
        MensagemErro
    },
    methods: {
        formSubmit() {
            this.form
            .submit('post', this.rota, {
                _method: 'put',
            });
        },
        cancelar() {
            this.$inertia.get(route('cursos.index'));
        }
    },
    setup () {
        const form = useForm({
            id: null,
            nome: '',
            duracao: ''
        });

        return { form };
    },
    mounted() {
        this.form.id = this.curso.id ?? null;
        this.form.nome = this.curso.nome ?? '';
        this.form.duracao = this.curso.duracao ?? '';
    }
}

</script>

<style>
.form {
    border: 1px solid red;

    width: 90%;
    margin: auto;

    background-color: #f0f8ea;
}
</style>