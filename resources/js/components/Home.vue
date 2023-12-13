<template>
    <div class="p-3 d-flex flex-column h-100 gap-3">
        <section class="d-flex justify-content-end">
            <div class="d-flex gap-3">
                <button @click="handleCrearEstadoModal(true)" class="btn btn-primary">Crear estado</button>
                <button @click="handleCrearTarjetaModal(true)" class="btn btn-dark">Crear tarjeta</button>
                <a href="/reporte" class="btn btn-outline-primary">Reporte de Tareas</a>
            </div>
        </section>
        <section class="border border-dark p-3 d-flex mw-100 gap-3 rounded scroll  flex-1">
            <template v-for="estado in estados">
                <estado :handleModal="handleDetalleTarjetaModal" :estado="estado" :getTarjetas="getTarjetas" :trigger="trigger" :setTrigger="setTrigger"></estado>
            </template>
        </section> 
        <crear-estado :isopen="crearEstadoOpen" :handleClose="handleCrearEstadoModal" v-if="crearEstadoOpen"></crear-estado>
        <crear-tarjeta :isopen="crearTarjetaOpen" :handleClose="handleCrearTarjetaModal" v-if="crearTarjetaOpen"></crear-Tarjeta>
        <detalle-tarjeta :isopen="detalleTarjetaOpen" :handleClose="handleDetalleTarjetaModal" v-if="detalleTarjetaOpen" :tarjetaId="tarjetaId"></detalle-Tarjeta>

    </div>
</template>

<script>
import axios from 'axios';
import Estado from './Estado.vue';
import CrearEstado from './CrearEstado.vue';
import CrearTarjeta from './CrearTarjeta.vue';
import DetalleTarjeta from './DetalleTarjeta.vue';

export default {
    components: {
        Estado,
        CrearEstado,
        CrearTarjeta,
        DetalleTarjeta,
    },
    data() {
        return {
            estados: [],
            ejemplo: "Esto es um ejemplo",
            crearEstadoOpen: false,
            crearTarjetaOpen: false,
            detalleTarjetaOpen: false,
            tarjetaId: '',
            trigger: false,
        }
    },
    async created() {
        await this.getEstados()
    },
    methods: {
        async getEstados() {
            try {
                const respuesta = await axios.get('/get/estados')
                this.estados = respuesta.data 
            } catch (error) {
                console.log(error);
            }
        }, 
        handleCrearEstadoModal(isopen) {
            if(!isopen){
                this.getEstados()
            }
            this.crearEstadoOpen = isopen
            
        },
        handleCrearTarjetaModal(isopen) {
            if(!isopen){
                this.estados = []
                this.getEstados()
            }
            this.crearTarjetaOpen = isopen
        },
        handleDetalleTarjetaModal(isopen, tarjetaId, retrigger = false) {
            this.tarjetaId = tarjetaId
            this.detalleTarjetaOpen = isopen
            this.trigger = retrigger
        },
        async getTarjetas(estadoId) {
            try {
                const respuesta = await axios.get(`/get/tarjetas/${estadoId}`)
                return respuesta.data 
            } catch (error) {
                console.log(error);
            }
        }, 
        setTrigger(trigger) {
            this.trigger = trigger
        }
        

    }
    
}
</script>
<style scoped>
    .flex-1{
        flex: 1;
    }
    .scroll{
        overflow-x: auto;
    }

    .overflow{
        align-items: stretch;
        flex: 1 1 auto;
        max-height: 100%;
    }

    .custom-flex{
        flex-grow: 1;
    }
</style>