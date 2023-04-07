<template>
    <Layout>
        Sua requisição foi mandada para os administradores. Aguarde até que seja aprovada.
        Enquanto isso, aproveite as postagens já publicadas!
        <a :href="route('inicial.index')">Tela inicial</a>
    </Layout>
</template>

<script>
import Layout from '@/Layouts/Layout.vue';

export default {
    name: 'AguardandoAprova',
    components: {
        Layout,
    }
}

</script>