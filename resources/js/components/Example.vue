<template>
    <div>
        <button @click="saveEstado">guardar</button>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            estados: [],
            
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
        }
    }
    
}
</script>