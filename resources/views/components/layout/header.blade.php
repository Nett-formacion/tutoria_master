{{--Para desktop--}}
<header {{$attributes->merge(['class'=>"hidden md:flex  bg-slate-100  flex-row
 items-center justify-center  md:justify-between
 p-1"])}}>
    <img class="h-full w-1/4 items-center hidden md:block " src="{{asset("/images/nett.jpeg")}}" alt="logo">
    <h1 class="w-2/4 font-mono text-center md:block text-6xl  font-bold ext- text-red-800">Proyectos de
        alumnos</h1>
    @auth
        <form class=" text-center hidden w-1/4 md:block mr-5" action="logout" method="post">
            @csrf
            <button class="btn btn-primary" type="submit">Logout {{auth()->user()->name}}</button>
        </form>
    @endauth
    @guest
        <form action="login" method="post">
            @csrf
            <div class="space-x-2 ">
                <input class ="input  text-xs" type="text" name="email" placeholder="email">
                <input  class ="input  text-xs" type="password" name="password" placeholder="password">
            </div>
            <div class="space-x-3">
                <x-primary-button class="mt-2">Login</x-primary-button>
                <x-a-button href="register"> Register</x-a-button>
            </div>
        </form>

    @endguest

</header>
{{--Para móbile md--}}
<header class="block md:hidden h-15vh bg-slate-100  flex-col md:flex-row
 items-center justify-center  md:justify-between mb-2 ">
    <img class="h-3/4 p-1 m-1 block md:hidden " src="{{asset("/images/nett_movil.png")}}" alt="logo">
    <div class="h-1/4 flex flex-row justify-between  items-center ">
    <button >
            <svg class="h-8 w-8" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"
                 xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"></path>
            </svg>
        </button>
        <form class="" action="">
            <button class="btn btn-primary btn-xs  text-center " type="submit">Login/Logout</button>
        </form>
    </div>
</header>

