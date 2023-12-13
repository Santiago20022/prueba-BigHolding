<template>
    <div class="custom-modal d-flex justify-content-center align-items-center" >
        <div class="w-50 bg-white p-4 rounded">
            <div class="modal-dialog" role="document">
                <div class="modal-content d-flex flex-column gap-3">
                    <div class="modal-header">
                        <h5 class="modal-title">Crear tarjeta</h5>
                        <button type="button" class="close btn btn-secondary" data-dismiss="modal" aria-label="Close" @click="handleClose(false)">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <section>
                            <div class="form-group">
                                <label for="formGroupExampleInput">Titulo *</label>
                                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Titulo tarea" v-model="titulo">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput2">Descripcion</label>
                                <textarea class="form-control" id="formGroupExampleInput2" v-model="descripcion"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput2">Responsable *</label>
                                <select class="form-select"  v-model="responsable">
                                    <option selected>Selecciona el responsable</option>
                                    <option :value="user.id" v-for="user in users">{{user.name}}</option>
                                  </select>
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput2">Estado *</label>
                                <select class="form-select" v-model="estado">
                                    <option selected>Seleccione el estado</option>
                                    <option :value="estado.id" v-for="estado in estados">{{ estado.nombre }}</option>
                                  </select>
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput2">Fecha inicio</label>
                                <input type="date" class="form-control" id="formGroupExampleInput2" placeholder="Fecha de inicio" v-model="fechaInicio">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput2">Fecha fin</label>
                                <input type="date" class="form-control" id="formGroupExampleInput2" placeholder="Fecha de fin" v-model="fechaFin">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput2">Fecha fin</label>
                                <input type="file" class="form-control" id="formGroupExampleInput2" placeholder="Selecciona archivo" @change="handleArchivo">
                            </div>
                        </section>
                    </div>
                    <div class="modal-footer d-flex justify-content-end gap-3">
                        <button type="button" class="btn btn-primary" @click="saveTarjeta" :disabled="validarCampos()">Guardar</button>
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
    async created() {
        await this.getUsuarios()
        await this.getEstados()
    },
    data() {
        return {
            users: [],
            estados: [],
            titulo: '',
            descripcion: '',
            responsable: '',
            estado: '',
            fechaInicio: '',
            fechaFin: '',
            archivo: null,
        }
    },
    methods: {
        async getUsuarios() {
            try {
                const respuesta = await axios.get('/get/users')
                this.users = respuesta.data 
            } catch (error) {
                console.log(error);
            }
        }, 
        async getEstados() {
            try {
                const respuesta = await axios.get('/get/estados')
                this.estados = respuesta.data 
            } catch (error) {
                console.log(error);
            }
        }, 
        async saveTarjeta() {
            try {
                const config = {
                    headers : { "Content-Type" : "multipart/form-data"}
                }
                const data = new FormData()
                data.append('titulo', this.titulo)
                data.append('descripcion', this.descripcion)
                data.append('id_usuario', this.responsable)
                data.append('fecha_inicio',this.fechaInicio)
                data.append('fecha_fin',this.fechaFin)
                data.append('id_estado', this.estado)
                data.append('file', this.archivo)

                const respuesta = await axios.post('/create/tarjeta', data, config)
                this.handleClose(false)
            } catch (error) {
                console.log(error);
            }
        },

        validarCampos() {
            if(!this.titulo || !this.descripcion || !this.responsable || !this.estado){
                return true
            }
            return false
        },
        handleArchivo(e) {
            this.archivo = e.target.files[0]
        }

        
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

textarea{
    resize: none;
}
</style>