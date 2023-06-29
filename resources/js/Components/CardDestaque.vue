<template>
    <div class="card mb-3 shadow h-30 w-75 principal">
        <h1>Publicações em Destaque</h1>
        <div class="card-body">
            <ul>
                <li v-for="postagem in postagens">
                    <span class="fw-bold">{{ postagem.titulo }}</span>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'CardDestaque',
        props: {
            postagens: Array
        }
    }
</script>

<style>
    ul li {
        list-style: circle;
    }
</style>