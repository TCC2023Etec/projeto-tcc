<template>
    <Layout>
        <FormUsuario :cursos="cursos" :rota="rota" :usuario="usuario"/>
    </Layout>
</template>

<script>
import Layout from '@/Layouts/Layout.vue';
import FormUsuario from './shared/FormUsuario.vue';

export default {
    name: 'Create',
    components: {
        Layout,
        FormUsuario
    },
    props: {
        cursos: Array
    },
    data() {
        return {
            rota: route('user.store'),
            usuario: {
                id: null,
                name: '',
                email: '',
                password: '',
                password_confirmation: '',
                terms: false,
                tipo: '',
                curso: null,
            }
        }
    }
}
</script>