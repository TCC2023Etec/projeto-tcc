<template>
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <!-- <a class="navbar-brand" href="#">Mural Etec</a> -->
            <div class="dropdown">
                <button class="btn btn-secondary btn-l dropdown-toggle border border-0 dropstart me-5 texto" type="button" data-bs-toggle="dropdown" aria-expanded="false">
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
                    <Link method="POST" class="dropdown-item" as="button" :href="route('logout')">
                        <i class="bx bx-power-off me-2"></i>
                        <span class="align-middle">Sair</span>
                    </Link>
                </ul>
            </div>
            
            <div class="offcanvas offcanvas-start fs-5 w-sm-25" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-1">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Início</a>
                        </li>
                        <!-- Publicações -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Publicações
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Validar</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" :href="route('postagens.store')">Criar publicação</a></li>
                            </ul>
                        </li>
                        <!-- Usuários -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Usuários
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Validar</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Novo usuário</a></li>
                            </ul>
                        </li>
                        <!-- Cursos -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Cursos
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Listar</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" :href="route('cursos.create')">Novo curso</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</template>

<script>
import { Link } from '@inertiajs/vue3';

export default {
    name: 'SideBarTest',
    components: {
        Link
    },  
    data() {
        return {
            isSidebarOpen: true,
            usuarioLogado: this.$page.props.auth.user
        };
    },
    methods: {
        toggleSidebar() {
            this.isSidebarOpen = !this.isSidebarOpen;
        },
    },
};
</script>

<style>
nav {
    background-color: grey;
}
</style>
