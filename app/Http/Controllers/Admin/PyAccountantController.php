<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
class PyAccountantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $status = 'offline'; // Estado por defecto

    try {
        // Intentamos conectar
        $response = Http::timeout(2)->get('http://127.0.0.1:5000/');
        
        if ($response->successful()) {
            $status = 'online';
        }
    } catch (\Exception $e) {
        // Si hay error, se queda en 'offline'
        $status = 'offline';
    }

    // Pasamos la variable $status a la vista
    return view('admin.PyAccountant.index', compact('status'));
}

    /**
     * Show the form for creating a new resource.
     */

    public function stopApp()
{
    Http::post('http://localhost:5000/shutdown');
    return response()->json(['message' => 'Se envió la orden de apagado a la App']);
}

public function startApp(Request $request)
{
    $scriptPath = '/home/jose/Documentos/Mi_blog_software/Laravel10/Mi_blog/api/PyAccountant/app.py';
    $pythonPath = '/home/jose/Documentos/Mi_blog_software/Laravel10/Mi_blog/api/venv/bin/python3';

    // 1. Buscamos el PID
    $pid = shell_exec("pgrep -f " . escapeshellarg($scriptPath));
    $pid = trim($pid);

    // Si queremos forzar el reinicio
    if ($request->has('force') && !empty($pid)) {
        shell_exec("kill -9 " . $pid); // Matamos el proceso actual
        $pid = null; // Reseteamos para poder arrancar de nuevo
        sleep(1); // Damos tiempo a que el sistema libere el puerto/recursos
    }

    if (!empty($pid)) {
        $status = 'La aplicación ya está activa (PID: ' . $pid . '). Si está bloqueada, usa el botón de "Forzar Reinicio".';
        return view('admin.PyAccountant.index', compact('status'));
    }

    // 2. Ejecutar
    $process = new Process([$pythonPath, $scriptPath]);
    $process->setTimeout(null);
    $process->setIdleTimeout(null);
    $process->start();

    usleep(500000); 

    if ($process->isRunning()) {
        $status = 'Aplicación iniciada correctamente.';
    } else {
        $status = 'Error: ' . $process->getErrorOutput();
    }

    return view('admin.PyAccountant.index', compact('status'));
}
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
