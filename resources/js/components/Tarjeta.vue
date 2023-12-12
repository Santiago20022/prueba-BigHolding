<template>
    <div class="d-flex flex-column custom-size border border-primary p-3" @click="handleModal(true)">
        <div class="d-flex justify-content-between">
            <div>
                title
            </div>
            <div class="d-flex flex-column gap-3">
                <div>
                    estado
                </div>
                <div>
                    responsable
                </div>
            </div>
        </div>
        <div>
            descripcion
        </div>
    </div>
</template>

<script>

export default {
    props: ['handleModal'],
}
</script>
<style scoped>

.custom-size{
    min-height: 200px;
    max-height: 200px;
}
</style>