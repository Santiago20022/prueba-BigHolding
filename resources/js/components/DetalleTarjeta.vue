<template>
    <div class="custom-modal d-flex justify-content-center align-items-center" >
        <div class="w-75 bg-white p-3">
            <div class="modal-dialog" role="document">
                <div class="modal-content d-flex flex-column gap-3">
                    <div class="modal-header d-flex gap-3 pb-3 border-bottom">
                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input" v-model="titulo">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="handleClose(false)">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body d-flex w-100 gap-3">
                        <div class="d-flex flex-column gap-3 w-100">
                            <div class="custom-height p-3 d-flex flex-column">
                                <h4>Descripcion</h4>
                                <textarea v-model="descripcion"></textarea>
                            </div>
                            <div class="custom-height p-3 d-flex flex-column">
                                <h4>Comentarios</h4>
                                <div class="d-flex flex-column scroll">
                                    <div class="d-flex gap-3" v-for="comentario in comentarios">
                                        <span>{{ comentario.user.name }}</span>
                                        <p>{{ comentario.comentario }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex gap-3">
                                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input" v-model="comentario">
                                <button type="button" class="btn btn-primary" @click="saveComentario">Comentar</button>
                            </div>
                        </div>
                        <div class="d-flex flex-column gap-3">
                            <div class="d-flex flex-column ">
                                <h3>Responsable</h3>
                                <select class="form-select"  v-model="responsable">
                                    <option :value="user.id" v-for="user in users" :selected="user.id === tarjeta?.user?.id">{{user.name}}</option>
                                  </select>
                            </div>
                            <div class="d-flex flex-column ">
                                <h3>Estado</h3>
                                <select class="form-select" v-model="estado">
                                    <option :value="estado.id" v-for="estado in estados" :selected="estado.id === tarjeta?.estado?.id">{{ estado.nombre }}</option>
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
                                <span>{{calcularFechas() }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-end gap-3">
                        <button type="button" class="btn btn-primary" @click="editTarjeta">Guardar</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" @click="handleClose(false)">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</template>

<script>
export default {
    props: ['isopen' , 'handleClose', 'tarjetaId'],
    async created() {
        await this.getTarjeta()
        await this.getUsuarios()
        await this.getEstados()
        await this.getComentarios()
    },

    data() {
        return {
            tarjeta: null,
            users: [],
            estados: [],
            titulo: '',
            descripcion: '',
            responsable: '',
            estado: '',
            comentarios: [],
            comentario: '',
            fechaInicio: '',
            fechaFin: '',
        }
    },

    methods: {
        async getTarjeta() {
            try {
                const respuesta = await axios.get(`/get/tarjeta/${this.tarjetaId}`)
                this.tarjeta =respuesta.data 
                this.responsable = this.tarjeta.user.id
                this.estado = this.tarjeta.estado.id
                this.titulo = this.tarjeta.titulo
                this.descripcion = this.tarjeta.descripcion
                this.fechaInicio = this.tarjeta.fecha_inicio
                this.fechaFin = this.tarjeta.fecha_fin
                console.log(respuesta.data);
            } catch (error) {
                console.log(error);
            }
        }, 

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

        async saveComentario() {
            try {
                const respuesta = await axios.post('/create/comentario', {
                    id_tarjeta: this.tarjetaId,
                    comentario: this.comentario,
                })
                await this.getComentarios()
            } catch (error) {
                console.log(error);
            }
        }, 

        async getComentarios() {
            try {
                const respuesta = await axios.get(`/get/comentarios/${this.tarjetaId}`)
                this.comentarios =respuesta.data 
                console.log(respuesta.data);
            } catch (error) {
                console.log(error);
            }
        }, 

        async editTarjeta() {
            try {
                const respuesta = await axios.post(`/edit/tarjeta/${this.tarjetaId}`, {
                    titulo: this.titulo,
                    descripcion: this.descripcion,
                    id_estado: this.estado,
                    id_usuario: this.responsable
                })
                this.handleClose(false, this.tarjetaId, true)
            } catch (error) {
                console.log(error);
            }
        },

        calcularFechas() {
            const fecha = new Date()
            const fechaInicio = new Date(this.fechaInicio)
            const fechaFin = new Date(this.fechaFin)
            if(this.fechaFin) {
                const diffTime = Math.abs(fechaFin - fecha);
                const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
                return `Termino hace ${diffDays - 1} dias`
            }else if(this.fechaInicio){
                const diffTime = Math.abs(fecha - fechaInicio);
                const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
                return `Empezará en ${diffDays} dias`
            }
            return ''
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

.custom-height{
    min-height: 200px;
    max-height: 200px;
    border: 1px solid black;
    width: 100%;
}

.custom-height>textarea{
    width: 100%;
    height: 100%;
    overflow-y: auto;
    resize: none;
}

.scroll{
    overflow-y: auto;
    height: 100%;
}
</style>