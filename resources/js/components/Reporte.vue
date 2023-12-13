<template>
    <div class="d-flex flex-column gap-3 p-5">
        <div class="d-flex w-100 justify-content-end gap-3">
            <button class="btn btn-primary" @click="descargarReporte">Descargar reporte</button>
            <a class="btn btn-outline-secondary" href="/">volver al tablero</a>
        </div>
        <table class="table" id="reporte">
            <thead class="table-light">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Titulo</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Responsable</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Fecha de inicio</th>
                    <th scope="col">Fecha fin</th>
                </tr>
            </thead>
            <tbody>
                <tr v-if="!tarjetas.length">
                    <td colspan="7">No hay registros creados aun</td>
                </tr>
                <tr v-for="tarjeta in tarjetas">
                    <th>{{ tarjeta.id }}</th>
                    <th>{{ tarjeta.titulo }}</th>
                    <th>{{ tarjeta.descripcion }}</th>
                    <th>{{tarjeta.user.name }}</th>
                    <th>{{ tarjeta.estado.nombre }}</th>
                    <th>{{ tarjeta.fecha_inicio }}</th>
                    <th>{{ tarjeta.fecha_fin }}</th>
                </tr>
            </tbody>
          </table>
    </div>
</template>

<script>
import html2pdf from 'html2pdf.js'
export default {
    data() {
        return{
            tarjetas: [],
        }
    },
    
    async created() {
        await this.getTarjetas()
    },

    methods: {
        async getTarjetas() {
            try {
                const respuesta = await axios.get(`/get/tarjetas`)
                this.tarjetas = respuesta.data
                console.log(respuesta.data);
            } catch (error) {
                console.log(error);
            }
        }, 

        descargarReporte() {
            html2pdf(document.getElementById('reporte'),{
                margin: 1,
                filename: `ListadoDeTarjetas`,
            })
        }
    }
}

</script>