<template>
    <layout>
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">Editar/</span>
            #{{ curso.id + ' - ' + curso.nome}}
        </h4>

        <FormCursos metodo="put" :rota="rota" :curso="curso"></FormCursos>
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