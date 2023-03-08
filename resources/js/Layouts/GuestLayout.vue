<template>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">

        <div
            class="w-full sm:max-w-md mt-6 px-6 py-4 shadow-md overflow-hidden sm:rounded-lg cartao"
        >
            <slot/>
        </div>
    </div>
</template>

<style>
.cartao {
    background-color: #f0f8ea;
    border: 1px solid;
}
</style>
