<template>
   <Menu />

   <div class="container">
     <div class="row">
        <div class="col-md-12 mt-5 text-center">
          <div class="d-flex justify-content-center">
              <div  class="content-container card">
                 <div class="card-body ">
                   <figure class="text-center ">
                     <blockquote class="blockquote">
                       <h1>Bienvenido al Dashboard.</h1>
                     </blockquote>
                     <figcaption class="blockquote-footer">
                      <p>En el menú podras ver las opciones que tienes disponibles para revisar.</p>
                      <font-awesome-icon icon="fa-solid fa-user-secret" />
                     </figcaption>
                   </figure>
                 </div>
              </div>
            </div>
        </div>
     </div>
   </div>
   
</template>

<script>
import Menu from "@/components/layout/Menu";

export default {
  name: "Home",
  components: {
    Menu,
  },
   setup() {
    return {
    };
  },
};
</script>


<style lang="css">
  .content-container {
    max-width: 900px;
  }
</style>