<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use Illuminate\Support\Facades\Session;

use App\Models\nuevos;

class controladornuevos extends Controller
{
    public function nuevos(Request $request) {

        // Filtrar por búsqueda, si se proporciona
        $buscar = $request->input('buscar');
        
        // Si hay un valor en la búsqueda, aplicar el filtro, de lo contrario obtener todos los registros
        $nuevos = nuevos::when($buscar, function ($query, $buscar) {
            return $query->where('nombre', 'like', '%' . $buscar . '%');  // Suponiendo que quieres buscar por nombre
        })->paginate(5);  // Paginar los resultados con 5 por página
    
        // Pasar los nuevos videojuegos a la vista con la variable 'nuevos'
        return view('nuevos', compact('nuevos'));
    }
    

    public function nuevo_alta(){
        return view("nuevo_alta");
    }

    public function nuevo_registrar(Request $request){
        $this->validate($request,[
            'nombre' => 'required',
            'precio' => 'required'
        ]);

        
        nuevos::create(array(
            'nombre' => $request->input('nombre'),
            'precio' => $request->input('precio')
        ));
        return redirect()->route('nuevos');
    }
    
    public function nuevo_detalle($id){
         //dd($id->all());
        $query = nuevos::find($id);
        return view("nuevo_detalle")
        ->with(['nuevo' => $query]);
    }

    public function nuevo_editar($id){
        $query = nuevos::find($id);
        return view("nuevo_editar")
        ->with(['nuevo' => $query]);
    }
    public function nuevo_salvar(nuevos $id, Request $request){
        
        //add($request->all());
        $query = nuevos::find($id->id_nuevo);
           $query -> nombre = $request -> nombre;
           $query -> precio = $request -> precio;
        $query -> save();

        return redirect()->route("nuevo_editar", ['id' => $id->id_nuevo]);

    }
    public function nuevo_borrar(nuevos $id){
        $id->delete();
        return redirect()->route('nuevos');
    }
    public function graficos()
    {
        // Obtener todos los videojuegos nuevos
        $nuevos = nuevos::all();

        // Extraer los nombres y precios para las gráficas
        $nombres = $nuevos->pluck('nombre');
        $precios = $nuevos->pluck('precio');

        // Pasar los datos a la vista
        return view('graficos_nuevos', compact('nombres', 'precios'));
    }
    
    
}
