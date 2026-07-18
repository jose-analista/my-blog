<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\interaccion;
use App\Models\Empresa;
use App\Models\User;

class InteraccionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $interacciones = interaccion::with('empresa', 'user')->latest()->get();

        return view('admin.seguimiento.index', compact('interacciones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $empresa = Empresa::all();
        $user = User::all();

        return view('admin.seguimiento.create', compact('empresa', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validación
        $validated = $request->validate([
            'empresa_id'        => 'required|exists:empresas,id',
            'tipo'              => 'required|in:llamada,correo,reunion,mensaje',
            'notas'             => 'required|string',
            'fecha_interaccion' => 'required|date',
        ]);

        // Usuario autenticado
        $validated['user_id'] = auth()->id();

        // Crear interacción
        interaccion::create($validated);

        return redirect()
            ->route('Interaccion.index')
            ->with('success', 'Interacción registrada correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $interaccion = interaccion::with('empresa', 'user')->findOrFail($id);

        return view('admin.seguimiento.delete', compact('interaccion'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $interaccion = interaccion::findOrFail($id);
        $empresa = Empresa::all();
        $user = User::all();

        return view('admin.seguimiento.update', compact(
            'interaccion',
            'empresa',
            'user'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $interaccion = interaccion::findOrFail($id);

        // Validación
        $validated = $request->validate([
            'empresa_id'        => 'required|exists:empresas,id',
            'tipo'              => 'required|in:llamada,correo,reunion,mensaje',
            'notas'             => 'required|string',
            'fecha_interaccion' => 'required|date',
        ]);

        // Mantener usuario autenticado
        $validated['user_id'] = auth()->id();

        // Actualizar
        $interaccion->update($validated);

        return redirect()
            ->route('Interaccion.index')
            ->with('success', 'Interacción actualizada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $interaccion = interaccion::findOrFail($id);

        $interaccion->delete();

        return redirect()
            ->route('Interaccion.index')
            ->with('success', 'Interacción eliminada correctamente.');
    }
}