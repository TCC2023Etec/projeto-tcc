<template>
    <!-- Nav bar antiga -->
    <!-- <ul class="navbar">
        <div class="container-fluid">
            <li class="nav-items">
                <NavLink :href="route('inicial.index')" class="nav-link">Home</NavLink>
            </li>

            <li class="nav-items">
                <NavLink href="#" class="nav-link">Criação</NavLink>
            </li>

            <li class="nav-items">
                <NavLink :href="route('postagem.create')" class="nav-link">Criação</NavLink>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Dropdown
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
            </li>

            <form class="d-flex" role="search">
                <input class="form-control me-2 rounded-pill" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success border border-1 rounded-pill" type="submit">Pesquisar</button>
            </form>

            <li class="nav-items">
                <a href="#">
                    <img src="../../../public/build/assets/perfil.jpg" alt="perfil" class="img-perfil">
                </a>
            </li>
        </div>
    </ul> -->
    <nav class="navbar bg-body-tertiary navbar-bg mb-3 d-flex flex-sm-row">
        <div class="">
            <a class="navbar-brand text-light ms-2">Mural - Etec Araçatuba</a>
        </div>
        <UserBtn />
    </nav>
</template>



<script>
import NavLink from '@/Components/NavLink.vue';
import UserBtn from '@/Components/UserBtn.vue';

export default {
    name: "Navbar",
    components: {
        NavLink,
        UserBtn
    }
}

</script>

<style>
* {
    margin: 0px;
    border: 0;
}

.navbar1 {
    display: flex;
    flex-direction: row;
    justify-content: space-around;
    align-items: center;

    height: 50px;
    width: 100%;

    color: white;
    background-color: rgba(178,0,0,255);
}

.navbar-bg {
    background-color: #b20000;
    color: #fff;
}

.img-perfil {
    border-radius: 50%;
    height: 40px;
    width: 40px;
}

.nav-link {
    text-decoration: none;
    color: white;
}

</style>