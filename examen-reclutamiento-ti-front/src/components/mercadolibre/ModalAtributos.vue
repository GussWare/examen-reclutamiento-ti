<template lang="">
       <div>
            <b-button v-b-modal.modal-atributos>Atributos</b-button>

            <b-modal id="modal-atributos" title="Listado de Atributos">
                <p class="my-4">Modal de Atributos!</p>
            </b-modal>
        </div>
</template>

<script>
export default {
     name: "ModalAtributos",
     props:{
        attributes:[]
     }
}
</script>
<style lang="">
    
</style>