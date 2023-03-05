<template>
    <div class="dropdown">
  <button class="btn btn-secondary btn-l dropdown-toggle border border-0 d-flex dropstart me-5" type="button" data-bs-toggle="dropdown" aria-expanded="false"><box-icon name='user'></box-icon>Leonardo Carvalho</button>
    <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="#">Perfil</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" :href="route('postagem.create')">Criar publicação</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="#">Sair</a></li>
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