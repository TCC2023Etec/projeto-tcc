<template>
    <div class="wrapper">
        <div class="sidebar">
            <!-- conteúdo da sidebar -->
            <Sidebar />
        </div>
        <div class="main-content">
            <div class="header">
            <!-- conteúdo do header -->
            <Header />
            </div>
            <div class="content">
            <!-- conteúdo principal -->
            <slot />
            </div>
        </div>
    </div>

</template>

<script>
import Header from '@/Components/Header.vue'
import Sidebar from '@/Components/Sidebar.vue';

export default {
    name: 'Layout',
    components: {
        Header,
        Sidebar
    }
}
</script>

<style>
/* .wrapper {
  display: grid;
  grid-template-columns: 200px 1fr;
  grid-gap: 20px;
  background-color: #D7D6D6;
}

.main-content {
  display: grid;
  grid-template-rows: auto 1fr;
  grid-gap: 20px;
} */
</style>