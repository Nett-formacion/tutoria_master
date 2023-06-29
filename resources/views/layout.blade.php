<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="@yield('metaDescription')">
    <title>@yield('title')</title>

    @vite("resources/css/app.css")
</head>

<body>
<header class="h-15vh bg-header flex flex-row justify-between mx-5 p-2">
    <img src="{{asset("/images/nett.jpeg")}}" alt="logo">
    <h1 class = "text-4xl text-red-600">Proyectos de alumnos</h1>
    <form action="">
        <button class="btn btn-primary" type="submit">Login/Logout</button>
    </form>

</header>
<nav class="  h-10vh bg-nav, flex flex-row justify-start mx-3  space-x-4">
    <a  class="btn btn-group-horizontal" href="about">About</a>
    <a class="btn btn-group-horizontal" href="contacta">Contacta</a>
    <a class="btn btn-group-horizontal" href="alumnos">Alumnos</a>
    <a class="btn btn-group-horizontal" href="proyectos">Proyectos</a>
</nav>
<main class="h-65vh
bg-gradient-to-r from-main_left via-red-400 to-main_right
 flex flex-row justify-center ">
    @yield("main")
</main>
<footer class="text-white h-10vh bg-footer flex flex-row justify-center ">
    @ copyright
    <div class="mx-10 space-x-5" >
        <a href="facebook">Facebook</a>
        <a href="github">Github</a>
        <a href="twiter">Twiter</a>
        <a href="instagram">Instagram</a>
        <a href="whatsapp">Whasapp</a>
    </div>
</footer>
</body>
</html>
