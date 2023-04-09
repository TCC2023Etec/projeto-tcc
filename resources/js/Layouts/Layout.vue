<template>
    <div class="containter-fluid d-flex flex-column">
        
        <div class="mb-5">
            <SideBar 
            :numPostagens="numPostagens"
            :numUsuarios="numUsuarios"
            />
            <div v-if="$page.props.flash.mensagem" 
            class="toast align-items-center p-1 mb-4 text-sm bg-green-300 toast fade show" role="alert" 
            aria-live="assertive" 
            aria-atomic="true"
            >
            <div class="d-flex">
                <div class="toast-body">
                    {{ $page.props.flash.mensagem }}
                </div>
                <button 
                type="button" 
                class="btn-close me-2 m-auto" 
                data-bs-dismiss="toast" 
                aria-label="Close"
                >X</button>
            </div>
        </div>
        </div>
        <div>
            <slot />
        </div>
    </div>
</template>

<script>
import SideBar from '@/Components/Sidebar.vue';

export default {
    name: 'Layout',
    components: {
        SideBar
    },
    props: {
        numPostagens: Number,
        numUsuarios: Number
    },
    data() {
        return {
            
        };
    },
    mounted() {

    },
    methods: {
        
    },
}
</script>