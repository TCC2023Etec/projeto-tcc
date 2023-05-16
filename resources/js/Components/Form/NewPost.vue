<template>
    <div class="bg-light rounded-3 shadow p-6 mb-8 d-flex justify-content-around" style="width: 650px;">
        <!-- profile pic -->
        <div class="cursor-pointer w-10 h-12 bg-gray-300 flex aling-items-center justify-content-center rounded-5 me-3">
            <img v-if="usuario.imagem" :src="`storage/users/${usuario.imagem}`" alt="Perfil" class="rounded-5">
            <img v-else src="../../../../public/img/perfil.png" alt="Perfil" class="rounded-5">
        </div>
        
        <!-- Form post -->
        <div class="flex-1">
            <button 
            class="bg-gray-200 focus:shadow-outline hover:bg-gray-100 border border-transparent rounded-lg py-2 px-4 block appearance-none font-light resize-none w-full cursor-pointer h-full text-start"
            data-bs-toggle="modal" data-bs-target="#postModal"
            >
            Qual será sua próxima publicação?
        </button>
        
        <!-- divider line -->
        <div class="w-auto border rounded-lg mt-1"></div>
        
        <!-- Modal -->
        <div class="modal fade" id="postModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Nova publicação</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form @submit.prevent="formSubmit" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Título:</label>
                                <textarea v-model="form.titulo" class="form-control rounded-2 resize-none" id="recipient-name" rows="1" placeholder="Digite o título da publicação"></textarea>
                                <MensagemErro :mensagem="form.errors.titulo" />
                            </div>
                            
                            <div class="mb-3">
                                <label for="message-text" class="col-form-label">Descrição:</label>
                                <textarea v-model="form.descricao" class="form-control resize-none" id="message-text"></textarea>
                                <MensagemErro :mensagem="form.errors.descricao" />
                            </div>
                            
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Conteúdo:</label>
                                <textarea v-model="form.conteudo" class="form-control rounded-2 resize-none" id="recipient-name" rows="10" placeholder="Digite o conteúdo da sua publicação"></textarea>
                                <MensagemErro :mensagem="form.errors.conteudo" />
                            </div>
                            
                            <div class="mb-3 d-flex flex-column justify-content-start shadow-sm bg-body-tertiary rounded p-2">
                                <label for="imagem" class="form-label me-3">Imagem</label>
                                <input class="form-control" type="file" id="formFileMultiple" multiple @input="form.imagem = $event.target.files[0]">
                                <MensagemErro :mensagem="form.errors.imagem" />
                            </div>
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger bg-danger" data-bs-dismiss="modal" @click.prevent="limpar">Cancelar</button>
                            <button type="submit" class="btn btn-primary bg-primary" :disabled="form.processing">Publicar</button>
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
    name: 'NewPost',
    components: {
        MensagemErro
    },
    data() {
        return {
            
        }
    },
    watch: {
        
    },
    props: {
        usuario: Object
    },
    methods: {
        formSubmit() {
            this.form
            .submit('post', route('postagens.store'), {
                _method: 'put',
                onSuccess: () => {
                    this.form.reset();
                }
            });
        },
        limpar() {
            this.form.reset();
            this.form.titulo = '';
            this.form.descricao = '';
            this.form.conteudo = '';
            this.form.imagem = [];
        }
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