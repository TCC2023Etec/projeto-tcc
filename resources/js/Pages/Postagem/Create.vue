<template>
    <AdminLayout />
    <FormPostagem />
</template>

<script>
import FormPostagem from '../Postagem/shared/FormPostagem.vue';
import AdminLayout from '@/Layouts/Admin.vue';

export default {
    name: 'CreatePostagem',
    emit: ['hideMessage'],
    components: {
        FormPostagem,
        AdminLayout
    },
    methods: {
        
    }
}
</script>