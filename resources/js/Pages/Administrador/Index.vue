<template>
    <Layout>
        <div class="card border-secondary mb-3">
            <div class="card-header bg-transparent border-secondary">Bem-vindo</div>
            <div class="card-body">
                <h5 class="card-title">Seja bem-vindo ao Painel de Controle do Mural Etec!</h5>
                <p class="card-text">Aqui você conseguirá validar, criar e deletar as postagens e usuários. Além de fazer todo o gerenciamento do sistema.</p>
                <p>No Menu ao lado você encontrará todas as funcionalidades do sistema.</p>
                <p>Para eventuais dúvidas ou problemas durante o uso, entre em contato com o suporte.</p>
            </div>
        </div>

        <div class="card border-secondary mb-3">
            <div class="card-header bg-transparent border-secondary">Quadro de avisos</div>
            <div class="card-body">
                <div v-if="numUsuarios">
                    Usuários aguardando aprovação: {{ numUsuarios }}
                </div>
                <div v-if="numPostagens">
                    Postagens aguardando aprovação: {{ numPostagens }}
                </div>
            </div>
        </div>
    </Layout>
</template>

<script>
import SideBar from '@/Components/Sidebar.vue';
import Layout from '@/Layouts/Layout.vue';

export default {
    name: 'Index',
    components: {
        SideBar,
        Layout
    },
    props: {
        numUsuarios: Number,
        numPostagens: Number,
    }
}
</script>