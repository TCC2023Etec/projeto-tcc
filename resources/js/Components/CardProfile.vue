<template>

    <div class="card mb-3 shadow h-30 w-75 principal">
        <div class="card-body">
            <div class="d-flex flex-column align-items-center  justify-content-around">
                <img v-if="usuario.imagem" :src="`storage/users/${usuario.imagem}`" alt="user profile picture" class="rounded-circle" width="200">
                <img v-else src="../../../public/img/perfil.png" alt="user profile picture" class="rounded-circle" width="130">
                <div class="mt-5 fs-5 border-bottom text-center">
                    <h4> {{ usuario.name }}</h4>
                    <p class="text-secondary mb-1">{{ tipoUsuario }}</p>
                    <p class="text-muted font-size-sm">{{ usuario.curso.nome }}</p>
                    <!-- <button class="btn btn-primary">Editar perfil</button> -->
                </div>
                <div class="d-flex flex-column mt-3 gap-1 text-start justify-content-start align-items-start">
                    <button @click.prevent="postagensFavoritos"><i class='bx bxs-star me-1'></i>Favoritos</button>
                    <button><i class='bx bxs-like me-1'></i>Curtidos</button>
                    <button @click.prevent="criarPostagem"><i class='bx bxs-edit-alt me-1'></i>Nova Publicação</button>
                    <button @click.prevent="minhasPostagens"><i class='bx bx-windows me-1'></i>Minhas Publicação</button>
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
    methods: {
        postagensFavoritos() {
            this.$inertia.get(route('postagens.favoritos'), {}, {
                    // preserveScroll: true,
                })
        },
        criarPostagem() {
            this.$inertia.get(route('postagens.store'), {}, {
                    // preserveScroll: true,
                })
        },
        minhasPostagens () {
            this.$inertia.get(route('postagens.minhasPostagens'), {}, {
                    // preserveScroll: true,
                })
        }
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