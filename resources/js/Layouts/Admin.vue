<template>
    <Navbar />

    <div class="container">
        <div v-if="$page.props.flash.mensagem" class="toast align-items-center p-1 mb-4 text-sm bg-green-300 toast fade show" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    {{ $page.props.flash.mensagem }}
                </div>
                <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close">X</button>
            </div>
        </div>
        <div class="icon-wpp bx-lg"><a href="#"><i class='bx bxl-whatsapp'></i></a></div>
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
    },
    methods: {
        hideMessage() {
            setInterval(() => {
                this.mensagem.fadeOut(1500)
            }, 3000);
        }
    }
}

</script>

<style>
.icon-wpp {
    position: fixed;
    bottom: 10px;
    right: 10px;

    width: 50px;
    height: 50px;
}
</style>