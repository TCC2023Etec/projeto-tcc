<template>
    <Layout>
        <FormCursos :rota="rota" :curso="curso"/>
    </Layout>
</template>

<script>
import { useForm } from '@inertiajs/vue3';
import SideBarTest from '@/Components/SidebarTest.vue';
import FormCursos from './shared/FormCursos.vue';
import Layout from '@/Layouts/Layout.vue'

export default {
    name: "Create",
    data() {
        return {
            rota: route('cursos.store'),
            curso: {
                id: null,
                nome: '',
                duracao: ''
            }
        }
    },
    components: {
        SideBarTest,
        FormCursos,
        Layout
    },  
    methods: {
            formSubmit() {
                this.form
                .submit('post', route('cursos.store'), {
                    _method: 'put',
                });
            },
        },
        setup () {
            const form = useForm({
                id: null,
                nome: '',
                duracao: ''
            });

            return { form };
        }
}
</script>