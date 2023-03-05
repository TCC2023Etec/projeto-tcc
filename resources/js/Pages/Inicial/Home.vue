<template>
    <div>
        <AdminLayout />
        <SmallCard />
        <BigCard />
    </div>

</template>



<script>
import Navbar from '../../Components/Navbar.vue';
import SmallCard from '@/Components/SmallCard.vue';
import BigCard from '@/Components/BigCard.vue';
import AdminLayout from '@/Layouts/Admin.vue'

export default {
    name: 'Home',
    components: {
        Navbar,
        SmallCard,
        BigCard,
        AdminLayout
    }
}

</script>