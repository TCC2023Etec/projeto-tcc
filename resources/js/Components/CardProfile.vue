<template>
    
    <div class="card mb-3 shadow">
        <div class="card-body">
            <div class="d-flex flex-column align-items-center text-center">
                <img src="../../../public/img/perfil.png" alt="user profile picture" class="rounded-circle" width="100">
                <div class="mt-3">
                    <h4> {{ usuario.name }}</h4>
                    <p class="text-secondary mb-1">{{ tipoUsuario }}</p>
                    <p class="text-muted font-size-sm">{{ usuario.curso }}</p>
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