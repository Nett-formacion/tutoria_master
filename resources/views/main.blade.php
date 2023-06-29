<x-layout.app
    title="Proyectos Master" meta-description="Proyectos de alumnos del master desarrollo web fullstak en  Nettformación promoción 2022">
<div class="flex flex-col justify-between m-2 space-y-2  overflow-auto">
    <div class="card w-full h-full bg-base-100 shadow-xl image-full">
        <figure><img src="{{asset('/images/gestion_proyectos_optimizado.png')}}" alt="Proyectos" /></figure>
        <div class="card-body">
            <h2 class="card-title">Gestión de proyectos</h2>
            <p>Consulta proyectos de los alumnos</p>
            <div class="card-actions justify-end">
                <button class="btn btn-primary">Verlos ahora(requiere registro)</button>
            </div>
        </div>
    </div>
    <div class="card w-full h-full bg-base-100 shadow-xl image-full h-full ">
        <figure><img  class =" object-contain" src="{{asset('/images/traductor_optimizado.png')}}" alt="Palabras" /></figure>
        <div class="card-body">
            <h2 class="card-title">Traductor de palabras</h2>
            <p>Prueba a ver tu nivel en los idiomas</p>
            <div class="card-actions justify-end">
                <button class="btn btn-primary">Empezar a jugar</button>
            </div>
        </div>
    </div>
</div>
</x-layout.app>
