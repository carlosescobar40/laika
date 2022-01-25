<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header"><h4>Crear Product</h4></div>
                <div class="card-body">
                    <form @submit.prevent="crear">
                         <div class="row">
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>nombrePro</label>
                                    <input type="text" class="form-control" v-model="product.nombrePro">
                                </div>
                            </div>

                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>rack</label>
                                    <input type="text" class="form-control" v-model="product.rack">
                                </div>
                            </div>

                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>modulo</label>
                                    <input type="text" class="form-control" v-model="product.modulo">
                                </div>
                            </div>

                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>nivel</label>
                                    <input type="text" class="form-control" v-model="product.nivel">
                                </div>
                            </div>
                            
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </div>                          
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name:"crear-product",
    data(){
        return {
            product:{
                nombrePro:"",
                rack:"",
                 modulo:"",
                nivel:"",
            }
        }
    },
    
    methods:{
        
        async crear(){
            await this.axios.post('/api/product',this.product).then(response=>{
                this.$router.push({name:"mostrarProducts"})
            }).catch(error=>{
                console.log(error)
            })
        }
    }
}
</script>