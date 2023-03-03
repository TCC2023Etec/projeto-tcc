<template>
    <Navbar />

    <div class="container-fluid d-flex flex-column justify-content-center align-items-center container mt-3">
        <div class="form-floating mb-3 w-50">
            <input type="text" class="form-control" placeholder="Digite o título" id="floatingTextarea" />
            <label for="floatingTextarea">Título</label>
        </div>

        <div class="form-floating mb-3 w-50">
            <textarea class="form-control" placeholder="Digite seu texto" id="floatingTextarea2" style="height: 100px"></textarea>
            <label for="floatingTextarea2">Texto</label>
        </div>

        <div class="mb-3 w-50">
            <label for="formFile" class="form-label">Imagem</label>
            <input class="form-control" type="file" id="formFile">
        </div>
    </div>
</template>


<script>
import Navbar from '../../Components/Navbar.vue';

export default {
    name: 'Home',
    components: {
        Navbar,
    }
}

</script>

<style>

</style>