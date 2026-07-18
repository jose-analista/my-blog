<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Educacion;

class EducacionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $educacion = Educacion::all();
        return view('admin.educacion.index', compact('educacion'));
    }


    public function create()
    {

    }

  
/**
 * The above code is a PHP code that handles CRUD operations for an "Educacion" model, including
 * storing, showing, editing, updating, and deleting records.
 * 
 * @param Request request The  parameter is an instance of the Request class, which represents
 * an HTTP request made to the server. It contains information about the request, such as the request
 * method, URL, headers, and any data sent with the request.
 * 
 * @return In the `store` method, a redirect back to the previous page is being returned with a success
 * message.
 */
    public function store(Request $request)
    {
        $educacion = new Educacion();
        $request->validate([
            'nombre' => 'required',
            'inicio' => 'required',
            'termino' => 'required',
            'institucion' => 'required',
            'descripcion' => 'required'
        ]);
        $educacion->nombre = $request->post('nombre');
        $educacion->inicio = $request->post('inicio');
        $educacion->termino = $request->post('termino');
        $educacion->institucion = $request->post('institucion');
        $educacion->descripcion = $request->post('descripcion');
        $educacion->save();
       
        return redirect()->back()->with("success", "Agregado con exito!");
    }

    
    public function show(string $id)
    {
        $educacion  = Educacion::find($id);
        return view('admin.educacion.delete', compact('educacion'));
    }

 
    public function edit(string $id)
    {
        $educacion  = Educacion::find($id);
        return view('admin.educacion.update', compact('educacion'));
    }

 
    public function update(Request $request, string $id)
    {
        $educacion  = Educacion::find($id);
        $request->validate([
            'nombre' => 'required',
            'inicio' => 'required',
            'termino' => 'required',
            'institucion' => 'required',
            'descripcion' => 'required'
        ]);
        $educacion->nombre = $request->post('nombre');
        $educacion->inicio = $request->post('inicio');
        $educacion->termino = $request->post('termino');
        $educacion->institucion = $request->post('institucion');
        $educacion->descripcion = $request->post('descripcion');
        $educacion->save();
       
        return redirect()->route("Educacion.index")->with("success", "Actualizado con exito!");
    }
 
    public function destroy(string $id)
    {
        $educacion  = Educacion::find($id);
        $educacion->delete();
        return redirect()->route("Educacion.index")->with("success", "Eliminado con exito!");
    }
}
