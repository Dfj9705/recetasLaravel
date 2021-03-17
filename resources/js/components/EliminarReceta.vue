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
            this.$swal.fire({
                title: '¿Deseas eliminar esta receta?',
                text: "Este cambio no se puede deshacer",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, eliminar',
                cancelButtonText: 'No'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.$swal({
                        title : "Receta Eliminada",
                        text : "Se eliminó la receta",
                        icon : "success"
                    })
                }
            })
        }
    }
}
</script>
