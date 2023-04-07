<template>
    <AdminLayout />
        Sua requisição foi mandada para os administradores. Aguarde até que seja aprovada.
        Enquanto isso, aproveite as postagens já publicadas!
        <a :href="route('inicial.index')">Tela inicial</a>
</template>

<script>
import AdminLayout from '@/Layouts/Admin.vue';

export default {
    name: 'AguardandoAprova',
    components: {
        AdminLayout
    }
}

</script>