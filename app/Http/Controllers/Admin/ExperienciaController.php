<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ExperienciaProfesional;

class ExperienciaController extends Controller
{
 
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $experiencia = ExperienciaProfesional::all();
        return view('admin.experiencia.index', compact('experiencia'));
    }

    
    public function create()
    {
        //
    }

   
/**
 * This PHP code defines functions for storing, showing, editing, updating, and deleting professional
 * experiences.
 * 
 * @param Request request The  parameter is an instance of the Request class, which represents
 * an HTTP request. It contains information about the request such as the request method, headers, and
 * input data.
 * 
 * @return In the `store` method, a redirect back to the previous page is being returned with a success
 * message.
 */
    public function store(Request $request)
    {
        $experiencia = new ExperienciaProfesional();
        $request->validate([
            'nombre' => 'required',
            'inicio' => 'required',
            'termino' => 'required',
            'lugar' => 'required',
            'descripcion' => 'required'
        ]);
        $experiencia->nombre = $request->post('nombre');
        $experiencia->inicio = $request->post('inicio');
        $experiencia->termino = $request->post('termino');
        $experiencia->lugar = $request->post('lugar');
        $experiencia->descripcion = $request->post('descripcion');
        $experiencia->save();
       
        return redirect()->back()->with("success", "Agregado con exito!");
    }

   
    public function show(string $id)
    {
        $experiencia  = ExperienciaProfesional::find($id);
        return view('admin.experiencia.delete', compact('experiencia'));
    }

   
    public function edit(string $id)
    {
        $experiencia  = ExperienciaProfesional::find($id);
        return view('admin.experiencia.update', compact('experiencia'));
    }

   
    public function update(Request $request, string $id)
    {
        $experiencia  = ExperienciaProfesional::find($id);
        $request->validate([
            'nombre' => 'required',
            'inicio' => 'required',
            'termino' => 'required',
            'lugar' => 'required',
            'descripcion' => 'required'
        ]);
        $experiencia->nombre = $request->post('nombre');
        $experiencia->inicio = $request->post('inicio');
        $experiencia->termino = $request->post('termino');
        $experiencia->lugar = $request->post('lugar');
        $experiencia->descripcion = $request->post('descripcion');
        $experiencia->save();
       
        return redirect()->route("Experiencia.index")->with("success", "Actualizado con exito!");
    }

   
    public function destroy(string $id)
    {
        $experiencia  = ExperienciaProfesional::find($id);
        $experiencia->delete();
        return redirect()->route("Experiencia.index")->with("success", "Eliminado con exito!");
    }
}
