<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use Illuminate\Support\Facades\Session;

use App\Models\digitales;

class controladordigitales extends Controller
{
    public function digitales(Request $request){
        // Obtener el valor de búsqueda
        $buscar = $request->input('buscar');
        
        // Si se ha proporcionado un término de búsqueda, filtramos, de lo contrario traemos todos los registros.
        $digitales = digitales::when($buscar, function ($query, $buscar) {
            return $query->where('nombre', 'like', '%' . $buscar . '%');  // Filtrar por nombre
        })->paginate(5);  // Paginación, mostrando 5 videojuegos digitales por página
        
        // Pasar los resultados a la vista
        return view('digitales', compact('digitales'));
    }

    public function digital_alta(){
        return view("digital_alta");
    }

    public function digital_registrar(Request $request){
        $this->validate($request,[
            'nombre' => 'required',
            'precio' => 'required'
        ]);

        
        digitales::create(array(
            'nombre' => $request->input('nombre'),
            'precio' => $request->input('precio')
        ));
        return redirect()->route('digitales');
    }
    
    public function digital_detalle($id){
         //dd($id->all());
        $query = digitales::find($id);
        return view("digital_detalle")
        ->with(['digital' => $query]);
    }

    public function digital_editar($id){
        $query = digitales::find($id);
        return view("digital_editar")
        ->with(['digital' => $query]);
    }
    public function digital_salvar(digitales $id, Request $request){
        
        //add($request->all());
        $query = digitales::find($id->id_digital);
           $query -> nombre = $request -> nombre;
           $query -> precio = $request -> precio;
        $query -> save();

        return redirect()->route("digital_editar", ['id' => $id->id_digital]);

    }
    public function digital_borrar(digitales $id){
        $id->delete();
        return redirect()->route('digitales');
    }
    public function graficos(){
        // Obtener todos los videojuegos digitales
        $digitales = digitales::all();
        
        // Pasar los datos a la vista de gráficos
        return view('graficos', compact('digitales'));
    }
}
