<template>
   <Menu />

   <div class="container">
       <div class="row">
          <div class="col-md-12 mt-5 ">
              <h1>Mercado LIbre</h1>
          </div>
        </div>

        <br /><br /><br />

        <font-awesome-icon icon="fa-sharp fa-solid fa-list" />

        <div class="row">
            <div class="col-12">
                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <th>Id</th>
                            <th>Titulo</th>
                            <th>Cantidad Disponible</th>
                            <th>Precio</th>
                            <th></th>
                            <th></th>
                        </tr>
                        <tr v-for="product in products" :key="product.id">
                            <td>{{product.id}}</td>
                            <td>{{product.title}}</td>
                            <td>{{product.quantity}}</td>
                            <td>{{product.price}}</td>
                            <td><ModalAtributos :atributes="product.attributes" /></td>
                            <td><ModalVariaciones :variations="product.variations" /></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
   </div>
   
</template>

<script>
import { ref } from "vue";
import {onMounted}  from "vue"
import Menu from "@/components/layout/Menu";
import MercadoLibreRemoteService from "@/services/mercadolibre/MercadoLibreRemote.Service";

import ModalAtributos from "@/components/mercadolibre/ModalAtributos.vue"
import ModalVariaciones from "@/components/mercadolibre/ModalVariaciones.vue"

export default {
  name: "MercadoLibre",
  components: {
    Menu,
    ModalAtributos,
    ModalVariaciones
  },
    setup() {
        let products = [
          {
                id : 1,
                title: 'sdfsdf',
                quantity: 5,
                price:10,
                attributes:[],
                variations:[]
              }
        ];

        onMounted(() => {
          MercadoLibreRemoteService.findAll().then((res) => {
            let itemproduct = {
                  id : res.id,
                  title: res.title,
                  quantity: res.available_quantity,
                  price:res.price,
                  attributes:res.attributes,
                  variations:res.variations
                };

                products.push(itemproduct);
          });
        });
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