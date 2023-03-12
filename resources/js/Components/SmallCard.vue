<template>
    <div class="card me-1 mb-3" style="width: 18rem;">
        <Link :href="route('postagem.show', postagem.id)" class="nav-link">
            <img :src="`storage/postagem/${postagem.imagem}`" class="card-img-top img-fluid rounded mx-auto d-block" alt="Postagem">
            <div class="card-body">
                <h5 class="card-title">{{ postagem.titulo }}</h5>
                <p class="card-text">{{ postagem.descricao }}</p>            
            </div>
            <div class="card-footer text-muted">
                Criado em: {{ postagem.created_at }}
                <br>
                Postado por: {{ postagem.usuario.name }}
            </div>
        </Link>
    </div>
</template>

<script>
import { Link } from '@inertiajs/vue3'

export default {
    name: "SmallCard",
    components: {
        Link
    },
    props: {
        postagem: Object
    }
}

</script>