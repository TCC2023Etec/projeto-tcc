<template>
    <div class="badge mt-1 p-1 text-red-600 fs-6" v-if="mensagem">
        {{ mensagem }}
    </div>
</template>

<script>
export default {
    name: 'MensagemErro',
    props: {
        mensagem: String
    }
}
</script>

<style>

</style>