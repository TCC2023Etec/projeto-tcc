<template>
    <div>
        <AdminLayout />
        
        <div class="card text-center">
            <div class="card-header">
                Requisição recusada
            </div>
            <div class="card-body">
                <h5 class="card-title">Sua requisição foi recusada pelos Administradores.</h5>
                <p class="card-text mb-3">Entre em contato com a secretaria através do número (18) 3636-3636 caso tenha dúvidas sobre o procedimento.</p>
                <Link :href="route('inicial.index')" class="btn btn-primary">Voltar à tela inicial</Link>
            </div>
            <div class="card-footer text-body-secondary">
                Mural Etec
            </div>
        </div>
    </div>
</template>

<script>
import AdminLayout from '@/Layouts/Admin.vue';
import { Link } from '@inertiajs/vue3';

export default {
    name: 'UsuarioReprovado',
    components: {
        AdminLayout,
        Link
    }
}

</script>