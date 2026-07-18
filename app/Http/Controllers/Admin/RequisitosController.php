<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Requisito;
use App\Models\Proyecto;
use Illuminate\Support\Facades\DB;
class RequisitosController extends Controller
{
public function index()
{
    $proyectos = Proyecto::with('empresa')
        ->withSum('requisitos', 'costo_estimado')
        ->get();

    return view('admin.requisitos.index', compact('proyectos'));
}

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'proyecto_id' => 'required|exists:proyectos,id',
            'titulo'      => 'required|string|max:255',
        ]);

        $horas = $request->horas_estimadas ?? 0;
        $valorHora = $request->valor_hora ?? 0;

        Requisito::create([
            'proyecto_id'     => $request->proyecto_id,
            'titulo'          => $request->titulo,
            'descripcion'     => $request->descripcion,
            'horas_estimadas' => $horas,
            'valor_hora'      => $valorHora,
            'costo_estimado'  => $horas * $valorHora,
            'prioridad'       => $request->prioridad ?? 'Media',
            'estado'          => $request->estado ?? 'Pendiente',
        ]);

        return redirect()
            ->back()
            ->with('success', 'Requisito creado correctamente');
    }

public function show(string $id)
{
    $proyecto = Proyecto::with([
        'empresa',
        'requisitos'
    ])->findOrFail($id);

    $proyectos = Proyecto::all();

    return view(
        'admin.requisitos.show',
        compact('proyecto', 'proyectos')
    );
}

    public function edit(string $id)
    {
        $requisito = Requisito::findOrFail($id);

        return response()->json($requisito);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'proyecto_id' => 'required|exists:proyectos,id',
            'titulo'      => 'required|string|max:255',
        ]);

        $requisito = Requisito::findOrFail($id);

        $horas = $request->horas_estimadas ?? 0;
        $valorHora = $request->valor_hora ?? 0;

        $requisito->update([
            'proyecto_id'     => $request->proyecto_id,
            'titulo'          => $request->titulo,
            'descripcion'     => $request->descripcion,
            'horas_estimadas' => $horas,
            'valor_hora'      => $valorHora,
            'costo_estimado'  => $horas * $valorHora,
            'prioridad'       => $request->prioridad,
            'estado'          => $request->estado,
        ]);

        return redirect()
            ->back()
            ->with('success', 'Requisito actualizado correctamente');
    }

    public function destroy(string $id)
    {
        $requisito = Requisito::findOrFail($id);

        $requisito->delete();

        return redirect()
            ->back()
            ->with('success', 'Requisito eliminado correctamente');
    }
}