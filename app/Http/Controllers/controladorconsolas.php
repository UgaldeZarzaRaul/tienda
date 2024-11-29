<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use Illuminate\Support\Facades\Session;

use App\Models\consolas;


class controladorconsolas extends Controller
{
    public function consolas(Request $request){
        // Obtener el valor de la búsqueda
        $buscar = $request->input('buscar');
        
        // Si se ha proporcionado un término de búsqueda, filtramos, de lo contrario traemos todos los registros.
        $consolas = consolas::when($buscar, function ($query, $buscar) {
            return $query->where('nombre', 'like', '%' . $buscar . '%')  // Filtrar por nombre de la consola
                         ->orWhere('marca', 'like', '%' . $buscar . '%');  // También buscar por marca
        })->paginate(5);  // Paginar los resultados con 5 consolas por página
        
        // Pasar las consolas a la vista con la variable 'consolas'
        return view('consolas', compact('consolas'));
    }

    public function consola_alta(){
        return view("consola_alta");
    }

    public function consola_registrar(Request $request){
        $this->validate($request,[
            'nombre' => 'required',
            'clave' => 'required',
            'marca' => 'required'
        ]);

        
        consolas::create(array(
            'nombre' => $request->input('nombre'),
            'clave' => $request->input('clave'),
            'marca' => $request->input('marca')
        ));
        return redirect()->route('consolas');
    }
    
    public function consola_detalle($id){
         //dd($id->all());
        $query = consolas::find($id);
        return view("consola_detalle")
        ->with(['consola' => $query]);
    }

    public function consola_editar($id){
        $query = consolas::find($id);
        return view("consola_editar")
        ->with(['consola' => $query]);
    }
    public function consola_salvar(consolas $id, Request $request){
        
        //add($request->all());
        $query = consolas::find($id->id_consola);
           $query -> nombre = $request -> nombre;
           $query -> clave = $request -> clave;
           $query -> marca = $request -> marca;
        $query -> save();

        return redirect()->route("consola_editar", ['id' => $id->id_consola]);

    }
    public function consola_borrar(consolas $id){
        $id->delete();
        return redirect()->route('consolas');
    }
    public function graficos_consolas()
    {
        // Obtener todas las consolas
        $consolas = consolas::all();

        // Extraer los nombres y las marcas para la gráfica de barras
        $nombres = $consolas->pluck('nombre');
        $marcas = $consolas->pluck('marca');

        // Contar cuántas consolas hay por marca (esto se usará para la gráfica de pastel)
        $marca_counts = $consolas->groupBy('marca')->map->count();

        // Pasar los datos a la vista
        return view('graficos_consolas', compact('nombres', 'marcas', 'marca_counts'));
    }
}
