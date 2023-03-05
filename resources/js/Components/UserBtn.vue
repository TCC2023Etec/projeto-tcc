<template>
    <div class="dropdown">
  <button class="btn btn-secondary btn-l dropdown-toggle border border-0 d-flex dropstart me-5" type="button" data-bs-toggle="dropdown" aria-expanded="false">
    <i class='bx bx-user'></i>
    Leonardo Carvalho
    </button>
    
    <ul class="dropdown-menu">
        <li><Link class="dropdown-item" href="#">Perfil</Link></li>
        <li><hr class="dropdown-divider"></li>
        <li><Link class="dropdown-item" :href="route('postagem.create')">Criar publicação</Link></li>
        <li><hr class="dropdown-divider"></li>
        <li><Link class="dropdown-item" href="#">Sair</Link></li>
    </ul>
    </div>
</template>

<script>
import { Link } from '@inertiajs/vue3';

export default {
    name: "UserBtn",
    components: {
        Link
    }
}
</script>

<style>
.img {
    height: 45px;
    width: 25%;

    max-height: 30%;
    max-width: 30%;
}
</style>