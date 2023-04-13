<template>
    <div>
        <AdminLayout />
        
        <div class="card text-center">
            <div class="card-header">
                Aguardando Aprovação
            </div>
            <div class="card-body">
                <h5 class="card-title">Sua requisição foi mandada para os administradores.</h5>
                <p class="card-text mb-3">Aguarde até que seja aprovada. Enquanto isso, aproveite as postagens já publicadas!</p>
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
    name: 'AguardandoAprova',
    components: {
        AdminLayout,
        Link
    }
}

</script>