<template>
    <div class="p-3 d-flex flex-column flex-1 h-100 gap-3">
        <section class="d-flex justify-content-between">
            <h1>TARKTASK</h1>
            <div class="d-flex gap-3">
                <button @click="handleCrearEstadoModal(true)">Crear estado</button>
                <button @click="handleCrearTarjetaModal(true)">Crear tarjeta</button>
            </div>
        </section>
        <section class="h-100 border border-primary scroll p-3 d-flex flex-nowrap mw-100 gap-3">
            <estado :handleModal="handleDetalleTarjetaModal"></estado>
        </section> 
        <crear-estado :isopen="crearEstadoOpen" :handleClose="handleCrearEstadoModal" v-if="crearEstadoOpen"></crear-estado>
        <crear-tarjeta :isopen="crearTarjetaOpen" :handleClose="handleCrearTarjetaModal" v-if="crearTarjetaOpen"></crear-Tarjeta>
        <detalle-tarjeta :isopen="detalleTarjetaOpen" :handleClose="handleDetalleTarjetaModal" v-if="detalleTarjetaOpen"></detalle-Tarjeta>

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

        }

    },
    methods: {
        async saveEstado() {
            try {
                const respuesta = await axios.post('/create/estado', {
                    nombre: "Sin Asignar",
                    descripcion: "Descripcion sin asignar"
                })
            } catch (error) {
                console.log(error);
            }
        }, 
        async saveTarjeta() {
            try {
                const respuesta = await axios.post('/create/tarjeta', {
                    titulo: "Sin Asignar",
                    descripcion: "Descripcion sin asignar"
                })
            } catch (error) {
                console.log(error);
            }
        }, 
        handleCrearEstadoModal(isopen) {
            console.log(isopen);
            this.crearEstadoOpen = isopen
            
        },
        handleCrearTarjetaModal(isopen) {
            console.log(isopen);
            this.crearTarjetaOpen = isopen

        },
        handleDetalleTarjetaModal(isopen) {
            console.log(isopen);
            this.detalleTarjetaOpen = isopen

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
</style>