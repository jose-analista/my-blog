<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Proyecto;
use App\Models\Requisito;
use App\Models\Tareas;
use App\Models\User;
use App\Notifications\NuevaTareaNotification;
use Illuminate\Http\Request;

class TareaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $proyectos = Proyecto::withCount('tareas')->get();

        $tareas = Tareas::with([
            'proyecto',
            'requisito',
            'usuario',
        ])->get();

        return view(
            'admin.tarea.index',
            compact('proyectos', 'tareas')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $requisitos = Requisito::all();
        $proyectos = Proyecto::all();
        $users = User::all();

        return view('admin.tarea.create', compact('proyectos', 'users', 'requisitos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'proyecto_id' => 'required|exists:proyectos,id',
            'requisito_id' => 'nullable|exists:requisitos,id',
            'user_id' => 'required|exists:users,id',
            'titulo' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'fecha_vencimiento' => 'required|date',
            'prioridad' => 'required|in:baja,media,alta',
            'completada' => 'required|boolean',
        ]);

        $tarea = Tareas::create([
            'proyecto_id' => $request->proyecto_id,
            'requisito_id' => $request->requisito_id,
            'user_id' => $request->user_id,
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'fecha_vencimiento' => $request->fecha_vencimiento,
            'prioridad' => $request->prioridad,
            'completada' => $request->completada,
        ]);

        $user = User::find($request->user_id);

        if ($user) {
            $user->notify(
                new NuevaTareaNotification(
                    $tarea,
                    'Nueva tarea asignada',
                    'Se te asignó la tarea: '.$tarea->titulo
                )
            );
        }

        return redirect()
            ->route('Tareas.index')
            ->with('success', 'Tarea creada correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tarea = Tareas::with([
            'proyecto',
            'requisito',
            'user',
        ])->findOrFail($id);

        return view('admin.tarea.delete', compact('tarea'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tarea = Tareas::findOrFail($id);

        $proyectos = Proyecto::orderBy('nombre')->get();
        $requisitos = Requisito::orderBy('titulo')->get();
        $users = User::orderBy('name')->get();

        return view('admin.tarea.update', compact(
            'tarea',
            'proyectos',
            'requisitos',
            'users'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $tarea = Tareas::findOrFail($id);

        $request->validate([
            'proyecto_id' => 'required|exists:proyectos,id',
            'requisito_id' => 'nullable|exists:requisitos,id',
            'user_id' => 'required|exists:users,id',
            'titulo' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'fecha_vencimiento' => 'required|date',
            'prioridad' => 'required|in:baja,media,alta',
            'completada' => 'required|boolean',
        ]);

        $tarea->update([
            'proyecto_id' => $request->proyecto_id,
            'requisito_id' => $request->requisito_id,
            'user_id' => $request->user_id,
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'fecha_vencimiento' => $request->fecha_vencimiento,
            'prioridad' => $request->prioridad,
            'completada' => $request->completada,
        ]);

        return redirect()
            ->route('Tareas.index')
            ->with('success', 'Tarea actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tarea = Tareas::findOrFail($id);

        $tarea->delete();

        return redirect()->route('Tareas.index')
            ->with('success', 'Tarea eliminada correctamente');
    }

    public function completar(Request $request, $id)
    {
        $tarea = Tareas::findOrFail($id);

        // BOOLEAN
        $booleanValue = $request->has('completada');

        // ACTUALIZAR
        $tarea->update([
            'completada' => $booleanValue,
        ]);

        // USUARIO
        $user = User::find($tarea->user_id);

        // NOTIFICACIÓN
        $user->notify(
            new NuevaTareaNotification(
                $tarea,
                'Estado de tarea actualizado',
                $booleanValue
                    ? 'La tarea fue completada'
                    : 'La tarea fue marcada como pendiente'
            )
        );

        return redirect()->route('Tareas.index')
            ->with('success', 'Tarea actualizada correctamente');
    }

    public function leerNotificacion($id)
    {
        $notificacion = auth()->user()
            ->notifications()
            ->findOrFail($id);

        $notificacion->markAsRead();

        return back();
    }

    public function mostrarProyecto($id)
{
    $proyecto = Proyecto::findOrFail($id);

    $tareas = Tareas::with([
        'proyecto',
        'requisito',
        'usuario'
    ])
    ->where('proyecto_id', $id)
    ->get();

    return view(
        'admin.tarea.tareas-proyecto',
        compact('proyecto','tareas')
    );
}
}
