<template>
    <input
        type="submit"
        href=""
        class="btn btn-danger d-block mb-2 w-100"
        value="Eliminar ×"
    >
</template>

<script>
export default {
    props : ['recetaId'],
    mounted(){
        console.log('receta actual', this.recetaId)
    }
}
</script>
