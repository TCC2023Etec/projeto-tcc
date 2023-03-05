<template>
    <AdminLayout />

    <form class="position-relative form border border-light-subtle p-2 rounded" @submit.prevent="formSubmit">
            <div class="container-xxl">
                <div class="form-floating mb-4 border border-0">
                    <input type="textarea" class="form-control shadow-sm bg-body-tertiary rounded" id="floatingInput" placeholder="Título" v-model="form.titulo">
                    <label for="titulo">Título</label>
                    <MensagemErro :mensagem="form.errors.titulo"/>
                </div>
                <div class="form-floating mb-4">
                    <textarea type="textarea" class="form-control shadow-sm bg-body-tertiary rounded" id="floatingInput" placeholder="Texto" style="height: 150px" v-model="form.descricao"></textarea>
                    <label for="descricao">Descrição</label>
                    <MensagemErro :mensagem="form.errors.descricao"/>
                </div>
                <!-- <div class="mb-3 d-flex">
                    <label for="imagem" class="form-label me-3">Imagem</label>
                    <input class="form-control" type="file" id="formFileMultiple" multiple>
                </div> -->
                <div class="col-12">
                    <button class="btn" type="submit" :disabled="form.processing">Enviar</button>
                </div>
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
            .submit('post', route('postagem.create'), {
                _method: 'put',
            });
            // router.post('/nova-postagem', this.form);
        },
    },
    setup () {
            const form = useForm({
                id: null,
                titulo: '',
                descricao: '',
                // imagem: ''
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

    width: 90%;
    margin: auto;

    background-color: #f0f8ea;
}
</style>