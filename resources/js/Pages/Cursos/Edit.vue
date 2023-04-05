<template>
    <layout>
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">Editar/Curso</span>
            #{{ curso.nome }}
        </h4>

        <FormCursos :rota="rota" :curso="curso" />
    </layout>

</template>



<script>
import Layout from '@/Layouts/Layout.vue';
import FormCursos from './shared/FormCursos.vue';

export default {
    name: "Edit",
    components: {
        Layout,
        FormCursos
    },
    props: {
        curso: Object
    },
    data() {
        return {
            rota: route('cursos.update', this.curso.id)
        }
    },
}

</script>