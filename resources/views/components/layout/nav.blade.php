<nav {{$attributes->merge(['class'=>"hidden md:block h-5vh  bg-gray-100 flex flex-row  flex-wrap overflow-auto
justify-start mx-3 my-1  "])}}>

    <a class="btn btn-primary " href="{{route('about')}}">About</a>
    <a class="btn btn-secondary " href="{{route('contacta')}}">Contacta</a>
    @auth
    <a class="h-full btn btn-warning" href="{{route('alumnos.index')}}">Alumnos</a>
    <a class="h-full btn btn-error" href="{{route('proyectos')}}">Proyectos</a>
    @endauth
</nav>
<nav class="block md:hidden flex flex-col justify-center" >
    <a class="btn w-full hover:bg-blue-300 hover:text-white transition duration-300" href="{{route('about')}}">About</a>
     <a class="btn w-full hover:bg-blue-300 hover:text-white transition duration-300" href="{{route('contacta')}}">Contacta</a>
    <a class=" btn w-full hover:bg-blue-300 hover:text-white transition duration-300" href="{{route('alumnos.index')}}">Alumnos</a>
    <a class=" btn w-full hover:bg-blue-300 hover:text-white transition duration-300" href="{{route('proyectos')}}">Proyectos</a>
</nav>

