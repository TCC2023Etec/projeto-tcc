<template>
    <AdminLayout />
    <FormPostagem />
</template>

<script>
import FormPostagem from '../Postagem/shared/FormPostagem.vue';
import AdminLayout from '@/Layouts/Admin.vue';

export default {
    name: 'CreatePostagem',
    components: {
        FormPostagem,
        AdminLayout
    },
    methods: {
        
    }
}
</script>