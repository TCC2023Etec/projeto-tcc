<template>

    <div class="card mb-3 shadow h-30 w-75 principal">
        <div class="card-body">
            <div class="d-flex flex-column align-items-center text-center justify-content-around">
                <img v-if="usuario.imagem" :src="`storage/users/${usuario.imagem}`" alt="user profile picture" class="rounded-circle" width="200">
                <img v-else src="../../../public/img/perfil.png" alt="user profile picture" class="rounded-circle" width="130">
                <div class="mt-5 fs-5">
                    <h4> {{ usuario.name }}</h4>
                    <p class="text-secondary mb-1">{{ tipoUsuario }}</p>
                    <p class="text-muted font-size-sm">{{ usuario.curso_id }}</p>
                    <!-- <button class="btn btn-primary">Editar perfil</button> -->
                </div>
            </div>
        </div>
    </div>
    
</template>

<script>
export default {
    name: 'CardProfile',
    props: {
        usuario: Object,
    },
    computed: {
        tipoUsuario() {
            const tipo = this.usuario.tipo;
            return tipo.charAt(0).toUpperCase() + tipo.slice(1);
        }
    }
}
</script>

<style>
.principal {
    position: sticky;
    top: 10px;
}

</style>