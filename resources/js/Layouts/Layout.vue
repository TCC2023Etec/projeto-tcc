<template>
    <Sidebar />
    <slot />
    <footer />
</template>

<script>
import 'Sidebar';

export default {
    name: 'Layout',
    components: {
        Sidebar
    }
}
</script>