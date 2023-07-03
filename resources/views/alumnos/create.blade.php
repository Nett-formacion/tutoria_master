<x-layout.app>

<div class=" flex flex-col justify-center items-center">
    <h1 class=" text-4xl text-green-700">Datos nuevo alumno</h1>
{{--    @if ($errors->any())--}}
{{--        @foreach($errors->all() as $error)--}}
{{--            <div class="text-red-600 text-xs">{{$error}}</div>--}}
{{--        @endforeach--}}
{{--    @endif--}}

    <form action="{{route("alumnos.store",['page'=>$page])}}" method="post" class="space-y-4">
        @csrf

        <div>
            <label for="">Nombre</label>
            <input name="nombre" type="text" placeholder="nombre"
                   value="{{old("nombre")}}"
                   class="input input-bordered input-primary w-full max-w-xs"/>

        </div>
        @error("nombre")
            <div class="text-red-600 text-xs"> {{$message}} </div>
        @enderror
        <div><label for="">Email</label> <input name="email" type="text" placeholder="email"
                                                value="{{old("email")}}"
                                               class="input input-bordered input-primary w-full max-w-xs"/>
        </div>
        @error("email")
        <div class="text-red-600 text-xs"> {{$message}} </div>
        @enderror

        <div>
            <label for="">Edad</label>
            <input name="edad" type="text" placeholder="edad"
                   value="{{old("edad")}}"
                                               class="input input-bordered input-primary w-full max-w-xs"/>
        </div>
        @error("edad")
        <div class="text-red-600 text-xs"> {{$message}} </div>
        @enderror

        <button type="submit" class=" btn btn-primary">Guardar</button>
    </form>
</div>

</x-layout.app>
