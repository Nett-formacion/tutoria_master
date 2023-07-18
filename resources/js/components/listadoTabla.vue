<template>
    <div class="overflow-x-auto">
        <button  @click="add" class="btn btn-primary">Añadir un nuevo Alumno </button>
        <table class="table table-xs table-pin-rows table-pin-cols">
            <caption>{{ nombre_tabla }}</caption>
            <thead>
            <th v-for="campo in campos" >
                <button class="btn btn-sm" @click="ordenar(campo)">
                    {{ campo }}
                    <svg v-if="ascendente[campo]" class = "h-6 w-6" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3"></path>
                    </svg>
                    <svg v-else class = "h-6 w-6"  fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5"></path>
                    </svg>

                </button>
            </th>
            <th colspan="2">Opciones</th>
            <tr>
                <th v-for="campo in campos">
                    <input class="p-2 border rounded border-blue-600" type="text"
                           v-model="filtro[campo]" id="" @keyup="filtrar(campo)">
                </th>
            </tr>



            </thead>
            <tbody>
            <tr v-for="fila in filas.data">
                <td v-for="valor in fila">
                    {{ valor }}
                </td>
                <td><!--Editar-->
                    <button @click="editar(fila.id)">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor"
                             class="w-6 h-6 text-blue-300 hover:text-blue-800">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10"/>
                        </svg>
                    </button>
                </td>
                <td><!--Borrar-->
                    <button @click="borrar(fila.id)">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" class="w-6 h-6 text-red-300 hover:text-red-800">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"/>
                        </svg>
                    </button>
                </td>

            </tr>

            </tbody>
        </table>
        <hr/>
        <TailwindPagination :data ="filas" @pagination-change-page="getResults"/>
    </div>
</template>
<script>
import axios from "axios";
import {TailwindPagination} from "laravel-vue-pagination";

export default {
    name: "listado-tabla",
    components: {TailwindPagination},
    props: ["filas_serializadas", "campos_serializados", "nombre_tabla"],
    data() {
        return {
            filas: Object,
            campos: [],
            ascendente:{},
            filtro:{}
        }
    },
    created() {
        this.filas = JSON.parse(this.filas_serializadas);
        this.campos = JSON.parse(this.campos_serializados);
        this.campos.forEach((campo)=>{
            this.ascendente[campo]=true;
            this.filtro [campo]="";
        })
    },
    methods: {
        add(){
            console.log(this.filas);
            let page = this.filas.last_page;
            page = this.filas.total % this.filas.per_page ==0? ++page : page
            let url =window.location.href;

            //url = url.replace(/\?page=\d+/,"");
            url = url.replace(/\?page=\d+/,'');

            window.location =  url+"/create?page="+page;
        },
        editar(id) {
            let url = window.location;
            let page = this.filas.current_page;


            url = url + "/" + id + "/edit?page="+page;
            window.location = url;
        },
        borrar(id) {
            let page = this.filas.current_page;

            let url = window.location.href;
            url = url.replace(/\?page=\d+/,'');

            url = url + "/" + id+"?page="+page;
            console.log("URL en delete " + url);
            axios.delete(url)
                .then((response) => {
                    this.filas = response.data;
                })
                .catch((error) => {
                    console.log("Error " + error);

                });
        },
        getResults(page){
            //Pedir al servidor la página de datos page
            //localhost:8000/alumnos?page=5
            let url = window.location+"/paginate?page="+page;
           axios.get(url)
               .then((response)=>
                   this.filas=response.data
               )
               .catch((error)=>
                   console.log("Error " + error)
               )
           ;
        },
        ordenar(campo){
            this.ascendente[campo]=!this.ascendente[campo]
            this.filas.data.sort((a,b)=>
            {
                if (a[campo]>b[campo])
                    return  this.ascendente[campo]? 1: -1
                if (a[campo]<b[campo])
                    return this.ascendente[campo]? -1: 1
                if (a[campo]==b[campo])
                    return 0;
            }
            );

        },
        filtrar(campo) {
            const valorFiltro = this.filtro[campo]
            const  datos = JSON.parse(this.filas_serializadas);
            this.filas.data = datos.data.filter(function (fila) {
                const valorCampo = fila[campo].toString(); // Convertir a string si es necesario
                return valorCampo.toLowerCase().startsWith(valorFiltro.toLowerCase());
            });
        }


    }
}
</script>
<style scoped>
</style>


<script>
</script>

<style scoped>

</style>
