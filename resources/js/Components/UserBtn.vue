<template>
    <nav v-if="!$page.props.auth.user" class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <Link class="navbar-brand texto" :href="route('login')">Login</Link>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>

        <Link class="navbar-brand texto" :href="route('register')">Cadastrar</Link>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
    </div>
    </nav>
    
    <!-- Dropsdown para alunos -->
    <div v-if="usuarioLogado && usuarioLogado.tipo == 'aluno'" class="dropdown">
        <button class="btn btn-secondary btn-l dropdown-toggle border-0 dropstart me-5 texto" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        <i class='bx bx-user'></i>
        {{ usuarioLogado.name }}
        </button>
        <ul class="dropdown-menu dropdown-menu-right">
            <li><Link class="dropdown-item" :href="route('profile.edit')"><i class='bx bx-user me-2'></i>Perfil</Link></li>
            <li><hr class="dropdown-divider"></li>
            <li><Link class="dropdown-item" :href="route('postagens.store')"><i class='bx bx-edit-alt me-2'></i>Criar publicação</Link></li>
            <li><hr class="dropdown-divider"></li>
            <Link method="POST" class="dropdown-item" as="button" :href="route('logout')" @click="sair">
                <i class="bx bx-power-off me-2"></i>
                <span class="align-middle">Sair</span>
            </Link>
        </ul>
    </div>

    
    <div v-if="usuarioLogado && usuarioLogado.tipo == 'professor'" class="dropdown">
        <button class="btn btn-secondary btn-l dropdown-toggle border-0 dropstart me-5 texto" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        <i class='bx bx-user'></i>
        {{ usuarioLogado.name }}
        </button>
        <ul class="dropdown-menu dropdown-menu-right">
            <li><Link class="dropdown-item" :href="route('profile.edit')"><i class='bx bx-user me-2'></i>Perfil</Link></li>
            <li><hr class="dropdown-divider"></li>
            <li><Link class="dropdown-item" :href="route('admin.index')"><i class='bx bx-cog me-2'></i>Painel de Controle</Link></li>
            <li><hr class="dropdown-divider"></li>
            <li><Link class="dropdown-item" :href="route('postagens.store')"><i class='bx bx-edit-alt me-2'></i>Criar publicação</Link></li>
            <li><hr class="dropdown-divider"></li>
            <Link method="POST" class="dropdown-item" as="button" :href="route('logout')" @click="sair">
                <i class="bx bx-power-off me-2"></i>
                <span class="align-middle">Sair</span>
            </Link>
        </ul>
    </div>

    <div v-if="usuarioLogado && usuarioLogado.tipo == 'moderador'" class="dropdown">
        <button class="btn btn-secondary btn-l dropdown-toggle border-0 dropstart me-5 texto" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        <i class='bx bx-user'></i>
        {{ usuarioLogado.name }}
        </button>
        <ul class="dropdown-menu dropdown-menu-right">
            <li><Link class="dropdown-item" :href="route('profile.edit')"><i class='bx bx-user me-2'></i>Perfil</Link></li>
            <li><hr class="dropdown-divider"></li>
            <li><Link class="dropdown-item" :href="route('admin.index')"><i class='bx bx-cog me-2'></i>Painel de Controle</Link></li>
            <li><hr class="dropdown-divider"></li>
            <li><Link class="dropdown-item" :href="route('postagens.store')"><i class='bx bx-edit-alt me-2'></i>Criar publicação</Link></li>
            <li><hr class="dropdown-divider"></li>
            <Link method="POST" class="dropdown-item" as="button" :href="route('logout')" @click="sair">
                <i class="bx bx-power-off me-2"></i>
                <span class="align-middle">Sair</span>
            </Link>
        </ul>
    </div>

    <div v-if="usuarioLogado && usuarioLogado.tipo == 'administrador'" class="dropdown">
        <button class="btn btn-secondary btn-l dropdown-toggle border-0 dropstart me-5 texto" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        <i class='bx bx-user'></i>
        {{ usuarioLogado.name }}
        </button>
        <ul class="dropdown-menu dropdown-menu-right">
            <li><Link class="dropdown-item" :href="route('profile.edit')"><i class='bx bx-user me-2'></i>Perfil</Link></li>
            <li><hr class="dropdown-divider"></li>
            <li><Link class="dropdown-item" :href="route('admin.index')"><i class='bx bx-cog me-2'></i>Painel de Controle</Link></li>
            <li><hr class="dropdown-divider"></li>
            <li><Link class="dropdown-item" :href="route('postagens.store')"><i class='bx bx-edit-alt me-2'></i>Criar publicação</Link></li>
            <li><hr class="dropdown-divider"></li>
            <Link method="POST" class="dropdown-item" as="button" :href="route('logout')" >
                <i class="bx bx-power-off me-2"></i>
                <span  class="align-middle">Sair</span>
            </Link>
        </ul>
    </div>
</template>

<script>
import { Link } from '@inertiajs/vue3';

export default {
    name: "UserBtn",
    components: {
        Link,
    },
    data () {
        return {
            usuarioLogado: this.$page.props.auth.user
        }
    },
    methods: {
        sair() {
            this.$inertia.get(route('inicial.index'));
        }
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

.texto {
    color: #fff;
    font-size: 19px;
}
</style>