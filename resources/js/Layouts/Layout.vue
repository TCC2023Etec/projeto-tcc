<template>
    <div class="containter-fluid d-flex flex-column">
        <div class="mb-5">
            <SideBarTest />
        </div>
        <div>
            <slot />
        </div>
    </div>
</template>

<script>
import SideBarTest from '@/Components/SidebarTest.vue';

export default {
    name: 'Layout',
    components: {
        SideBarTest
    }
}
</script>