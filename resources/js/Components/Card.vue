<template>
    <div>
        <div v-for="postagem in postagens" class="card mb-3 w-md-15 shadow-sm" id="card-post">
            <img v-if="postagem.imagem" :src="`/storage/postagem/${postagem.imagem}`" class="card-img-top img-fuild object-fit-fill" style="height: 250px" alt="Postagem">
            <div class="card-body d-flex flex-column">
                <div class="d-flex justify-content-between">
                    <h5 class="card-title fw-bold fs-4 mb-0">{{ postagem.titulo }}</h5>

                    <button v-if="usuarioLogado && usuarioLogado.tipo == 'administrador'" @click="destroy(postagem)"><i class='bx bx-trash'></i></button>
                </div>
                <p class="card-text mb-3"><small class="text-body-secondary">{{ postagem.usuario.name }} | {{ postagem.created_at }}</small></p>
                <!-- <p class="card-text">{{ postagem.conteudo }}</p> -->
                <div :class="{'visivel': !postagem.visivel}" class="card-text texto-conteudo" v-html="postagem.conteudo"></div>
                <button v-if="postagem.conteudo.length > 100 && !postagem.visivel" @click="mostrarTexto(postagem)" class="btn btn-link text-start p-0 text-decoration-none">Ver mais</button>
                <button v-if="postagem.conteudo.length > 100 && postagem.visivel" @click="esconderTexto(postagem)" class="btn btn-link text-start p-0 text-decoration-none">Ver menos</button>
                <span>{{ postagem.like }} <i class='bx bx-like me-1'></i></span>
                
            </div>
            <div class="card-footer d-flex justify-content-around">
                <BotaoCurtida :postagem="postagem"/>
                
                <!-- <i class='bx bx-like bx-tada bx-flip-horizontal' ></i>     Animação do botão de like -->
                <button class="d-flex justify-content-center align-items-center" @click="mostrarComentario(postagem.id)"><i class='bx bx-message-dots me-1'></i>Comentar</button>
        
                <!-- <button class="d-flex justify-content-center align-items-center"><i class='bx bxs-bookmark me-1'></i>Salvar</button> -->
                <BotaoFavorito :postagem="postagem"/>
            </div>
            <Comentario :postagem="postagem" :mostraComentario="mostraComentario === postagem.id" class="comentario-transition"/>
        </div>

        <div v-if="source === 'minhasPostagens' && postagens.length < 1" class="card mb-3 w-md-15 w-lg-15 shadow-sm teste">
            <p>
                Você ainda não possui publicações. <Link :href="route('postagens.store')" class="link-publi">Clique aqui</Link> para criar a primeira.
            </p>
        </div>

        <div v-if="source === 'favoritos' && postagens.length < 1" class="card mb-3 w-md-15 w-lg-15 shadow-sm teste">
            <p>
                Você ainda não tem publicações marcadas como favoritas.
            </p>
        </div>

        <div v-if="source === 'curtidos' && postagens.length < 1" class="card mb-3 w-md-15 w-lg-15 shadow-sm teste">
            <p>
                Você ainda não curtiu nenhuma publicação.
            </p>
        </div>
    </div>
</template>

<script>
import { Link } from '@inertiajs/vue3';
import BotaoCurtida from '@/Components/BotaoCurtida.vue';
import Comentario from '@/Components/Form/Comentario.vue';
import BotaoFavorito from '@/Components/BotaoFavorito.vue';

export default {
    name: 'Card',
    components: {
        Link,
        BotaoCurtida,
        Comentario,
        BotaoFavorito
    },
    data() {
        return {
            usuarioLogado: this.$page.props.auth.user,
            publicacaoLike: false,
            mostraComentario: null
        }
    },
    props: {
        postagens: Array,
        source: String,
    },
    methods: {
        mostrarTexto(postagem) {
            postagem.visivel = true;
        },
        esconderTexto(postagem) {
            postagem.visivel = false;
        },
        mostrarComentario(postagemId) {
            if (this.mostraComentario === postagemId) {
                this.mostraComentario = null; // Desmarca a postagem selecionada
            } else {
                this.mostraComentario = postagemId; // Marca a postagem selecionada
            }
        },
        destroy(postagem) {
            if (confirm('Deseja excluir essa postagem?')) {
                this.$inertia.delete(route('postagens.destroy', postagem.id), {}, {
                    preserveScroll: true,
                })
            }
        }
    }
}
</script>

<style>
/* #card-post {
    width: 650px;
} */

.visivel {
    white-space: pre-wrap;
    overflow: hidden;
    text-overflow: ellipsis;
    display: -webkit-box;
    -webkit-line-clamp: 5;
    -webkit-box-orient: vertical;
}

.texto-conteudo {
    white-space: pre-wrap;
    /* word-break: break; */
}

.teste {
    height: 70px;
    width: 650px;
    border: none;
    display: flex;
    align-items: center;
    justify-content: center;
}

.link-publi {
    color: blue;
}

@media (max-width: 910px) {
    #card-post {
        width: 100%;
    }
}
</style>