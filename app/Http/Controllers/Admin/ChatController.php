<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ChatController extends Controller
{
    public function send(Request $request)
    {
        $validated = $request->validate([
            'message' => ['required', 'string', 'max:2000'],
        ]);

        $apiKey = config('services.groq.key');

        if (! $apiKey) {
            return response()->json([
                'message' => 'La API de IA no está configurada en el servidor.',
            ], 500);
        }

        $response = Http::withToken($apiKey)
            ->acceptJson()
            ->timeout(60)
            ->post(
                rtrim(config('services.groq.base_url'), '/').'/chat/completions',
                [
                    'model' => 'openai/gpt-oss-20b',

                    'messages' => [
                        [
                            'role' => 'system',
                            'content' => 'Eres el asistente virtual profesional del sitio web de José Calderón, Analista Programador y desarrollador Full Stack.

        Tus áreas de especialidad son:
        - Laravel, PHP y desarrollo web.
        - APIs REST e integración de servicios.
        - Bases de datos SQL.
        - Linux, VPS y administración de servidores.
        - Docker y despliegue de aplicaciones.
        - Inteligencia artificial y automatización.

        Reglas de comportamiento:
        - Responde siempre en español.
        - Mantén un tono profesional, cercano y claro.
        - Sé breve en preguntas sencillas y detallado en consultas técnicas.
        - Cuando el usuario comparta un error, explica su causa probable y ofrece pasos concretos para solucionarlo.
        - Incluye código funcional cuando sea útil.
        - Si falta información para diagnosticar un problema, solicita el mensaje de error o el código relevante.
        - No inventes información ni afirmes haber ejecutado código o comprobado sistemas.
        - Si una consulta está fuera de tus especialidades, intenta orientar al usuario de forma útil.',
                        ],
                        [
                            'role' => 'user',
                            'content' => $validated['message'],
                        ],

                    ],
                ]
            );

        if ($response->failed()) {
            // \Log::error('Error de Groq API', [
            //     'status' => $response->status(),
            //     'body' => $response->json(),
            // ]);

            return response()->json([
                'message' => 'No fue posible obtener una respuesta de la IA.',
            ], 502);
        }

        return response()->json([
            'reply' => $response->json('choices.0.message.content')
                ?? 'No se recibió una respuesta válida.',
        ]);
    }
}
