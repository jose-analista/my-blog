<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Empresa;
use App\Models\Contacto;
use App\Models\Cliente;

class ClienteController extends Controller
{
 
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $empresa = Empresa::all();
        $cliente = Cliente::all();
        $contacto = Contacto::all();
        return view('admin.cliente.index', compact('cliente','empresa','contacto'));
    }

  
    public function create()
    {
        
    }

  /**
   * This PHP code defines functions for storing, showing, editing, updating, and deleting client data.
   * 
   * @param Request request The  parameter is an instance of the Request class, which
   * represents an HTTP request made to the server. It contains information about the request, such as
   * the request method, URL, headers, and any data sent with the request.
   * 
   * @return In the `store` method, a redirect back to the previous page is being returned with a
   * success message.
   */
    public function store(Request $request)
    {
        $cliente = new Cliente();
        $request->validate([
            
            'nombre' => 'required',
          
        ]);
        $cliente->rut = $request->post('rut');
        $cliente->nombre = $request->post('nombre');
        $cliente->a_paterno = $request->post('a_paterno');
        $cliente->a_materno = $request->post('a_materno');
        $cliente->fono = $request->post('fono');
        $cliente->correo = $request->post('correo');
        $cliente->cargo = $request->post('cargo');
        $cliente->red_social = $request->post('red_social');
        $cliente->empresa_id = $request->post('empresa_id');
        $cliente->save();
       
        return redirect()->route("Cliente.index")->with("success", "Agregado con exito!");
    }

 
    public function show(string $id)
    {
        $cliente  = Cliente::find($id);
        return view('admin.cliente.delete', compact('cliente'));
    }

   
    public function edit(string $id)
    {
        $empresa = Empresa::all();
        $cliente  = Cliente::find($id);
        return view('admin.cliente.update', compact('cliente','empresa'));
    }


    public function update(Request $request, string $id)
    {
        $cliente = Cliente::find($id);
        $request->validate([
            'nombre' => 'required'
        ]);
        $cliente->rut = $request->post('rut');
        $cliente->nombre = $request->post('nombre');
        $cliente->a_paterno = $request->post('a_paterno');
        $cliente->a_materno = $request->post('a_materno');
        $cliente->fono = $request->post('fono');
        $cliente->correo = $request->post('correo');
        $cliente->cargo = $request->post('cargo');
        $cliente->red_social = $request->post('red_social');
        $cliente->empresa_id = $request->post('empresa_id');
        $cliente->save();
       
        return redirect()->route("Cliente.index")->with("success", "Actualizado con exito!");
    }


    public function destroy(string $id)
    {
        $cliente = Cliente::find($id);
        $cliente->delete();
        return redirect()->route("Cliente.index")->with("success", "Eliminado con exito!");
    }
}