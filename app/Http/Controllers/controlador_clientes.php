<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Session;
use App\Models\clientes;

class controlador_clientes extends Controller
{
    // Mostrar todos los clientes
    public function clientes(){
        return view('clientes')
            ->with(['clientes' => clientes::all()]);
    }

    // Mostrar el formulario para agregar un nuevo cliente
    public function cliente_alta(){
        return view("cliente_alta");
    }

    // Registrar un nuevo cliente
    public function cliente_registrar(Request $request){
        $this->validate($request, [
            'nombre' => 'required',
            'contraseña' => 'required'
        ]);

        clientes::create([
            'nombre' => $request->input('nombre'),
            'contraseña' => $request->input('contraseña')
        ]);

        return redirect()->route('clientes');
    }

    // Mostrar detalles de un cliente por ID
    public function cliente_detalle($id)
    {
        // Encuentra el cliente usando el ID
        $cliente = clientes::find($id);

        // Verifica si el cliente fue encontrado
        if (!$cliente) {
            return redirect()->route('clientes')->with('error', 'Cliente no encontrado');
        }

        // Pasa la variable cliente a la vista
        return view("cliente_detalle")->with(['cliente' => $cliente]);  // Usamos 'cliente' como variable
    }

    // Mostrar formulario de edición de cliente
    public function cliente_editar($id){
        $cliente = clientes::find($id);
        return view("cliente_editar")
            ->with(['cliente' => $cliente]);
    }

    // Guardar cambios de un cliente editado
    public function cliente_salvar(clientes $id, Request $request){
        $cliente = clientes::find($id->id_cliente);  // Aquí usamos el $id del modelo cliente
        $cliente->nombre = $request->nombre;
        $cliente->contraseña = $request->contraseña;
        $cliente->save();

        return redirect()->route("cliente_editar", ['id' => $id->id_cliente]);
    }

    // Eliminar un cliente
    public function cliente_borrar(clientes $id){
        $id->delete();
        return redirect()->route('clientes');
    }
}

