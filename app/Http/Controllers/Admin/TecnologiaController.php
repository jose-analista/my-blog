<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tecnologia;

class TecnologiaController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

/**
 * This is a PHP code that handles CRUD operations for a "Tecnologia" model in a Laravel application.
 * 
 * @return In the index() method, a view named 'admin.tecnologia.index' is being returned with the
 * 'tecnologia' variable passed to it.
 */
    public function index()
    {
        $tecnologia = Tecnologia::all();
        return view('admin.tecnologia.index', compact('tecnologia'));
    }

    public function store(Request $request)
    {
        $tecnologia = new Tecnologia();
        $request->validate([
            'nombre' => 'required',
            'tipo' => 'required',
          
        ]);
        $tecnologia->nombre = $request->post('nombre');
        $tecnologia->tipo = $request->post('tipo');
        if($request->hasFile('imagen')){
            $imagen = $request->file('imagen');
            $url = 'img/tecno/';
            $nombreimagen = time() . '-' . $imagen->getClientOriginalName();
            $uploadSuccess = $request->file('imagen')->move($url,$nombreimagen);
            $tecnologia->imagen = $url. $nombreimagen;
        }
        $tecnologia->save();
       
        return redirect()->back()->with("success", "Agregado con exito!");
    }

  
    public function show(string $id)
    {
        $tecnologia = Tecnologia::find($id);
        return view('admin.tecnologia.delete', compact('tecnologia'));
    }

  
    public function edit(string $id)
    {
        $tecnologia = Tecnologia::find($id);
        return view('admin.tecnologia.update', compact('tecnologia'));
    }


    public function update(Request $request, string $id)
    {
        $tecnologia = Tecnologia::find($id);
        $request->validate([
            'nombre' => 'required',
            'tipo' => 'required',
            'imagen' => 'required|nullable|image|mimes:jpeg,jpg,png,gif',
        ]);
        $tecnologia->nombre = $request->post('nombre');
        $tecnologia->tipo = $request->post('tipo');
        if($request->hasFile('imagen')){
            $imagen = $request->file('imagen');
            $url = 'img/tecno/';
            $nombreimagen = time() . '-' . $imagen->getClientOriginalName();
            $uploadSuccess = $request->file('imagen')->move($url,$nombreimagen);
            $tecnologia->imagen = $url. $nombreimagen;
        }
        $tecnologia->save();
       
        return redirect()->route("Tecnologia.index")->with("success", "Actualizado con exito!");
    }


    public function destroy(string $id)
    {
        $tecnologia = Tecnologia::find($id);
        $tecnologia->delete();
        return redirect()->route("Tecnologia.index")->with("success", "Eliminado con exito!");
    }
}
