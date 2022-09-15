<template lang="">
       <div>
            <b-button v-b-modal.modal-variaciones>Variaciones</b-button>

            <b-modal id="modal-variaciones" title="Listado de Variaciones">
                <p class="my-4">Modal de Variaciones!</p>
            </b-modal>
        </div>
</template>

<script>
export default {
     name: "ModalVariaciones",
     props:{
        variations:[]
     }
}
</script>
<style lang="">
    
</style>