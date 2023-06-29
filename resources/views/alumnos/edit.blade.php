<x-layout.app>

<div class=" flex flex-col justify-center items-center">
    <h1 class=" text-4xl text-green-700">Datos nuevo alumno</h1>
    <form action="{{route("alumnos.update",$alumno->id)}}" method="post" class="space-y-4">
        @method("PUT")
        @csrf
        <div>
            <label for="">Nombre</label>
            <input name="nombre" type="text" placeholder="nombre"
                   class="input input-bordered input-primary w-full max-w-xs"
                   value="{{$alumno->nombre}}"
            />

        </div>
        <div><label for="">Edad</label> <input name="edad" type="text" placeholder="edad"
                                               class="input input-bordered input-primary w-full max-w-xs"
                                               value="{{$alumno->edad}}" />
        </div>
        <div>
            <label for="">Email</label> <input name="email" type="text" placeholder="email"
                                               class="input input-bordered input-primary w-full max-w-xs"
                                               value="{{$alumno->email}}" />
        </div>
        <button type="submit" class=" btn btn-primary">Guardar</button>
    </form>
</div>

</x-layout.app>
