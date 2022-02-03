<template>
    <div>
        <h3 class="text-center">Create Product</h3>
        <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="addProduct">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" v-model="product.product_title">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" class="form-control" v-model="product.description">
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input type="number" class="form-control" v-model="product.price">
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
        </div>
    </div>
</template>

<script>
    export default{
        data(){
            return{product:{}}
               },
        methods:{
            addProduct(){
                this.axios.post(base_url+'api/products', this.product).then(response =>(this.$router.push({name: 'home'})))
                .catch(err=> console.log(err))
                .finally(()=> this.loadin=false)
                         }
                }
               } 
</script>