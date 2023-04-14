<template>
    <div>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary bg-primary rounded-pill" data-bs-toggle="modal" data-bs-target="#modalFormCursos">
            <span class="tf-icons bx bx-plus-circle"></span>Novo curso
        </button>
        
        <!-- Modal -->
        <div class="modal fade" id="modalFormCursos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Novo Curso</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" data-bs-toggle="modal" data-bs-target="#modalFormCursos"></button>
                    </div>
                    <div class="modal-body">
                        <form class="position-relative form border border-light-subtle p-2 rounded" @submit.prevent="formSubmit" enctype="multipart/form-data">
                            <div class="container-xxl">
                                <div class="form-floating mb-4 border">
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
                                    <button class="btn btn-primary bg-primary" data-bs-dismiss="modal" type="submit" :disabled="form.processing">Salvar</button>
                                    <button type="button" class="btn btn-danger bg-danger ms-3" data-bs-dismiss="modal" :disabled="form.processing">Cancelar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</template>

<script>
import { useForm } from '@inertiajs/vue3';
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
    },
    components: {
        MensagemErro
    },
    methods: {
        formSubmit() {
            this.form
            .submit('post', this.rota, {
                _method: 'put',
            });
        },
    },
    setup (props) {
        const form = useForm({
            id: null,
            nome: '',
            duracao: ''
        });

        form.id = props.curso.id ?? null;
        form.nome = props.curso.nome ?? '';
        form.duracao = props.curso.duracao ?? '';

        return { form };
    }
}
</script>