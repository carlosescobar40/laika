<template>
    <div class="row">
        <div class="col-12 mb-2">
            
            
        </div>
        <div class="col-12">             
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="bg-primary text-white">
                                <tr>
                                    
                                    <th>ID</th>
                                    <th>comentario</th>
                                    <th>product_id</th>
                                    <th>user_id</th>
                                    <th>created_at</th>
                                    <th>updated_at</th>
                                
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="inf_movimiento in inf_movimientos" :key="inf_movimiento.id">
                                   <td>{{ inf_movimiento.id }}</td>
                                    <td>{{ inf_movimiento.comentario}}</td>
                                    <td>{{ inf_movimiento.user_id}}</td>
                                    <td>{{ inf_movimiento.created_at}}</td>
                                    <td>{{ inf_movimiento.updated_at}}</td>
                                    <td>
                                        
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
    name:"inf_movimientos",
    data(){
        return {
            inf_movimientos:[]
        }
    },
    mounted(){
        this.mostrarProducts()
    },
    methods:{
        async mostrarProducts(){
            await this.axios.get('/api/mostrarinf').then(response=>{
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