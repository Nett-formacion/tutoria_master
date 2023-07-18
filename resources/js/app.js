
import {createApp} from 'vue';
import cronometro from "./components/cronometro.vue";
import listadoTabla from "./components/listadoTabla.vue";



createApp( {
    components:{
        cronometro,
        listadoTabla,

    }

}).mount("#app")

