<?php

namespace App\Http\Controllers\Admin; // Debe terminar en \Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage; // Importante para manejar archivos
use Parsedown;
use Illuminate\Support\Str; // <--- ESTA ES LA IMPORTACIÓN QUE SOLUCIONA EL ERROR
use Illuminate\View\View;
use ZipArchive;

class DocumentoController extends Controller
{
public function show()
{
    // Ruta carpeta markdown
    $path = storage_path('app/documentos');

    // Ruta imágenes
    $pathImg = storage_path('app/public/img');

    // Arrays vacíos
    $archivos = [];
    $imagenes = [];

    // Archivos markdown
    if (File::exists($path)) {

        $todosLosArchivos = File::files($path);

        $archivos = array_filter($todosLosArchivos, function ($archivo) {
            return $archivo->getExtension() === 'md';
        });
    }

    // Imágenes
    if (File::exists($pathImg)) {

        $todosLasImagenes = File::files($pathImg);

        $extensiones = ['jpg', 'jpeg', 'png', 'gif', 'webp', 'svg'];

        $imagenes = array_filter($todosLasImagenes, function ($archivo) use ($extensiones) {

            return in_array(
                strtolower($archivo->getExtension()),
                $extensiones
            );
        });
    }

    // Vista
    return view(
        'admin.markdown.show',
        compact('archivos', 'imagenes')
    );
}
   
public function view(string $filename): View
{
    $path = storage_path('app/documentos/' . $filename);

    if (!File::exists($path)) {
        abort(404, 'El archivo no existe.');
    }

    // CONTENIDO MARKDOWN
    $contenidoRaw = File::get($path);

    // HTML PREVIEW
    /*
    |--------------------------------------------------------------------------
    | IMÁGENES
    |--------------------------------------------------------------------------
    */

    $pathImg = storage_path('app/public/img');

    $imagenes = [];

    if (File::exists($pathImg)) {

        $todosLasImagenes = File::files($pathImg);

        $extensiones = [
            'jpg',
            'jpeg',
            'png',
            'gif',
            'webp',
            'svg'
        ];

        $imagenes = array_filter(
            $todosLasImagenes,
            function ($archivo) use ($extensiones) {

                return in_array(
                    strtolower($archivo->getExtension()),
                    $extensiones
                );
            }
        );
    }

    return view('admin.markdown.view', [


        'contenidoRaw' => $contenidoRaw,

        'filename' => $filename,

        'imagenes' => $imagenes
    ]);
}
public function update(Request $request, string $filename)
{
    $path = storage_path('app/documentos/' . $filename);

    if (!File::exists($path)) {
        abort(404);
    }

    // Validar que el contenido no venga vacío
    $request->validate([
        'code' => 'required'
    ]);

    // Guardar el nuevo contenido
    File::put($path, $request->code);

    return redirect()->route('admin.markdown.view', $filename)
                     ->with('success', 'Documento actualizado correctamente.');
}
public function store(Request $request)
{
    $request->validate([
        'filename' => 'required|string|max:255'
    ]);

    // Aseguramos que termine en .md
    $name = Str::finish($request->filename, '.md');
    $path = storage_path('app/documentos/' . $name);

    if (File::exists($path)) {
        return redirect()->back()->with('error', 'El archivo ya existe.');
    }

    // Crear archivo vacío
    File::put($path, '# Nuevo Documento');

    return redirect()->route('admin.markdown.view', $name)
                     ->with('message', 'Documento creado. ¡Empieza a escribir!');
}
public function rename(Request $request, string $filename)
{
    $request->validate([
        'new_filename' => 'required|string|max:255'
    ]);

    $oldPath = storage_path('app/documentos/' . $filename);
    $newName = Str::finish($request->new_filename, '.md');
    $newPath = storage_path('app/documentos/' . $newName);

    if (!File::exists($oldPath)) {
        abort(404);
    }

    if (File::exists($newPath)) {
        return redirect()->back()->with('error', 'Ya existe un archivo con ese nombre.');
    }

    // Renombrar el archivo
    File::move($oldPath, $newPath);

    return redirect()->route('admin.markdown.view', $newName)
                     ->with('message', 'Archivo renombrado correctamente.');
}
public function destroy(string $filename)
{
    $path = storage_path('app/documentos/' . $filename);

    if (File::exists($path)) {
        File::delete($path);
        return redirect()->back()->with('success', "Archivo '{$filename}' eliminado correctamente.");
    }

    return redirect()->back()->with('error', 'El archivo no existe.');
}
public function deleteImage(string $filename)
{
    $path = storage_path('app/public/img/' . $filename);

    if (!File::exists($path)) {

        return response()->json([
            'success' => false,
            'message' => 'Imagen no encontrada'
        ], 404);
    }

    File::delete($path);

    return response()->json([
        'success' => true,
        'message' => 'Imagen eliminada'
    ]);
}
public function saveSvg(Request $request)
{
    $request->validate([
        'filename' => 'required|string',
        'code' => 'required|string'
    ]);

    $filename = Str::slug($request->filename) . '.svg';

    $path = storage_path(
        'app/public/img/' . $filename
    );

    File::put($path, $request->code);

    return response()->json([
        'success' => true,
        'filename' => $filename
    ]);
}
public function updateSvg(Request $request, string $filename)
{
    // VALIDAR
    $request->validate([
        'code' => 'required|string'
    ]);

    // RUTA SVG
    $path = storage_path(
        'app/public/img/' . $filename
    );

    // VERIFICAR EXISTENCIA
    if (!File::exists($path)) {

        return response()->json([

            'success' => false,

            'message' => 'Archivo no encontrado'

        ], 404);
    }

    // GUARDAR NUEVO CÓDIGO
    File::put($path, $request->code);

    // RESPUESTA
    return response()->json([

        'success' => true,

        'message' => 'SVG actualizado'

    ]);
}

public function exportAllZip()
{
    $folder = storage_path('app/documentos');

    $zipPath = storage_path(
        'app/temp/documentos-' . date('YmdHis') . '.zip'
    );

    if (!File::exists(storage_path('app/temp'))) {

        File::makeDirectory(
            storage_path('app/temp'),
            0755,
            true
        );
    }

    $zip = new ZipArchive();

    if ($zip->open($zipPath, ZipArchive::CREATE | ZipArchive::OVERWRITE) === true) {

        foreach (File::files($folder) as $file) {

            $zip->addFile(
                $file->getRealPath(),
                $file->getFilename()
            );
        }

        $zip->close();
    }

    return response()
        ->download($zipPath)
        ->deleteFileAfterSend(true);
}

}
