<template>
  <div>

    <table class="table">
        <tbody>
        <tr v-for="(product, index) in products ">
            <td>{{ product.product_name }}</td>
            <td>{{ product.product_desc }}</td>
            <td>Price : {{ product.product_price }} $</td>
            <td>Quantity : {{product.product_quantity}} </td>
            <td>
            <button class="btn btn-sm btn-danger" @click="">&times;</button>
            </td>
        </tr>
        <tr>
            <th></th>
            <th>Total 0000</th>
            <th></th>
        </tr>
        </tbody>
    </table>
    <v-card-text style="height: 300px;" class="grey lighten-5 text-xs-center">
      <v-btn color="blue" style="color:white;" @click.native="true" href="/index.php/shop">
      Go Back Shopping 
      </v-btn>
    </v-card-text> 
  </div>
</template>
<script>
export default {
  data() {
    return {
        products: [
        ]
    };
  },
  mounted(){
      axios.get('ajax/getAllCartItem', { })
        .then((response)=>{
            if(response){
                this.products = response.data;
            }
        });

  },
  methods: {
  }
}
</script>
<style>
  .image {
    width: 100%;
    display: block;
  } 
</style>