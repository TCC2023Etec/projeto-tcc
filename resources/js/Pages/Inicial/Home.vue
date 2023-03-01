<template>
    <div>
        <Navbar />
        <SmallCard />
        <BigCard />
    </div>

</template>



<script>
import Navbar from '../../Components/Navbar.vue';
import SmallCard from '@/Components/SmallCard.vue';
import BigCard from '@/Components/BigCard.vue';

export default {
    name: 'Home',
    components: {
        Navbar,
        SmallCard,
        BigCard
    }
}

</script>