<template>
    <Layout>
        <FormCursos :rota="rota" :curso="curso"/>
    </Layout>
</template>

<script>
import { useForm } from '@inertiajs/vue3';
import SideBar from '@/Components/Sidebar.vue';
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
        SideBar,
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