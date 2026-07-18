<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Servicio;
class ServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $servicios = Servicio::all();

        return view('admin.servicio.index', compact('servicios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.servicio.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // 1. Validar los datos según la estructura de tu tabla
    $request->validate([
        'nombre'        => 'required|string|max:255',
        'categoria'     => 'required|string|max:255',
        'modelo_cobro'  => 'required|string|max:255',
        'tarifa_base'   => 'required|numeric|between:0,9999999999.99',
        'moneda'        => 'required|string|max:3',
        'estado'        => 'required|string|max:255',
        'exclusiones'   => 'nullable|string',
    ]);

    // 2. Crear el registro en la base de datos
    // Opción A: Usando asignación masiva (Mass Assignment)
    Servicio::create([
        'nombre'       => $request->nombre,
        'categoria'    => $request->categoria,
        'modelo_cobro' => $request->modelo_cobro,
        'tarifa_base'  => $request->tarifa_base,
        'moneda'       => $request->moneda,
        'estado'       => $request->estado,
        'exclusiones'  => $request->exclusiones,
    ]);

    /* 
       Nota: Para usar Servicio::create, recuerda agregar los campos al array 
       $fillable en tu modelo Servicio.php:
       protected $fillable = ['nombre', 'categoria', 'modelo_cobro', 'tarifa_base', 'moneda', 'estado', 'exclusiones'];
    */

    // 3. Redireccionar al usuario con un mensaje de éxito
    return redirect()->route('Servicios.index')
        ->with('success', 'El servicio se ha registrado correctamente.');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Buscamos el servicio por su ID
        $servicio = Servicio::findOrFail($id);

        // Retornamos la vista de detalle con la variable 'servicio'
        return view('admin.servicio.delete', compact('servicio'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Buscamos el servicio para cargar sus datos actuales en el formulario
        $servicio = Servicio::findOrFail($id);

        // Retornamos la vista de edición (que suele ser similar a la de 'create')
        return view('admin.servicio.update', compact('servicio'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // 1. Validar los datos de entrada
        $request->validate([
            'nombre'        => 'required|string|max:255',
            'categoria'     => 'required|string|max:255',
            'modelo_cobro'  => 'required|string|max:255',
            'tarifa_base'   => 'required|numeric|between:0,9999999999.99',
            'moneda'        => 'required|string|max:3',
            'estado'        => 'required|string|max:255',
            'exclusiones'   => 'nullable|string',
        ]);

        // 2. Buscar el registro existente
        $servicio = Servicio::findOrFail($id);

        // 3. Actualizar los datos
        // Esto funciona si tienes los campos en el array $fillable del modelo
        $servicio->update([
            'nombre'       => $request->nombre,
            'categoria'    => $request->categoria,
            'modelo_cobro' => $request->modelo_cobro,
            'tarifa_base'  => $request->tarifa_base,
            'moneda'       => $request->moneda,
            'estado'       => $request->estado,
            'exclusiones'  => $request->exclusiones,
        ]);

        // 4. Redireccionar con mensaje de éxito
        return redirect()->route('Servicios.index')
            ->with('success', 'El servicio "' . $servicio->nombre . '" ha sido actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // 1. Buscamos el servicio por su ID
        // Usamos findOrFail para que lance un error 404 si el ID no existe
        $servicio = Servicio::findOrFail($id);

        // 2. Guardamos el nombre antes de borrarlo para mostrarlo en el mensaje
        $nombreServicio = $servicio->nombre;

        // 3. Eliminamos el registro de la base de datos
        $servicio->delete();

        // 4. Redireccionamos al índice con un mensaje de sesión (flash message)
        return redirect()->route('Servicios.index')
            ->with('success', "El servicio '{$nombreServicio}' ha sido eliminado definitivamente.");
    }
}
