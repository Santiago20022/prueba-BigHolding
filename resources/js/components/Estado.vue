<template>
    <div class="custom-size d-flex flex-column  h-100">
        <div>Titulo</div>
        <div class="border border-primary h-100 p-3 scroll">
            <tarjeta :handleModal="handleModal" ></tarjeta>
        </div>

    </div>
</template>

<script>
import Tarjeta from './Tarjeta.vue';
export default {
    props: ['handleModal'],
    components: {
        Tarjeta,
    },
}
</script>
<style scoped>
.custom-size {
    flex-basis: 25%;
    flex-shrink: 0;
}

.scroll{
    overflow-y: auto;
}
</style>