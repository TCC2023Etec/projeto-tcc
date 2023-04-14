<template>
    <div v-for="postagem in postagens" class="card mb-3 w-md-15 w-lg-15" id="card-post">
        <img :src="`storage/postagem/${postagem.imagem}`" class="card-img-top img-fuild object-fit-fill" style="height: 250px" alt="Postagem">
        <div class="card-body">
            <h5 class="card-title fw-bold fs-4">{{ postagem.titulo }}</h5>
            <p class="card-text">{{ postagem.descricao }}</p>
            <p class="card-text"><small class="text-body-secondary">{{ postagem.usuario.name }}</small></p>
            <p class="card-text"><small class="text-body-secondary">{{ postagem.created_at }}</small></p>
            <span>2</span>
        </div>
        <div class="card-footer d-flex justify-around">
            <button class="d-flex justify-content-center align-items-center"><i class='bx bx-like me-1'></i>Curtir</button>
            <!-- <i class='bx bx-like bx-tada bx-flip-horizontal' ></i>     Animação do botão de like -->
            <button class="d-flex justify-content-center align-items-center"><i class='bx bx-message-dots me-1'></i>Comentar</button>
        </div>
    </div>
</template>

<script>

export default {
    name: 'Card',
    props: {
        postagens: Array
    },
    methods: {
        
    }
}
</script>

<style>
#card-post {
    width: 650px;
}

</style>