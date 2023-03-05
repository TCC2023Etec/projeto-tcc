<template>
    <Navbar />
    
    <!-- <div v-if="$page.props.flash.mensagem" class="p-4 mb-4 text-sm text-white-700 bg-red-100 toast fade show">
        {{ $page.props.flash.mensagem }}
        <div class="toast-header">
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
                {{ $page.props.flash.mensagem }}
            </div>
    </div> -->

    <div v-if="$page.props.flash.mensagem" class="toast align-items-center p-1 mb-4 text-sm bg-red-100 toast fade show" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body">
                {{ $page.props.flash.mensagem }}
            </div>
            <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close">X</button>
        </div>
    </div>
</template>

<script>
import Navbar from '@/Components/Navbar.vue';

export default {
    name: 'AdminLayout',
    components: {
        Navbar,
    },
    props: {
        mensagem: String
    }
}

</script>