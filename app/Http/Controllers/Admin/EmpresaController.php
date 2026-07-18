<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contacto;
use App\Models\Empresa;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $empresa = Empresa::all();

        $sectores = Empresa::select('razon_social')
            ->distinct()
            ->orderBy('razon_social')
            ->pluck('razon_social');
        $contacto = Contacto::all();

        return view('admin.empresa.index', compact('empresa', 'contacto', 'sectores'));
    }

    public function create()
    {
        return view('admin.empresa.create');

    }

    public function store(Request $request)
    {
        $empresa = new Empresa;
        $request->validate([
            'nombre' => 'required',
            'razon_social' => 'required',
        ]);
        $empresa->rut = $request->post('rut');
        $empresa->nombre = $request->post('nombre');
        $empresa->ubicacion = $request->post('ubicacion');
        $empresa->fono = $request->post('fono');
        $empresa->correo = $request->post('correo');
        $empresa->url = $request->post('url');
        $empresa->razon_social = $request->post('razon_social');
        $empresa->save();

        return redirect()->back()->with('success', 'Agregado con exito!');
    }

    public function show(string $id)
    {
        $empresa = Empresa::find($id);

        return view('admin.empresa.delete', compact('empresa'));

    }

    public function edit(string $id)
    {
        $empresa = Empresa::find($id);

        return view('admin.empresa.update', compact('empresa'));
    }

    public function update(Request $request, string $id)
    {
        $empresa = Empresa::find($id);
        $request->validate([
            'nombre' => 'required',
            'razon_social' => 'required',
        ]);
        $empresa->rut = $request->post('rut');
        $empresa->nombre = $request->post('nombre');
        $empresa->ubicacion = $request->post('ubicacion');
        $empresa->fono = $request->post('fono');
        $empresa->correo = $request->post('correo');
        $empresa->url = $request->post('url');
        $empresa->razon_social = $request->post('razon_social');
        $empresa->save();

        return redirect()->route('Empresa.index')->with('success', 'Actualizado con exito!');
    }

    public function destroy(string $id)
    {
        $empresa = Empresa::find($id);
        $empresa->delete();

        return redirect()->route('Empresa.index')->with('success', 'Eliminado con exito!');
    }

 public function buscarSector(Request $request)
{
    $request->validate([
        'sector' => 'required|string'
    ]);

    $empresas = Empresa::where('razon_social', $request->sector)
        ->select(
            'id',
            'nombre',
            'razon_social',
            'ubicacion',
            'fono',
            'correo',
            'url'
        )
        ->orderBy('nombre')
        ->get();

    return response()->json($empresas);
}
}
