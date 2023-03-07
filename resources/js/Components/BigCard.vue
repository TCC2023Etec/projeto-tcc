<template>
      <div v-for="postagem in postagens" class="card mb-3" style="max-width: 540px;">
        <div class="row g-0">
          <div class="col-md-4">
            <Link :href="route('postagem.show', postagem.id)" class="nav-link">
              <img :src="`/img/${postagem.imagem}`" class="img-fluid rounded-start" alt="Postagem">
            </Link>
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title">{{ postagem.titulo }}</h5>
              <p class="card-text">{{ postagem.descricao }}</p>
              <p class="card-text"><small class="text-muted">{{ postagem.created_at }}</small></p>
            </div>
          </div>
        </div>
      </div>
</template>

<script>
import { Link } from '@inertiajs/vue3'

export default {
    name: "BigCard",
    components: {
      Link
    },
    props: {
      postagens: Object
    },
    
}

</script>

<style>
.nav-link {
  text-decoration: none;
  color: black;
}
</style>