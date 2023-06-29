<x-layout.app>

<div class=" flex flex-col justify-center items-center">
    <h1 class=" text-4xl text-green-700">Datos nuevo alumno</h1>
    <form action="{{route("alumnos.store")}}" method="post" class="space-y-4">
        @csrf

        <div>
            <label for="">Nombre</label>
            <input name="nombre" type="text" placeholder="nombre"
                   class="input input-bordered input-primary w-full max-w-xs"/>

        </div>
        <div><label for="">Email</label> <input name="email" type="text" placeholder="edad"
                                               class="input input-bordered input-primary w-full max-w-xs"/>
        </div>
        <div>
            <label for="">Dirección</label> <input name="direccion" type="text" placeholder="email"
                                               class="input input-bordered input-primary w-full max-w-xs"/>
        </div>
        <button type="submit" class=" btn btn-primary">Guardar</button>
    </form>
</div>

</x-layout.app>
