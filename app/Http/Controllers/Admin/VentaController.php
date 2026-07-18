<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use App\Models\Empresa;
use App\Models\Proyecto;
use App\Models\Servicio;
use App\Models\Venta;
use Illuminate\Http\Request;

class VentaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * This PHP code defines functions for CRUD operations on a "Venta" model, including index, store,
     * show, edit, update, and destroy.
     *
     * @return In the index() method, a view named 'admin.venta.index' is being returned with the
     *            variables , , , and .
     */
    public function index()
    {
        $cliente = Cliente::all();

        $empresa = Empresa::all();

        $proyecto = Proyecto::all();

        $venta = Venta::with([
            'cliente',
            'empresa',
            'proyecto',
            'servicios',
        ])->get();

        $servicios = Servicio::where('estado', 'activo')->get();

        

        return view('admin.venta.index', compact(
            'cliente',
            'empresa',
            'proyecto',
            'venta',
            'servicios'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'cliente_id' => 'required',
            'precio' => 'required',
            'servicios' => 'required|array',
        ]);

        $venta = new Venta;

        $venta->cliente_id = $request->cliente_id;
        $venta->empresa_id = $request->empresa_id;
        $venta->proyecto_id = $request->proyecto_id;
        $venta->precio = $request->precio;

        $venta->save();

        foreach ($request->servicios as $servicioId) {

            $cantidad = $request->cantidades[$servicioId] ?? 1;

            $venta->servicios()->attach($servicioId, [
                'cantidad' => $cantidad,
            ]);
        }

        return redirect()->back()->with(
            'success',
            'Venta registrada con éxito!'
        );
    }

    public function show(string $id)
    {
        $venta = Venta::find($id);

        return view('admin.venta.delete', compact('venta'));
    }

    public function edit(string $id)
    {
        $venta = Venta::find($id);
        $empresa = Empresa::all();
        $cliente = Cliente::all();
        $proyecto = Proyecto::all();

        return view('admin.venta.update', compact('venta', 'empresa', 'cliente', 'proyecto'));
    }

    public function update(Request $request, string $id)
    {
        $venta = Venta::find($id);
        $request->validate([
            'cliente_id' => 'required',
            'empresa_id' => 'required',
            'proyecto_id' => 'required',
            'precio' => 'required',
        ]);
        $venta->cliente_id = $request->post('cliente_id');
        $venta->empresa_id = $request->post('empresa_id');
        $venta->proyecto_id = $request->post('proyecto_id');
        $venta->precio = $request->post('precio');
        $venta->save();

        return redirect()->route('Venta.index')->with('success', 'Actualizado con exito!');
    }

    public function destroy(string $id)
    {
        $venta = Venta::find($id);
        $venta->delete();

        return redirect()->route('Venta.index')->with('success', 'Eliminado con exito!');
    }

    public function imprimir($id)
    {
        $venta = Venta::with([
            'cliente',
            'empresa',
            'proyecto',
            'servicios',
        ])->findOrFail($id);

        return view('admin.venta.imprimir', compact('venta'));
    }
}
