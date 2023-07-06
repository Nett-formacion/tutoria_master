<x-layout.app>

    <listado-tabla
        filas_serializadas='@json($filas)'
        campos_serializados ='@json($campos)'
         nombre_tabla="{{$nombre_tabla}}">
    </listado-tabla>
</x-layout.app>
