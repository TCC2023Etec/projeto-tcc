<template>
    <div v-for="postagem in postagens" class="card mb-3 w-md-15 w-lg-15" id="card-post">
        <img :src="`storage/postagem/${postagem.imagem}`" class="card-img-top img-fuild object-fit-fill" style="height: 250px" alt="Postagem">
        <div class="card-body">
            <h5 class="card-title fw-bold fs-4">{{ postagem.titulo }}</h5>
            <p class="card-text">{{ postagem.descricao }}</p>
            <p class="card-text"><small class="text-body-secondary">{{ postagem.usuario.name }}</small></p>
            <p class="card-text"><small class="text-body-secondary">{{ postagem.created_at }}</small></p>
            <span>{{ postagem.like }} <i class='bx bx-like me-1'></i></span>
        </div>
        <div class="card-footer d-flex justify-around">
            <button @click.prevent="like(postagem)" class="d-flex justify-content-center align-items-center"><i class='bx bx-like me-1'></i>Curtir</button>
            <!-- <i class='bx bx-like bx-tada bx-flip-horizontal' ></i>     Animação do botão de like -->
            <button @click.prevent="unlike(postagem)" class="d-flex justify-content-center align-items-center"><i class='bx bx-message-dots me-1'></i>Comentar</button>
        </div>
    </div>
</template>

<script>

export default {
    name: 'Card',
    data() {
        return {
            usuarioLogado: this.$page.props.auth.user
        }
    },
    props: {
        postagens: Array
    },
    methods: {
        // like(postagem) {
        //     this.$inertia.put(route('postagens.like', postagem.id)).then(() => {
        //     postagem.liked = true;
        //     this.$inertia.visit(this.$inertia.page().url);
        // });
        //     // {
        //     //     preserveScroll: true,
        //     //     onSuccess: () => {
        //     //         this.$inertia.reload()
        //     //     }
                
        //     // }
        // },

        like(postagem) {
            this.$inertia.post(route('postagens.like', postagem.id));
            
            // atualiza a postagem para exibir o novo número de curtidas
            this.$inertia.reload();
        },

        unlike(postagem) {
            this.$inertia.post(route('postagens.unlike', postagem.id))
            // postagem.liked = false;
            // this.$inertia.visit(this.$inertia.page().url);
            , {
                preserveScroll: true
            }
        }
    }
}
</script>

<style>
#card-post {
    width: 650px;
}

</style>