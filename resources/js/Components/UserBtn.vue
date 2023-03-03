<template>
    <!-- <ul class="navbar-nav flex-row align-items-center mh-15">
    <li class="nav-item navbar-dropdown dropdown-user dropdown">
        <a
            class="nav-link dropdown-toggle hide-arrow"
            href="#"
            data-bs-toggle="dropdown"
        >
            <div class="">
                <img src="../../../public/build/assets/perfil.jpg" class="w-px-40 h-auto img-fluid rounded-circle img" alt="Perfil">
            </div>
        </a>
        <ul class="dropdown-menu dropdown-menu-end">
            <li>
                <a class="dropdown-item" href="#">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <span class="fw-semibold d-block">Leo</span>
                            <small class="text-muted text-capitalize">Aluno</small>
                        </div>
                    </div>
                </a>
            </li>
            <li>
                <div class="dropdown-divider"></div>
            </li>
            <li>
                <Link class="dropdown-item" href="#">
                    <i class="bx bx-user me-2"></i>
                    <span class="align-middle">Ver Perfil</span>
                </Link>
            </li>

            <li>
                <div class="dropdown-divider"></div>
            </li>

            <li>
                <Link method="POST" class="dropdown-item" as="button" href="#">
                    <i class="bx bx-power-off me-2"></i>
                    <span class="align-middle">Sair</span>
                </Link>
            </li>
        </ul>
    </li>

    <li class="nav-item ms-2 d-none d-xl-block">
        <p class="fw-semibold mb-0">Leo</p>
    </li>
</ul> -->
    <!-- <div class="d-flex flex-row align-items-center">
        <img src="../../../public/build/assets/perfil.jpg" class="rounded-circle me-3 img" alt="Perfil">
        <span>Leo</span>
    </div> -->

    <div class="dropdown">
  <button class="btn btn-secondary btn-l dropdown-toggle border border-0 d-flex" type="button" data-bs-toggle="dropdown" aria-expanded="false"><box-icon name='user'></box-icon>Leonardo Carvalho</button>
    <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="#">Perfil</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="#">Criar publicação</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="#">Sair</a></li>
    </ul>
    </div>
</template>

<script>
import { Link } from '@inertiajs/vue3';

export default {
    name: "UserBtn"
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