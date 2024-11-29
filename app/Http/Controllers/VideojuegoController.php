<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Session;

use App\Models\videojuego;

class VideojuegoController extends Controller
{
    //.....................................................videojuego: Lista........
    public function videojuego(){
        return view('videojuego')
        ->with(['videojuego' => videojuego::all()]);
    }
    //.....................................................videojuego: ALTA.........
    public function videojuego_alta(){
        return view("videojuego_alta");
    }
    //.....................................................videojuego: REGISTRAR.....
    public function videojuego_registrar(Request $request){

            $this->validate($request,[
                'nombrej' => 'required',
                'plataforma' => 'required',
                'condicion' => 'required'
            ]);

        
        //..........
        
        videojuego::create(array(
            'nombrej' => $request->input("nombrej"),
            'plataforma' => $request->input("plataforma"),
            'condicion' => $request->input("condicion")
        ));

        return redirect()->route('videojuego');
        }

    //....................................................videojuego: detalle.....
        public function videojuego_detalle($id){
            $query = videojuego::find($id);
            return view("videojuego_detalle")
                ->with(['videojuego' => $query]);
    }
    //.....................................................videojuego: EDITAR.....

        public function videojuego_editar($id){
            $query = videojuego::find($id);
            return view("videojuego_editar")
                ->with(['videojuego' => $query]);
        }

    //.....................................................videojuego: SALVAR.....

    public function videojuego_salvar(videojuego $id, Request $request){

        //dd($request->all());
        $query = videojuego::find($id->id_videojuego);
            $query -> nombrej = $request -> nombrej;
            $query -> plataforma = $request -> plataforma;
            $query -> condicion = $request -> condicion;
        $query -> save();

        return redirect()->route("videojuego_editar", ['id' => $id->id_videojuego]);
        }

        //..................................................videojuego: Borrar.....
        public function videojuego_borrar (videojuego $id){
        $id->delete();
        return redirect()->route('videojuego'); 
        }

    
}