<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Http\Requests\StoreAlumnoRequest;
use App\Http\Requests\UpdateAlumnoRequest;

use Illuminate\Support\Facades\Request;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
//        $alumnos = Alumno::paginate(5);
        $filas= Alumno::all();
        $campos = (new Alumno)->getFillable();
        $clave = (new Alumno)->getKeyName();

        $campos = array_merge([$clave], $campos);
        $nombre_tabla="Alumnos";


        $page = Request::get('page')??1;
        return view("alumnos.listado", compact("filas","campos", "nombre_tabla"));
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $page = Request::get('page');
        return view("alumnos.create",compact('page'));
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAlumnoRequest $request)
    {
        $page = Request::get('page');
        $alumno = new Alumno($request->input());
        $alumno->saveOrFail();
        return redirect(route('alumnos.index',compact("page")));
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Alumno $alumno)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Alumno $alumno)
    {
        //
        $page=Request::get('page');
        return view ("alumnos.edit", compact("alumno","page"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAlumnoRequest $request, Alumno $alumno)
    {
        //
        $page = Request::get("page");
        $nuevos_datos_alumno = $request->input();
        $alumno->update($nuevos_datos_alumno);
        return redirect (route("alumnos.index",['page'=>$page]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Alumno $alumno)
    {
        $alumno->delete();
        $alumnos = Alumno::all();
        logger ($alumnos);
        return response()->json($alumnos);

//        return redirect (route("alumnos.index"));




        //
    }
}
