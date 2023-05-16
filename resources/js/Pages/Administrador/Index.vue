<template>
    <Head title="Painel de Controle"/>
    <Layout
    :numUsuarios="numUsuarios"
    :numPostagens="numPostagens"
    >
        <div class="card border-secondary mb-3 mx-3">
            <div class="card-header bg-transparent border-secondary">Bem-vindo</div>
            <div class="card-body">
                <h5 class="card-title">Seja bem-vindo ao Painel de Controle do Mural Etec!</h5>
                <p class="card-text">Aqui você conseguirá validar, criar e deletar as postagens e usuários. Além de fazer todo o gerenciamento do sistema.</p>
                <p>No ícone "<i class='bx bx-menu'></i>" você encontrará todas as funcionalidades do sistema.</p>
                <p>Para eventuais dúvidas ou problemas durante o uso, entre em contato com o suporte.</p>
            </div>
        </div>

        <div class="card border-secondary mb-3 mx-3">
            <div class="card-header bg-transparent border-secondary">Quadro de avisos</div>
            <div class="card-body">
                <div v-if="numUsuarios && usuarioLogado.tipo == 'administrador'">
                    Usuários aguardando aprovação: {{ numUsuarios }}
                </div>
                <div v-if="numPostagens">
                    Postagens aguardando aprovação: {{ numPostagens }}
                </div>
                <div v-if="!numPostagens && !numUsuarios">
                    Não há nenhuma atualização
                </div>
            </div>
        </div>
    </Layout>
</template>

<script>
import SideBar from '@/Components/Sidebar.vue';
import Layout from '@/Layouts/Layout.vue';
import { Head } from '@inertiajs/vue3';

export default {
    name: 'Index',
    components: {
        SideBar,
        Layout,
        Head
    },
    props: {
        numUsuarios: Number,
        numPostagens: Number,
    },
    data() {
        return {
            usuarioLogado: this.$page.props.auth.user
        }
    }
}
</script>