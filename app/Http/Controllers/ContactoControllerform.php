<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contacto;

class ContactoControllerform extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
      
           // Obtener el ID del usuario autenticado
           $userId = auth()->id();

           $contacto = new Contacto();
           $request->validate([
               'asunto' => 'required',
               'mensaje' => 'required'
           ]);
   
           // Asignar el ID del usuario al contacto
           $contacto->users_id = $userId;
           $contacto->asunto = $request->post('asunto');
           $contacto->mensaje = $request->post('mensaje');
           $contacto->save();
          
           return redirect()->back()->with("success", "Gracias pronto lo voy a contactar");
    }

    // Ejemplo de un controlador que maneja la descarga de un archivo
    public function descargarArchivo()
    {
        $rutaDelArchivo = storage_path('Cv/cv.pdf'); // Reemplaza con la ubicación real de tu archivo

        return response()->download($rutaDelArchivo, 'José-Miguel-Calderón-Cayunao.pdf');
    }
}