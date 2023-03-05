<template>
    <AdminLayout />

</template>

<script>
import AdminLayout from '@/Layouts/Admin.vue';

export default {
    name: "Show",
    components: {
        AdminLayout
    },
    props: {
        postagem: Object
    }
}
</script>