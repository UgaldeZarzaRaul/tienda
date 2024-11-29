<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use Illuminate\Support\Facades\Session;

use App\Models\usuarios;
use DB;

class controlador_usuarios extends Controller
{
    public function usuarios(Request $request){
        // Obtener el valor de la búsqueda
        $buscar = $request->input('buscar');
        
        // Si se ha proporcionado un término de búsqueda, filtramos, de lo contrario traemos todos los registros.
        $usuarios = usuarios::when($buscar, function ($query, $buscar) {
            return $query->where('nombre', 'like', '%' . $buscar . '%');  // Filtrar por nombre
        })->paginate(5);  // Paginar los resultados con 5 usuarios por página
        
        // Pasar los usuarios a la vista con la variable 'usuarios'
        return view('usuarios', compact('usuarios'));
    }

    public function usuario_alta(){
        return view("usuario_alta");
    }

    public function usuario_registrar(Request $request){
        $this->validate($request,[
            'nombre' => 'required',
            'fn' => 'required'
        ]);

        if($request->file('foto') != ''){
            $file = $request->file('foto');
            $img = $file->getClientOriginalName();
            $ldate = date('Ymd_His_');
            $img2 = $ldate . $img;
    
            \Storage::disk('public')->put($img2, \File::get($file));
        }
        else{
            $img2 = "portada.png";
        }
        usuarios::create(array(
            'nombre' => $request->input('nombre'),
            'fn' => $request->input('fn'),
            'foto' => $img2
        ));
        return redirect()->route('usuarios');
    }
    
    public function usuario_detalle($id){
        //dd($id->all());
        $query = usuarios::find($id);
        return view("usuario_detalle")
        ->with(['usuario' => $query]);
    }

    public function usuario_editar($id){
        $query = usuarios::find($id);
        return view("usuario_editar")
        ->with(['usuario' => $query]);
    }
    public function usuario_salvar(usuarios $id, Request $request){
        //dd($id->all());
        if($request->file('foto1') != ''){
            $file = $request->file('foto1');
            $img = $file->getClientOriginalName();
            $ldate = date('Ymd_His_');
            $img2 = $ldate . $img;

            \Storage::disk('local')->put($img2, \File::get($file));
        } 
        else{
            $img2 = $request->foto2;
        }
        //add($request->all());
        $query = usuarios::find($id->id_usuario);
           $query -> nombre = $request -> nombre;
           $query -> fn = $request -> fn;
           $query -> foto = $img2;
        $query -> save();

        return redirect()->route("usuario_editar", ['id' => $id->id_usuario]);

    }
    public function usuario_borrar(usuarios $id){
        $id->delete();
        return redirect()->route('usuarios');
    }
    public function graficos_usuarios(Request $request)
    {
        // Obtener el conteo de usuarios por nombre
        $usuarios = usuarios::select(DB::raw('count(*) as total, nombre'))
            ->groupBy('nombre')
            ->get();
        
        // Obtener los datos de los usuarios para la gráfica
        $labels = $usuarios->pluck('nombre');  // Nombres de los usuarios
        $data = $usuarios->pluck('total');     // Conteo de usuarios por nombre

        // Pasar los datos a la vista
        return view('graficos_usuarios', compact('labels', 'data'));
    }

    
    
}
