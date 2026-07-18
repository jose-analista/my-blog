<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Oportunidades;
use App\Models\Empresa;

class OportunidadesController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $oportunidades = Oportunidades::all();
        return view('admin.oportunidad.index', compact('oportunidades'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $empresa = Empresa::all();
        return view('admin.oportunidad.create', compact('empresa'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $oportunidad = new Oportunidades();
        $request->validate([
            'titulo' => 'required',
        ]);
        $oportunidad->empresa_id = $request->post('empresa_id');
        $oportunidad->titulo = $request->post('titulo');
        $oportunidad->valor_estimado = $request->post('valor_estimado');
        $oportunidad->etapa = $request->post('etapa');
        $oportunidad->fecha_cierre_estimada = $request->post('fecha_cierre_estimada');
        $oportunidad->descripcion = $request->post('descripcion');
        $oportunidad->save();
       
        return redirect()->route("Oportunidad.index")->with("success", "Agregado con exito!");
    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $oportunidad  = Oportunidades::find($id);
        return view('admin.oportunidad.delete', compact('oportunidad'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $oportunidad  = Oportunidades::find($id);
        $empresa = Empresa::all();
        return view('admin.oportunidad.update', compact('oportunidad','empresa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $oportunidad = Oportunidades::find($id);
          $request->validate([
            'titulo' => 'required',
        ]);
        $oportunidad->empresa_id = $request->post('empresa_id');
        $oportunidad->titulo = $request->post('titulo');
        $oportunidad->valor_estimado = $request->post('valor_estimado');
        $oportunidad->etapa = $request->post('etapa');
        $oportunidad->fecha_cierre_estimada = $request->post('fecha_cierre_estimada');
        $oportunidad->descripcion = $request->post('descripcion');
        $oportunidad->save();
       
        return redirect()->route("Oportunidad.index")->with("success", "Agregado con exito!");
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $oportunidad = Oportunidades::find($id);
        $oportunidad->delete();
        return redirect()->route("Oportunidad.index")->with("success", "Eliminado con exito!");
    }
}
