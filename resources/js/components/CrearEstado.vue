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
                                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput2">Descripcion</label>
                                <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Another input">
                            </div>
                        </section>
                    </div>
                    <div class="modal-footer d-flex justify-content-end gap-3">
                        <button type="button" class="btn btn-primary">Save changes</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" @click="handleClose(false)">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</template>

<script>
export default {
    props: ['isopen' , 'handleClose'],
    created() {
        console.log('entre');
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