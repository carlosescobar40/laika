<template>
    <div class="row">
        <div class="col-12 mb-2">
            <!-- llamamos al componente para Crear   -->
            
            <router-link :to='{name:"crearProduct"}' class="btn btn-success"><i class="fas fa-plus-circle"></i></router-link>
        </div>
        <div class="col-12">             
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th>ID</th>
                                    <th>nombrePro</th>
                                    <th>rack</th>
                                    <th>modulo</th>
                                    <th>nivel</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="product in products" :key="product.id">
                                    <td>{{ product.id }}</td>
                                    <td>{{ product.nombrePro}}</td>
                                    <td>{{ product.rack}}</td>
                                    <td>{{ product.modulo}}</td>
                                    <td>{{ product.nivel}}</td>
                                    <td>
                                        <!-- llamamos al componente para Editar     -->
                                        <router-link :to='{name:"editarProduct",params:{id:product.id}}' class="btn btn-info"><i class="fas fa-edit"></i></router-link>
                                        <a type="button" @click="borrarProduct(product.id)" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                        
                                    </td>
                                </tr>
                            </tbody>
                            
                        </table>
                    </div>                          
        </div>
    </div>
</template>

<script>
export default {
    name:"products",
    data(){
        return {
            products:[]
        }
    },
    mounted(){
        this.mostrarProducts()
    },
    methods:{
        async mostrarProducts(){
            await this.axios.get('/api/product').then(response=>{
                this.products = response.data
            }).catch(error=>{
                console.log(error)
                this.products = []
            })
        },
        borrarProduct(id){
            if(confirm("¿Confirma eliminar el registro?")){
                this.axios.delete(`/api/product/${id}`).then(response=>{
                    this.mostrarProducts()
                }).catch(error=>{
                    console.log(error)
                })
            }
        }
    }
}
</script>