<template>
    <span v-if="estado.nombre === 'TO DO'" class="text-secondary font-weight-bold"><b>{{ estado.nombre }}</b></span>
    <span v-else-if="estado.nombre === 'In Progress'" class="text-primary font-weight-bold"><b>{{ estado.nombre }}</b></span>
    <span v-else-if="estado.nombre === 'Done'" class="text-success font-weight-bold"><b>{{ estado.nombre }}</b></span>
    <span v-else class="text-secondary font-weight-bold"><b>{{ estado.nombre }}</b></span>
</template>

<script>
export default {
    props: ['estado'],

    created() {
         console.log(this.estado);
    },
}
</script>