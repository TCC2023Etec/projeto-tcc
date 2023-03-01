<template>
    <ul class="navbar">
        <li class="nav-items">
            <a class="nav-link active" href="#">Inicial</a>
        </li>
        <li class="nav-items">
            <a class="nav-link" href="#">Informações</a>
        </li>
        <li class="nav-items">
            <a class="nav-link" href="#">Contatos</a>
        </li>
        <li class="nav-items">
            <a href="#">
                <img src="../../../public/build/assets/perfil.jpg" alt="perfil" class="img-perfil">
            </a>
        </li>
    </ul>
</template>



<script>

export default {
    name: "Navbar"
}

</script>

<style>
* {
    margin: 0px;
    border: 0;
}

.navbar {
    display: flex;
    flex-direction: row;
    justify-content: space-around;
    align-items: center;

    height: 50px;
    width: 100%;

    color: white;
    background-color: rgba(178,0,0,255);
}

.img-perfil {
    border-radius: 50%;
    height: 40px;
    width: 40px;
}

</style>