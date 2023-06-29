<x-layout.app>
<div class = "flex flex-col space-y-4">
    <a href="" class="btn btn-primary">Nuevo alumno</a>
    <hr>
    <h1 class="text-green-700 text-4xl ">Listado de alumnos</h1>

    <div class="overflow-x-auto flex flex-col">



        <table class="text-4xl table table-xs table-pin-rows table-pin-cols">
            <thead>
            <tr class="text-2xl">
                <th>Nombre</th>
                <th>Email</th>
                <th>Edad</th>

            </tr>
            </thead>
            <tbody>
            @foreach($alumnos as $alumno)
                <tr>
                    <td>{{$alumno->nombre}}</td>
                    <td>{{$alumno->edad}}</td>
                    <td>{{$alumno->email}}</td>
                </tr>
            @endforeach

            </tbody>
            <tfoot>
            <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Edad</th>
            </tr>
            </tfoot>
        </table>
    </div>
</div>
</x-layout.app>
