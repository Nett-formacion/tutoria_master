<template>
    <div class="flex flex-col justify-center">
        <h1>Cronómetro</h1>
        <div class="border-4 border-green bg-white text-center
             text-green-800 text-4xl w-1/3">
            {{ minutos }} : {{ segundos }} : {{decimas }}
        </div>
        <div class="flex flex-row space-x-4">
            <button @click="start_stop" class ="btn btn-primary btn-xs">{{ label_start_stop }}</button>
            <button @click="reset" class="btn btn-primary btn-xs">Reset</button>
        </div>
    </div>

</template>
<script>
export default {
    name:"cronometro",
    props:['nombre'],
    data(){
        return{
            decimas:0,
            minutos:0,
            segundos:0,
            label_start_stop:"start",
            funcionando : false
        }
    },
    mounted() {
        setInterval(()=>{
            if (this.funcionando){
                this.decimas++;
                if (this.decimas==10){
                    this.decimas=0;
                    this.segundos++;
                    if (this.segundos==60){
                        this.segundos=0;
                        this.minutos++;
                        if (this.minutos==5){
                            this.minutos=0;
                        }
                    }
                }
            }
        }, 100);


    },

    methods:{
        start_stop(){
            this.funcionando=!this.funcionando;
            this.label_start_stop = this.funcionando? "stop":"start";

        },
        reset(){
            this.minutos=0;
            this.segundos=0;
            this.decimas=0;
            this.funcionando=false;

        }

    }

}

</script>

<style scoped>

</style>
