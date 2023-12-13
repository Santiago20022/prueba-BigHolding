<template>
    <div class=" d-flex flex-column  gap-3 custom-size custom-flex">
        <h4>{{ estado.nombre }}</h4>
        <div class="border border-secondary p-3 scroll d-flex flex-column gap-3 rounded custom-flex ">
            <template v-if="!tarjetas.length">
                <span>No hay tarjetas creadas para este estado</span>
            </template>
            <template v-for="tarjeta in tarjetas">
                <tarjeta :handleModal="handleModal" :tarjeta="tarjeta" :trigger="trigger" :setTrigger="setTrigger"></tarjeta>
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

.custom-flex{
    flex: 1 ;
}


</style>