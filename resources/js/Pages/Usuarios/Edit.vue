<template>
    <layout>
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">Editar/Usuário</span>
            #{{ usuario.name }}
        </h4>

        <FormUsuario :rota="rota" :usuario="usuario" :cursos="cursos"/>
    </layout>

</template>



<script>
import Layout from '@/Layouts/Layout.vue';
import FormUsuario from './shared/FormUsuario.vue';

export default {
    name: "Edit",
    components: {
        Layout,
        FormUsuario
    },
    props: {
        usuario: Object,
        cursos: Array
    },
    data() {
        return {
            rota: route('user.update', this.usuario.id)
        }
    },
}

</script>