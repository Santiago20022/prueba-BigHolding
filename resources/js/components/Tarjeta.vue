<template>
    <div class="d-flex flex-column custom-size border border-primary p-3" @click="handleModal(true)">
        <div class="d-flex justify-content-between">
            <div>
               {{ tarjeta.titulo }}
            </div>
            <div class="d-flex flex-column gap-3">
                <div>
                    {{ tarjeta.estado.nombre }}
                </div>
                <div>
                    {{ tarjeta.user.name}}
                </div>
            </div>
        </div>
        <div>
            {{ tarjeta.descripcion }}
        </div>
    </div>
</template>

<script>

export default {
    props: ['handleModal', 'tarjeta'],
}
</script>
<style scoped>

.custom-size{
    min-height: 200px;
    max-height: 200px;
}
</style>