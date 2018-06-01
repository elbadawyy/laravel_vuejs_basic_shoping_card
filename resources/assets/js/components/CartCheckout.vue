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
                console.log('respone',response.data)
                this.products = response.data;
                console.log('this.products ',this.products );
            }
        });

  },
  methods: {
   removeFromCart(product){
   }
  }
}
</script>
<style>
  .image {
    width: 100%;
    display: block;
  } 
</style>