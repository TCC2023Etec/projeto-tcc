<template>
    <Layout>
        <ListaAprova :postagens="postagens" />
    </Layout>
</template>

<script>
import Layout from '@/Layouts/Layout.vue';
import ListaAprova from './shared/ListaAprova.vue';

export default {
    name: 'Validacao',
    components: {
        Layout,
        ListaAprova
    },
    props: {
        postagens: Array
    }
}
</script>