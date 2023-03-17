<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
    terms: false,
    tipo: '',
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};

const mostrarSenha = () => {
    var senhaInput = document.querySelector('.senha');
    var btn = document.querySelector('#btn-senha');
    var icone = document.querySelector('#btn-senha i');

    if (senhaInput.type === "password") {
        senhaInput.type = "text";
        // btn.textContent = "Esconder senha";
        icone.classList.remove('bx-show-alt');
        icone.classList.add('bxs-hide')
    } else {
        senhaInput.type = "password";
        // btn.textContent = "Mostrar senha";
        icone.classList.remove('bxs-hide');
        icone.classList.add('bx-show-alt')
    }
}

const mostrarConfirmacaoSenha = () => {
    var senhaInput = document.querySelector('.confirmaca_senha');
    var btn = document.querySelector('#btn-confirmacao-senha');
    var icone = document.querySelector('#btn-confirmacao-senha i');

    if (senhaInput.type === "password") {
        senhaInput.type = "text";
        // btn.textContent = "Esconder senha";
        icone.classList
    } else {
        senhaInput.type = "password";
        // btn.textContent = "Mostrar senha";
    }
}
</script>

<template>
    <GuestLayout>
        <Head title="Register" />

        <form @submit.prevent="submit">
            <div>
                <InputLabel for="name" value="Nome" />

                <TextInput
                    id="name"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.name"
                    required
                    autofocus
                    autocomplete="name"
                    placeholder="Digite seu nome"
                />

                <InputError class="mt-2" :message="form.errors.name" />
            </div>

            <div class="mt-4">
                <InputLabel for="email" value="E-mail" />

                <TextInput
                    id="email"
                    type="email"
                    class="mt-1 block w-full"
                    v-model="form.email"
                    required
                    autocomplete="username"
                    placeholder="Digite seu e-mail"
                />

                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <div class="mt-4">
                <InputLabel for="password" value="Senha" />

                <!-- <TextInput
                    id="password"
                    type="password"
                    class="mt-1 block w-full senha"
                    v-model="form.password"
                    required
                    autocomplete="new-password"
                />
                <button @click.prevent="mostrarSenha" id="btn-senha">
                    <i class='bx bx-show-alt'></i>
                </button> -->

                <div class="input-group mb-3">
                    <input type="text" class="form-control senha" placeholder="Digite sua senha" aria-label="Recipient's username" aria-describedby="basic-addon2" v-model="form.password">
                    <button @click.prevent="mostrarSenha" id="btn-senha" class="input-group-text">
                        <i class='bx bx-show-alt'></i>
                    </button>
                </div>

                <InputError class="mt-2" :message="form.errors.password" />
            </div>

            <div class="mt-4">
                <InputLabel for="password_confirmation" value="Confirmação da senha" />

                <!-- <TextInput
                    id="password_confirmation"
                    type="password"
                    class="mt-1 block w-full confirmaca_senha"
                    v-model="form.password_confirmation"
                    required
                    autocomplete="new-password"
                />
                <button @click.prevent="mostrarConfirmacaoSenha" id="btn-confirmacao-senha">Mostrar senha</button> -->

                <div class="input-group mb-3">
                    <input type="text" class="form-control confirmaca_senha" placeholder="Confirme sua senha" aria-label="Recipient's username" aria-describedby="basic-addon2" v-model="form.password_confirmation">
                    <button @click.prevent="mostrarConfirmacaoSenha" id="btn-confirmacao-senha" class="input-group-text">
                        <i class='bx bx-show-alt'></i>
                    </button>
                </div>

                <InputError class="mt-2" :message="form.errors.password_confirmation" />
            </div>

            <InputLabel for="password_confirmation" value="Tipo" class="mt-4"/>
            <select class="form-select border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" aria-label="Default select example" v-model="form.tipo">
                <option selected>Selecione o tipo de cadastro</option>
                <option value="aluno">Aluno</option>
                <option value="professor">Professor</option>
            </select>

            <div class="flex items-center justify-end mt-4">
                <Link
                    :href="route('login')"
                    class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                >
                    Já possui cadastro?
                </Link>

                <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Cadastrar
                </PrimaryButton>
            </div>
        </form>
    </GuestLayout>
</template>
