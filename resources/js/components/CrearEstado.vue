<template>
    <div class="custom-modal d-flex justify-content-center align-items-center" >
        <div class="w-50 bg-white p-3">
            <div class="modal-dialog" role="document">
                <div class="modal-content d-flex flex-column gap-3">
                    <div class="modal-header">
                        <h5 class="modal-title">Crear estado</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="handleClose(false)">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <section>
                            <div class="form-group">
                                <label for="formGroupExampleInput">Nombre</label>
                                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="In Progress" v-model="nombre">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput2">Descripcion</label>
                                <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Descripcion" v-model="descripcion">
                            </div>
                        </section>
                    </div>
                    <div class="modal-footer d-flex justify-content-end gap-3">
                        <button type="button" class="btn btn-primary" @click="saveEstado">Guardar</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" @click="handleClose(false)">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</template>

<script>
export default {
    props: ['isopen' , 'handleClose'],
    data() {
        return {
            nombre: '',
            descripcion: '',
        }
    },
    methods: {
        async saveEstado() {
            try {
                const respuesta = await axios.post('/create/estado', {
                    nombre: this.nombre,
                    descripcion: this.descripcion
                })
                this.handleClose(false)
            } catch (error) {
                console.log(error);
            }
        },
    }
}


</script>
<style scoped>
.custom-modal{
    position: absolute;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    z-index: 1000;
    top: 0;
    left: 0;
}
</style>