<template>
    <AdminLayout /> 

    <!-- <form class="position-relative form border border-light-subtle p-2 rounded" @submit.prevent="formSubmit" enctype="multipart/form-data">
            <div class="container-xl">
                <div class="form-floating mb-4 border border-0">
                    <input type="text" class="form-control shadow-sm bg-body-tertiary rounded" id="floatingInput" placeholder="Nome" v-model="form.nome">
                    <label for="titulo">Nome</label>
                    <MensagemErro :mensagem="form.errors.nome"/>
                </div>

                <div class="form-floating mb-4 border border-0">
                    <input type="email" class="form-control shadow-sm bg-body-tertiary rounded" id="floatingInput" placeholder="E-mail" v-model="form.email">
                    <label for="titulo">E-mail</label>
                    <MensagemErro :mensagem="form.errors.email"/>
                </div>

                <div class="form-floating mb-4 border border-0">
                    <input type="email" class="form-control shadow-sm bg-body-tertiary rounded" id="floatingInput" placeholder="Telefone" v-model="form.telefone">
                    <label for="titulo">Telefone</label>
                    <MensagemErro :mensagem="form.errors.telefone"/>
                </div>

                <div class="form-floating mb-4 border border-0">
                    <input type="password" class="form-control shadow-sm bg-body-tertiary rounded" id="floatingInput" placeholder="Senha" v-model="form.senha">
                    <label for="titulo">Senha</label>
                    <MensagemErro :mensagem="form.errors.senha"/>
                </div>

                <div class="form-floating mb-4 border border-0">
                    <input type="password" class="form-control shadow-sm bg-body-tertiary rounded" id="floatingInput" placeholder="Senha" v-model="form.senha">
                    <label for="titulo">Confirme sua senha</label>
                    <MensagemErro :mensagem="form.errors.senha"/>
                </div>

                <div class="col-12">
                    <button class="btn" type="submit" :disabled="form.processing">Enviar</button>
                </div>
            </div>
    </form> -->

    <form class="row g-3 needs-validation form border border-light-subtle p-2 rounded" novalidate @submit.prevent="formSubmit">
        <div class="col-md-4">
            <label for="Nome" class="form-label">Nome</label>
            <input type="text" class="form-control shadow-sm bg-body-tertiary rounded" id="floatingInput" placeholder="Digite seu nome" v-model="form.nome">
            <MensagemErro :mensagem="form.errors.nome"/>
            <div class="valid-feedback">
            Looks good!
            </div>
        </div>
        <div class="col-md-4">
            <label for="Sobrenome" class="form-label">Sobrenome</label>
            <input type="text" class="form-control shadow-sm bg-body-tertiary rounded" id="floatingInput" placeholder="Digite seu sobrenome" v-model="form.sobrenome">
            <div class="valid-feedback">
            Looks good!
            </div>
        </div>
        <div class="col-md-4">
            <label for="email" class="form-label">E-mail</label>
            <div class="input-group has-validation">
                <input type="email" class="form-control shadow-sm bg-body-tertiary rounded" id="floatingInput" placeholder="Agora seu e-mail" v-model="form.email">
                <div class="invalid-feedback">
                    Please choose a username.
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <label for="Cidade" class="form-label">Cidade</label>
            <input type="text" class="form-control shadow-sm bg-body-tertiary rounded" id="validationCustom03" v-model="form.cidade">
            <div class="invalid-feedback">
            Please provide a valid city.
            </div>
        </div>
        <div class="col-md-4">
            <label for="validationCustom04" class="form-label">Estado</label>
            <select class="form-select shadow-sm bg-body-tertiary rounded" id="validationCustom04">
                <option selected disabled value="">Selecione</option>
                <option>...</option>
            </select>
            <div class="invalid-feedback">
            Please select a valid state.
            </div>
        </div>
        <div class="col-md-4">
            <label for="validationCustom05" class="form-label">Telefone</label>
            <input type="text" class="form-control shadow-sm bg-body-tertiary rounded" id="validationCustom05" v-model="form.telefone" placeholder="Informe seu telefone">
            <div class="invalid-feedback">
            Please provide a valid zip.
            </div>
        </div>
        <div class="col-12">
            <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
            <label class="form-check-label" for="invalidCheck">
                Concordo com os termos de uso
            </label>
            <div class="invalid-feedback">
                Você deve concordar antes de prosseguir.
            </div>
            </div>
        </div>
        <div class="col-12">
            <button class="btn btn-primary" type="submit">Cadastrar</button>
        </div>
        </form>
</template>


<script>
import { reactive } from 'vue';
import { router } from '@inertiajs/vue3';
import { useForm } from '@inertiajs/vue3';
import AdminLayout from '@/Layouts/Admin.vue';
import MensagemErro from '@/Components/MensagemErro.vue';

export default {
    name: 'Home',
    data() {
        return {
        }
    },
    components: {
        AdminLayout,
        MensagemErro
    },
    methods: {
        formSubmit() {
            this.form
            .submit('post', route('postagens.store'), {
                _method: 'put',
            });
        },
    },
    setup () {
        const form = useForm({
            id: null,
            titulo: '',
            descricao: '',
            conteudo: '',
            imagem: []
        });

        return { form };
    }
}

</script>

<style>
.btn {
    background-color: #b20000;
    border: none;
    color: #fff;
}

.form {
    border: 1px solid blue;

    width: 50%;
    margin: auto;

    background-color: #f0f8ea;
}
</style>