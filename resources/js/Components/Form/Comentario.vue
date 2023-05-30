<template>
    <div class="bg-light rounded-3 shadow px-3" :class="{'hidden': !mostraComentario}">
        <!-- divider line -->
        <form @submit.prevent="formSubmit" class="border-0">
            <div class="mb-3">
                <input v-model="form.descricao" type="text" class="form-control rounded-lg" id="recipient-name" placeholder="Digite seu comentário" />
                <MensagemErro :mensagem="form.errors.descricao" />
                <button type="submit" class="btn btn-primary bg-primary mt-2" :disabled="form.processing">Comentar</button>
            </div>
        </form>
    </div>
</template>

<script>
import { useForm } from '@inertiajs/vue3';
import MensagemErro from '@/Components/MensagemErro.vue';

export default {
    name: 'Comentario',
    components: {
        MensagemErro
    },
    props: {
        postagem: Object,
        mostraComentario: Boolean
    },
    data() {
        return {
            // mostraComentario: false
        }
    },
    methods: {
        formSubmit() {
            this.form
            .submit('post', route('comentarios.store', this.postagem.id), {
                _method: 'post',
                preserveScroll: true,
                onSuccess: () => {
                    this.form.reset();
                }
            });
        },
    },
    setup () {
        const form = useForm({
            id: null,
            descricao: '',
        });
        
        return { form };
    }
}

</script>