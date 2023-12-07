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

        <!-- Comentários -->
        <div class="comentarios">
            <div v-for="comentario in postagem.comentarios" class="d-flex flex-row justify-content-between card mb-3 p-2 comentario-card">
                <div class="d-flex flex-row">
                    <div class="comentario-img cursor-pointer w-10 h-12 bg-gray-300 flex aling-items-center justify-content-center rounded-5 me-3">
                        <img v-if="comentario.usuario.imagem" :src="`storage/users/${usuario.imagem}`" alt="Perfil" class="rounded-5">
                        <img v-else src="../../../../public/img/perfil.png" alt="Perfil" class="rounded-5">
                    </div>
                    <div class="comentario-descricao">
                        <h4 class="fw-bold">{{ comentario.usuario.name }}</h4>
                        <span class="text-muted">{{ comentario.created_at }}</span>
                        <p>{{ comentario.descricao }}</p>
                    </div>
                </div>

                <div>
                    <button v-if="usuarioLogado && usuarioLogado.tipo == 'administrador'" @click="destroy(comentario)"><i class='bx bx-trash'></i></button>
                </div>
            </div>
        </div>
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
            usuarioLogado: this.$page.props.auth.user,
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
        
        destroy(comentario) {
            if (confirm('Deseja excluir esse comentário?')) {
                this.$inertia.delete(route('comentarios.destroy', comentario.id), {}, {
                    preserveScroll: true,
                })
            }
        }
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

<style>
.comentario-card img {
    min-width: 50px;
}
</style>