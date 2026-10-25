<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tecnologia;
use enshrined\svgSanitize\Sanitizer;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class TecnologiaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $tecnologia = Tecnologia::all();
        return view('admin.tecnologia.index', compact('tecnologia'));
    }

    public function store(Request $request)
    {
        $request->validate($this->reglas());

        $tecnologia = new Tecnologia();
        $tecnologia->nombre = $request->post('nombre');
        $tecnologia->tipo = $request->post('tipo');
        $this->guardarImagen($request, $tecnologia);
        $tecnologia->save();

        return redirect()->back()->with('success', 'Agregado con exito!');
    }

    public function show(string $id)
    {
        $tecnologia = Tecnologia::find($id);
        return view('admin.tecnologia.delete', compact('tecnologia'));
    }

    public function edit(string $id)
    {
        $tecnologia = Tecnologia::find($id);
        return view('admin.tecnologia.update', compact('tecnologia'));
    }

    public function update(Request $request, string $id)
    {
        $tecnologia = Tecnologia::findOrFail($id);
        $request->validate($this->reglas());

        $tecnologia->nombre = $request->post('nombre');
        $tecnologia->tipo = $request->post('tipo');
        $this->guardarImagen($request, $tecnologia); // solo cambia la imagen si subes una nueva
        $tecnologia->save();

        return redirect()->route('Tecnologia.index')->with('success', 'Actualizado con exito!');
    }

    public function destroy(string $id)
    {
        $tecnologia = Tecnologia::find($id);
        $tecnologia->delete();
        return redirect()->route('Tecnologia.index')->with('success', 'Eliminado con exito!');
    }

    /**
     * Reglas compartidas. La imagen es opcional: así puedes editar el nombre
     * sin tener que volver a subirla. Se acepta SVG además de los formatos de siempre.
     */
    private function reglas(): array
    {
        return [
            'nombre' => 'required',
            'tipo'   => 'required',
            'imagen' => 'nullable|file|max:2048|mimes:jpeg,jpg,png,gif,svg',
        ];
    }

    /**
     * Guarda la imagen en public/img/tecno/. Si es SVG, primero se limpia
     * (quita <script>, onload=, etc.) antes de escribirlo en disco.
     */
    private function guardarImagen(Request $request, Tecnologia $tecnologia): void
    {
        if (!$request->hasFile('imagen')) {
            return;
        }

        $archivo = $request->file('imagen');
        $carpeta = 'img/tecno/';
        $ext     = strtolower($archivo->getClientOriginalExtension());
        $base    = Str::slug(pathinfo($archivo->getClientOriginalName(), PATHINFO_FILENAME)) ?: 'tecnologia';
        $nombre  = time() . '-' . $base . '.' . $ext;

        if (!is_dir(public_path($carpeta))) {
            mkdir(public_path($carpeta), 0755, true);
        }

        if ($ext === 'svg') {
            $limpio = (new Sanitizer())->sanitize(file_get_contents($archivo->getRealPath()));

            if (!$limpio) {
                throw ValidationException::withMessages([
                    'imagen' => 'El archivo SVG no es válido.',
                ]);
            }

            file_put_contents(public_path($carpeta . $nombre), $limpio);
        } else {
            $archivo->move(public_path($carpeta), $nombre);
        }

        // Borra la imagen anterior para no acumular archivos huérfanos
        if ($tecnologia->imagen && file_exists(public_path($tecnologia->imagen))) {
            @unlink(public_path($tecnologia->imagen));
        }

        $tecnologia->imagen = $carpeta . $nombre;
    }
}