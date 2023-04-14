<template>
    <form class="position-relative form border border-light-subtle p-2 rounded" @submit.prevent="formSubmit">
        <div class="container-xxl">
            <div class="row">
                <div class="mb-4 border-0 col-6">
                    <label for="Nome">Nome</label>
                    <input type="text" class="form-control shadow-sm bg-body-tertiary rounded" id="floatingInputNome" placeholder="Nome" v-model="form.name">
                    <MensagemErro :mensagem="form.errors.name"/>
                </div>
                
                <div class="mb-4 col-6">
                    <label for="descricao">E-mail</label>
                    <input type="text" class="form-control shadow-sm bg-body-tertiary rounded" id="floatingInputEmail" placeholder="E-mail" v-model="form.email" />
                    <MensagemErro :mensagem="form.errors.email"/>
                </div>
            </div>
            
            <div class="row">
                <div class="mb-4 col-6">
                    <label for="descricao">Senha</label>
                    <div class="input-group">
                        <input type="password" class="form-control shadow-sm bg-body-tertiary rounded senha" id="floatingInputSenha" placeholder="Senha" v-model="form.password" />
                        <button @click.prevent="mostrarSenha" id="btn-senha" class="input-group-text">
                            <i class='bx bx-show-alt'></i>
                        </button>
                    </div>
                    <MensagemErro :mensagem="form.errors.password"/>
                </div>
                
                <div class="mb-4 col-6">
                    <label for="descricao">Confirme a senha</label>
                    <div class="input-group">
                        <input type="password" class="form-control shadow-sm bg-body-tertiary rounded confirmaca_senha" id="floatingInputConfirmacaoSenha" placeholder="Confirme sua senha" v-model="form.password_confirmation" />
                        <button @click.prevent="mostrarConfirmacaoSenha" id="btn-confirmacao-senha" class="input-group-text">
                            <i class='bx bx-show-alt'></i>
                        </button>
                    </div>
                    <MensagemErro :mensagem="form.errors.password_confirmation"/>
                </div>
            </div>
            
            <div class="row">
                <div class="mb-4 col-6">
                    <label for="floatingSelect">Selecione o tipo de usuário</label>
                    <select class="form-select shadow-sm bg-body-tertiary rounded" id="floatingSelectTipo" aria-label="Floating label select example" v-model="form.tipo">
                        <option selected>Selecione o tipo de usuário</option>
                        <option value="administrador">Administrador</option>
                        <option value="professor">Professor</option>
                        <option value="moderador">Moderador</option>
                        <option value="aluno">Aluno</option>
                    </select>
                </div>
                
                <div v-if="form.tipo == 'aluno'" class="mb-4 col-6">
                    <label for="floatingSelect">Selecione o curso</label>
                    <select class="form-select shadow-sm bg-body-tertiary rounded" id="floatingSelectCurso" aria-label="Floating label select example" v-model="form.curso">
                        <option selected>Selecione seu curso</option>
                        <option v-for="curso in cursos" :key="curso.id" :value="curso.id">
                            {{ curso.nome }}
                        </option>
                    </select>
                </div>
            </div>

            <div class="mb-3 d-flex flex-column justify-content-start shadow-sm bg-body-tertiary rounded p-2">
                    <label for="imagem" class="form-label me-3">Foto de Perfil</label>
                    <input class="form-control" type="file" id="formFileMultiple" multiple @input="form.imagem = $event.target.files[0]">
                    <MensagemErro :mensagem="form.errors.imagem" />
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
        },
        mostrarSenha() {
            var senhaInput = document.querySelector('.senha');
            var icone = document.querySelector('#btn-senha i');

            if (senhaInput.type === "password") {
                senhaInput.type = "text";
                // btn.textContent = "Esconder senha";
                icone.classList.remove('bx-show-alt');
                icone.classList.add('bx-hide')
            } else {
                senhaInput.type = "password";
                // btn.textContent = "Mostrar senha";
                icone.classList.remove('bx-hide');
                icone.classList.add('bx-show-alt')
            }
        },
        mostrarConfirmacaoSenha() {
            var senhaInput = document.querySelector('.confirmaca_senha');
            var icone = document.querySelector('#btn-confirmacao-senha i');

            if (senhaInput.type === "password") {
                senhaInput.type = "text";
                // btn.textContent = "Esconder senha";
                icone.classList.remove('bx-show-alt');
                icone.classList.add('bx-hide')
            } else {
                senhaInput.type = "password";
                // btn.textContent = "Mostrar senha";
                icone.classList.remove('bx-hide');
                icone.classList.add('bx-show-alt')
            }
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
            curso: '',
            imagem: ''
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