<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Empresa;
use App\Models\Proyecto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProyectoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * The above code is a PHP script that defines various functions for managing projects in an admin
     * panel, including creating, updating, deleting, and displaying projects, as well as uploading and
     * deleting project images.
     *
     * @return In the `index()` method, the `proyecto` and `empresa` variables are being passed to the
     *            `admin.proyecto.index` view.
     */
    public function index()
    {
        $empresa = Empresa::all();
        $proyecto = Proyecto::all();

        return view('admin.proyecto.index', compact('proyecto', 'empresa'));
    }

    public function storeimagen(Request $request, string $id)
    {
        $proyecto = Proyecto::find($id);

        // Verifica si el proyecto ya tiene una imagen
        if ($proyecto->imagen) {
            // Elimina la imagen anterior
            if (File::exists($proyecto->imagen)) {
                File::delete($proyecto->imagen);
            }
        }

        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $url = 'img/proyecto/';
            $nombreimagen = time().'-'.$imagen->getClientOriginalName();
            $uploadSuccess = $request->file('imagen')->move($url, $nombreimagen);
            $proyecto->imagen = $url.$nombreimagen;
        }

        $proyecto->save();

        return redirect()->back()->with('success', 'Actualizado con éxito!');
    }

    public function store(Request $request)
    {
        $proyecto = new Proyecto;
        $request->validate([
            'nombre' => 'required',
            'link' => 'required',
            'descripcion' => 'required',
            'documento' => 'required|file|max:20480',
            'empresa_id' => 'required',
            'imagen' => 'required|image|mimes:jpeg,jpg,png,gif',
        ]);
        $proyecto->nombre = $request->post('nombre');
        $proyecto->link = $request->post('link');
        $proyecto->estado = $request->post('estado') == true ? '1' : '0';
        $proyecto->descripcion = $request->post('descripcion');
        $proyecto->empresa_id = $request->post('empresa_id');
        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $url = 'img/proyecto/';
            $nombreimagen = time().'-'.$imagen->getClientOriginalName();
            $uploadSuccess = $request->file('imagen')->move($url, $nombreimagen);
            $proyecto->imagen = $url.$nombreimagen;
        }
        if ($request->hasFile('documento')) {

            $documento = $request->file('documento');

            $ruta = storage_path('app/private/documento');

            // Crear carpeta si no existe
            if (! file_exists($ruta)) {
                mkdir($ruta, 0777, true);
            }

            $nombreDocumento = time().'_'.$documento->getClientOriginalName();

            $documento->move($ruta, $nombreDocumento);

            // guardar SOLO ruta relativa
            $proyecto->documento = 'private/documento/'.$nombreDocumento;
        }
        $proyecto->save();

        return redirect()->back()->with('success', 'Agregado con exito!');
    }

    public function show(string $id)
    {
        $proyecto = Proyecto::find($id);

        return view('admin.proyecto.delete', compact('proyecto'));
    }

    public function edit(string $id)
    {
        $empresa = Empresa::all();
        $proyecto = Proyecto::find($id);

        return view('admin.proyecto.update', compact('proyecto', 'empresa'));
    }

    public function update(Request $request, string $id)
    {
        $proyecto = Proyecto::find($id);
        $proyecto->nombre = $request->post('nombre');
        $proyecto->link = $request->post('link');
        $proyecto->descripcion = $request->post('descripcion');
        $proyecto->empresa_id = $request->post('empresa_id');
        $proyecto->estado = $request->post('estado') == true ? '1' : '0';
        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $url = 'img/proyecto/';
            $nombreimagen = time().'-'.$imagen->getClientOriginalName();
            $uploadSuccess = $request->file('imagen')->move($url, $nombreimagen);
            $proyecto->imagen = $url.$nombreimagen;
        }
        if ($request->hasFile('documento')) {

            // eliminar documento anterior
            if ($proyecto->documento &&
                Storage::disk('local')->exists($proyecto->documento)) {

                Storage::disk('local')->delete($proyecto->documento);
            }

            $documento = $request->file('documento');

            $ruta = storage_path('app/private/documento');

            if (! file_exists($ruta)) {
                mkdir($ruta, 0777, true);
            }

            $nombreDocumento = time().'_'.$documento->getClientOriginalName();

            $documento->move($ruta, $nombreDocumento);

            $proyecto->documento = 'private/documento/'.$nombreDocumento;
        }
        $proyecto->save();

        return redirect()->route('Proyecto.index')->with('success', 'Actualizado con exito!');
    }

    public function destroy(string $id)
    {
        $proyecto = Proyecto::find($id);
        if ($proyecto->imagen) {
            if (File::exists($proyecto->imagen)) {
                File::delete($proyecto->imagen);
            }
        }
        if ($proyecto->documento &&
    Storage::disk('local')->exists($proyecto->documento)) {

            Storage::disk('local')->delete($proyecto->documento);
        }
        $proyecto->delete();

        return redirect()->route('Proyecto.index')->with('success', 'Eliminado con exito!');
    }

    public function verDocumento(string $id)
{
    $proyecto = Proyecto::findOrFail($id);

    if (!Storage::disk('local')->exists($proyecto->documento)) {
        abort(404);
    }

    return response()->file(
        storage_path('app/' . $proyecto->documento)
    );
}
}
