<template>
    <form class="position-relative form border border-light-subtle p-2 rounded" @submit.prevent="formSubmit">
        <div class="container-xxl">
            <div class="row">
                <div class="mb-4 border border-0 col-6">
                    <label for="Nome">Nome</label>
                    <input type="text" class="form-control shadow-sm bg-body-tertiary rounded" id="floatingInput" placeholder="Nome" v-model="form.name">
                    <MensagemErro :mensagem="form.errors.name"/>
                </div>
                
                <div class="mb-4 col-6">
                    <label for="descricao">E-mail</label>
                    <input type="text" class="form-control shadow-sm bg-body-tertiary rounded" id="floatingInput" placeholder="E-mail" v-model="form.email" />
                    <MensagemErro :mensagem="form.errors.email"/>
                </div>
            </div>
            
            <div class="row">
                <div class="mb-4 col-6">
                    <label for="descricao">Senha</label>
                    <input type="password" class="form-control shadow-sm bg-body-tertiary rounded" id="floatingInput" placeholder="Senha" v-model="form.password" />
                    <MensagemErro :mensagem="form.errors.password"/>
                </div>
                
                <div class="mb-4 col-6">
                    <label for="descricao">Confirme a senha</label>
                    <input type="password" class="form-control shadow-sm bg-body-tertiary rounded" id="floatingInput" placeholder="Confirme sua senha" v-model="form.password_confirmation" />
                    <MensagemErro :mensagem="form.errors.password_confirmation"/>
                </div>
            </div>
            
            <div class="row">
                <div class="mb-4 col-6">
                    <label for="floatingSelect">Selecione o tipo de usuário</label>
                    <select class="form-select shadow-sm bg-body-tertiary rounded" id="floatingSelect" aria-label="Floating label select example" v-model="form.tipo">
                        <option selected>Selecione o tipo de usuário</option>
                        <option value="administrador">Administrador</option>
                        <option value="professor">Professor</option>
                        <option value="aluno">Aluno</option>
                    </select>
                </div>
                
                <div v-if="form.tipo == 'aluno'" class="mb-4 col-6">
                    <label for="floatingSelect">Selecione o curso</label>
                    <select class="form-select shadow-sm bg-body-tertiary rounded" id="floatingSelect" aria-label="Floating label select example" v-model="form.curso">
                        <option selected>Selecione seu curso</option>
                        <option v-for="curso in cursos" :key="curso.id" :value="curso.id">
                            {{ curso.nome }}
                        </option>
                    </select>
                </div>
            </div>
            
            <div class="col-12">
                <button class="btn btn-primary bg-primary" type="submit" :disabled="form.processing">Salvar</button>
                <button class="btn btn-danger ms-3" @click.prevent="cancelar" :disabled="form.processing">Cancelar</button>
            </div>
        </div>
    </form>
</template>


<script>
import { useForm } from '@inertiajs/vue3';
import MensagemErro from '@/Components/MensagemErro.vue';

export default {
    name: 'FormUsuario',
    data() {
        return {
        }
    },
    props: {
        usuario: Object,
        rota: String,
        cursos: Array
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
        cancelar() {
            this.$inertia.get(route('user.index'));
        }
    },
    setup (props) {
        const form = useForm({
            id: null,
            name: '',
            email: '',
            password: '',
            password_confirmation: '',
            terms: false,
            tipo: '',
            curso: null,
        });

        form.id = props.usuario.id ?? null;
        form.name = props.usuario.name ?? '';
        form.email = props.usuario.email ?? '';
        form.password = props.usuario.password ?? '';
        form.tipo = props.usuario.tipo ?? '';
        form.curso = props.usuario.curso ?? '';
        
        return { form };
    }
}

</script>

<style>
/* .btn {
    background-color: #b20000;
    border: none;
    color: #fff;
} */

.form {
    border: 1px solid blue;
    
    width: 90%;
    margin: auto;
    
    background-color: #f0f8ea;
}
</style>