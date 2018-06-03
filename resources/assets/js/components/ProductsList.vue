<template>
<v-app id="product-list" >
    <v-alert :value="addedAlert" type="success">
        Product Has Been Added
    </v-alert>
    <v-container grid-list-md text-xs-center>
    <v-layout row wrap>
      <v-flex class="card-container" xs1 sm2 offset-sm2 :key="`product-${index}`" v-for="(product, index) in products">
        <v-card >
          <v-card-media :src="product.product_img" height="100px">
          </v-card-media>
          <v-card-title primary-title >
            <div>
              <h3 class="headline mb-0">{{product.product_name}}</h3>
            </div>
          </v-card-title>
          <v-list-tile-sub-title style="padding-left: 16px;">Price :{{ product.product_price}}$</v-list-tile-sub-title>
          <v-card-actions class="quantity_input">
            <v-text-field :id="`product_quantity_${product.product_id}`" label="Amount" value="1" type="number" ></v-text-field>
          </v-card-actions>
          <v-card-actions>
            <v-btn @click="addToMyCart(product.product_id)" flat color="orange">Add To My Cart</v-btn>
          </v-card-actions>
        </v-card>
      </v-flex>
      <br>
      <v-card-text style="height: 300px;" class="grey lighten-5 text-xs-center">
                <v-btn color="primary" @click.native="true" href="/index.php/checkout">
                Check Out Now >
                </v-btn>
        </v-card-text>
    </v-layout>
    </v-container>
     
  </v-app>
</template>

<script>
    export default {
        data () {
            return {
                products: [],
                addedAlert:false
            }
        },
        mounted() {
            axios.get('ajax/getAllproducts', { })
                .then((response)=>{
                    if(response){
                        this.products = response.data;
                        console.log("prod=>",this.products);

                    }
                });
        },
        methods:{
            addToMyCart:function(product_id){
                var product_quantity=document.getElementById('product_quantity_'+product_id).value;
                if( !product_id || !product_quantity )
                {
                    return ;
                }
                axios.post('ajax/addToMyCart', { product_id:product_id, product_quantity:product_quantity })
                .then((response)=>{
                    console.log('added to my cart');
                    document.getElementById('product_quantity_'+product_id).value=1;
                    this.addedAlert=true;
                    setTimeout(()=>this.addedAlert=false,2000)
                });
                // console.log('product_id',product_id,'quant',product_quantity)
            },
        }
    }
</script>
<style lang="scss" scoped>
.list__tile__sub-title{
    text-align: left;
}
.card-container{
    margin-left: 10px;
    margin-bottom: 10px;
}
.card__title card__title--primary{
    padding-top: 0px;
}
.quantity_input{
    padding-left: 10px;
    padding-right: 10px;
}
</style>
