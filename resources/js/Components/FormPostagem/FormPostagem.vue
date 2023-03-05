<template>
    <Navbar />

    <form method="POST" class="position-relative form border border-light-subtle p-2 rounded" @submit="enviar">
            <div class="container-xxl">
                <div class="form-floating mb-3 border border-0">
                    <input type="textarea" class="form-control shadow-sm mb-5 bg-body-tertiary rounded" id="floatingInput" placeholder="Título" v-model="titulo">
                    <label for="titulo">Título</label>
                </div>
                <div class="form-floating mb-3">
                    <textarea type="textarea" class="form-control shadow-sm mb-5 bg-body-tertiary rounded" id="floatingInput" placeholder="Texto" style="height: 150px" v-model="descricao"></textarea>
                    <label for="descricao">Descrição</label>
                </div>
                <div class="mb-3 d-flex">
                    <label for="imagem" class="form-label me-3">Imagem</label>
                    <input class="form-control" type="file" id="formFileMultiple" multiple>
                </div>
                <div class="col-12">
                    <button class="btn" type="submit" @click.prevent="formSubmit">Enviar</button>
                </div>
            </div>
    </form>
</template>


<script>
import Navbar from '../../Components/Navbar.vue';
import { reactive } from 'vue'
import { router } from '@inertiajs/vue3'

export default {
    name: 'Home',
    data() {
        return {
            titulo: null,
            descricao: null,
            imagem: null
        }
    },
    components: {
        Navbar,
    },
    methods: {
        setup() {
            const form = reactive({
                id: null,
                titulo: '',
                descricao: '',
                imagem: null
            });

            return { form };
        },
        formSubmit() {
            // this.form
            // .submit('post', route('postagem.create'), {
            //     _method: 'put',
            //     forceFormData: true
            // });
            router.post('/nova-postagem', this.form);
        },
    },
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