<template>
    <div>
        <h2 class="text-center">Products List <span style="margin-left:20px"><a href="api/export-product-csv" class="btn btn-primary">Export CSV</a></span></h2>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="product in products" :key="product.id">
                    <td>{{product.id}}</td>
                    <td>{{product.product_title}}</td>
                    <td>{{product.description}}</td>
                     <td>${{product.price}}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <router-link :to="{name: 'edit', params: {id: product.id}}" class="btn btn-success">Edit</router-link>
                            <button class="btn btn-danger" @click="deleteProduct(product.id)">Delete</button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default{
       data(){
          return{
              products:[]
              }
        },
       created(){
            this.axios.get(base_url+ 'api/products/').then(response => {
                this.products = response.data;
             });
        },
       methods:{
           deleteProduct(id){
                this.axios.delete(base_url + 'api/products/${id}').then(response =>{
                    let i=this.products.map(data=>data.id).indexOf(id);
                    this.products.splice(i, 1)
                });
            }
        }
    } 
</script>