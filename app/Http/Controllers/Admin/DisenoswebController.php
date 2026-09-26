<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Diseno;

class DisenoswebController extends Controller
{
    /**
     * Mostrar todos los diseños.
     */
    public function index()
    {
        $disenos = Diseno::latest()->get();

        return view(
            'admin.webdisenos.index',
            compact('disenos')
        );
    }

    /**
     * Guardar nuevo diseño.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'codigo' => 'nullable|string',
            'imagen' => 'nullable|string|max:255',
            'categoria' => 'nullable|string|max:255',
            'descripcion' => 'nullable|string',
        ]);

        Diseno::create([
            'nombre' => $request->nombre,
            'codigo' => $request->codigo,
            'imagen' => $request->imagen,
            'categoria' => $request->categoria,
            'descripcion' => $request->descripcion,
        ]);

        return redirect()
            ->route('Diseno.index')
            ->with('success', 'Diseño creado correctamente');
    }

    /**
     * Mostrar un diseño.
     */
    public function show(Diseno $diseno)
    {
        return view(
            'admin.webdisenos.delete',
            compact('diseno')
        );
    }

    /**
     * Mostrar preview del diseño.
     */
    public function preview(Diseno $diseno)
    {
        return view(
              'admin.webdisenos.componentes.page',
            compact('diseno')
        );
    }

    /**
     * Mostrar formulario para editar.
     */
    public function edit(Diseno $diseno)
    {
        return view(
            'admin.webdisenos.update',
            compact('diseno')
        );
    }

    /**
     * Actualizar diseño.
     */
    public function update(Request $request, Diseno $diseno)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'codigo' => 'nullable|string',
            'imagen' => 'nullable|string|max:255',
            'categoria' => 'nullable|string|max:255',
            'descripcion' => 'nullable|string',
        ]);

        $diseno->update([
            'nombre' => $request->nombre,
            'codigo' => $request->codigo,
            'imagen' => $request->imagen,
            'categoria' => $request->categoria,
            'descripcion' => $request->descripcion,
        ]);

        return redirect()
            ->route('Diseno.index')
            ->with('success', 'Diseño actualizado correctamente');
    }

    /**
     * Eliminar diseño.
     */
    public function destroy(Diseno $diseno)
    {
        $diseno->delete();

        return redirect()
            ->route('Diseno.index')
            ->with('success', 'Diseño eliminado correctamente');
    }
}