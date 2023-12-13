<template>
    <div class="d-flex flex-column custom-size shadow rounded p-3 gap-3 overflow pointer" @click="handleModal(true, tarjeta.id)">
        <div class="d-flex w-100 justify-content-end">
            <i class="fa-solid fa-trash pointer" @click.stop="borrarTarjeta"></i>
        </div>
        <div class="d-flex justify-content-between gap-3 overflow flex-column">
            <div class="d-flex flex-column w-100 overflow flex-nowrap ">
                <div class="d-flex justify-content-between">
                    <h5>{{ tarjeta.titulo }}</h5>
                 </div>
                 <div class="d-flex flex-nowrap scroll">
                    {{ tarjeta.descripcion }}
                </div>
            </div>
            
            <div class="d-flex flex-column justify-content-end">
                <div class="d-flex gap-3">
                    <h6>Estado: </h6>
                    <estado-texto :estado="tarjeta.estado"></estado-texto>
                </div>
                <div class="d-flex gap-3">
                    <h6>Responsable: </h6>
                    {{ tarjeta.user.name}}
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import EstadoTexto from './EstadoTexto.vue'
export default {
    props: ['handleModal', 'tarjeta', 'setTrigger'],
    components: {
        EstadoTexto
    },
    methods: {
        async borrarTarjeta() { 
            try {
                const respuesta = await axios.post(`/delete/tarjeta/${this.tarjeta.id}`)
                this.setTrigger(true) 
            } catch (error) {
                console.log(error);
            }

        }
    }
}
</script>
<style scoped>

.custom-size{
    min-height: 250px;
    max-height: 250px;
    height: 100%;
    overflow-y: hidden;
}

.pointer{
    cursor: pointer;
}

.scroll{
    overflow-y: auto;
    flex: 1;
}
.scroll::-webkit-scrollbar{
    display: none;
}

.overflow{
    overflow-y: hidden;
}
</style>