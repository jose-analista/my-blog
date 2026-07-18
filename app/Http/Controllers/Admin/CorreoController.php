<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Email;
use App\Models\Empresa;
use App\Models\interaccion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CorreoController extends Controller
{
    public function enviar(Request $request)
{
    $request->validate([
        'correo' => 'required|email',
        'asunto' => 'required|max:255',
        'mensaje' => 'required',
        'archivo' => 'nullable|mimes:pdf,doc,docx,xls,xlsx,jpg,jpeg,png|max:10240',
    ]);

    Mail::send([], [], function ($message) use ($request) {

        $message->to($request->correo)
            ->subject($request->asunto)
            ->html(nl2br($request->mensaje));

        if ($request->hasFile('archivo')) {

            $message->attach(
                $request->file('archivo')->getRealPath(),
                [
                    'as'   => $request->file('archivo')->getClientOriginalName(),
                    'mime' => $request->file('archivo')->getMimeType(),
                ]
            );
        }
    });

    $email = Email::create([
        'destinatario' => $request->correo,
        'asunto'       => $request->asunto,
        'mensaje'      => $request->mensaje,
        'archivo'      => $nombreArchivo ?? null,
        'estado'       => 'enviado',
        'user_id'      => auth()->id(),
    ]);

    /*
    |--------------------------------------------------------------------------
    | Registrar interacción
    |--------------------------------------------------------------------------
    */

    if ($request->filled('empresa_id')) {

        interaccion::create([
            'empresa_id'        => $request->empresa_id,
            'user_id'           => auth()->id(),
            'tipo'              => 'correo',
            'notas'             => 'Correo enviado: ' . $request->asunto,
            'fecha_interaccion' => now(),
        ]);

    }

    return back()->with(
        'success',
        'Correo enviado correctamente'
    );
}

    public function index()
    {
        $emails = Email::latest()->paginate(10);
        $empresa = Empresa::all();
        return view('admin.mail.index', compact('emails', 'empresa'));
    }

    /**
     * Show the form for creating a new resource.
     */
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
