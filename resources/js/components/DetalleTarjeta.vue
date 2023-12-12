<template>
    <div class="custom-modal d-flex justify-content-center align-items-center" >
        <div class="w-75 bg-white p-3">
            <div class="modal-dialog" role="document">
                <div class="modal-content d-flex flex-column gap-3">
                    <div class="modal-header d-flex gap-3 pb-3 border-bottom">
                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="handleClose(false)">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body d-flex w-100 gap-3">
                        <div class="d-flex flex-column gap-3 w-100">
                            <div class="custom-height p-3 d-flex flex-column">
                                <h4>Descripcion</h4>
                                <textarea></textarea>
                            </div>
                            <div class="custom-height p-3">
                                <h4>Comentarios</h4>
                            </div>
                            <div>
                                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input">
                            </div>
                        </div>
                        <div class="d-flex flex-column gap-3">
                            <div class="d-flex flex-column ">
                                <h3>Responsable</h3>
                                <span>Santiago</span>
                            </div>
                            <div class="d-flex flex-column ">
                                <h3>Estado</h3>
                                <span>In progress</span>
                            </div>
                        </div>
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
</style>