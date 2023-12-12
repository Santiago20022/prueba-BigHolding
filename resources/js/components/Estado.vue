<template>
    <div class="custom-size d-flex flex-column  h-100">
        <div>{{ estado.nombre }}</div>
        <div class="border border-primary h-100 p-3 scroll d-flex flex-column gap-3">
            <template v-for="tarjeta in tarjetas">
                <tarjeta :handleModal="handleModal" :tarjeta="tarjeta"></tarjeta>
            </template>
            
        </div>

    </div>
</template>

<script>
import Tarjeta from './Tarjeta.vue';
export default {
    props: ['handleModal', 'estado', 'getTarjetas', 'trigger', 'setTrigger'],
    components: {
        Tarjeta,
    },
    async created() {
       this.tarjetas = await this.getTarjetas(this.estado.id)
    },
    data() {
        return {
            tarjetas: [],
            
        }
    },
    watch:{
        async trigger(newTrigger, oldTrigger){
            if (newTrigger){
                this.tarjetas = await this.getTarjetas(this.estado.id)
                this.setTrigger(false)
            }
        }
    }
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