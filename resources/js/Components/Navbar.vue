<template>
    <nav class="navbar bg-body-tertiary navbar-bg mb-3 d-flex flex-sm-row">
        <div class="">
            <Link class="navbar-brand text-light ms-2" :href="route('inicial.index')">
                Mural - Etec Araçatuba
            </Link>
        </div>
        <UserBtn />
    </nav>
</template>



<script>
import NavLink from '@/Components/NavLink.vue';
import UserBtn from '@/Components/UserBtn.vue';
import { Link } from '@inertiajs/vue3'

export default {
    name: "Navbar",
    components: {
        NavLink,
        UserBtn,
        Link
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

    color: #fff;
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