<template>
   <Menu />

   <div class="container">
     <div class="row">
        <div class="col-md-12 mt-5 ">
          <h1>Pagina Crud</h1>
        </div>
     </div>
   </div>
   
</template>

<script>
import { ref } from "vue";
import Menu from "@/components/layout/Menu";
import MercadoLibreRemoteService from "@/services/mercadolibre/MercadoLibreRemote.Service";

export default {
  name: "Crud",
  components: {
    Menu,
  },
   setup() {
   let products = MercadoLibreRemoteService.findAll();

    return {
      products
    };
  },
};
</script>


<style lang="css">
  .content-container {
    max-width: 900px;
  }
</style>