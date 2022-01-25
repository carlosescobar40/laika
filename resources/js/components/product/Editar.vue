<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header"><h4>editar product</h4></div>
                <div class="card-body">
                    <form @submit.prevent="actualizar">
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
    name:"editar-product",
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
    mounted(){
        this.mostrarProduct()
    },
    methods:{
        async mostrarProduct(){
            await this.axios.get(`/api/product/${this.$route.params.id}`).then(response=>{
                const { nombrePro, rack ,modulo,nivel } = response.data;
                this.product.nombrePro = nombrePro;
                this.product.rack = rack;
                this.product.modulo = modulo;
                this.product.nivel = nivel;
            }).catch(error=>{
                console.log(error)
            })
        },
        async actualizar(){
            await this.axios.put(`/api/product/${this.$route.params.id}`,this.product).then(response=>{
                this.$router.push({name:"mostrarProducts"})
            }).catch(error=>{
                console.log(error)
            })
        }
    }
}
</script>