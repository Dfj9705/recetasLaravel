<template>
    <input
        type="submit"
        href=""
        class="btn btn-danger d-block mb-2 w-100"
        value="Eliminar ×"
        @click="eliminarReceta"
    >
</template>

<script>
export default {
    props : ['recetaId'],
    methods:{
        eliminarReceta(){
            console.log("click", this.recetaId)
        }
    }
}
</script>
