<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pagina;
use Spatie\Browsershot\Browsershot;

class FuentesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

   public function index()
{
    $pagina = Pagina::all();

    $nichos = Pagina::select('nicho')
        ->distinct()
        ->whereNotNull('nicho')
        ->where('nicho', '!=', '')
        ->orderBy('nicho')
        ->pluck('nicho');

    return view(
        'admin.fuentes.index',
        compact('pagina', 'nichos')
    );
}

  public function buscarNicho(Request $request)
{
    $paginas = Pagina::where(
        'nicho',
        $request->nicho
    )->get();

    return response()->json($paginas);
}
    public function create()
    {
        
    }


    public function store(Request $request)
    {
        $request->validate(['nombre' => 'required', 'url' => 'required']);
        
        $pagina = new Pagina();
        $pagina->nombre = $request->post('nombre');
        $pagina->tipo = $request->post('tipo');
        $pagina->url = $request->post('url');
        $pagina->nicho = $request->post('nicho');
        $pagina->descripcion = $request->post('descripcion');
        $pagina->save();

        return redirect()->back()->with("success", "Agregado Correctamanete");
    }
  
    public function show(string $id)
    {
        $pagina  = Pagina::find($id);
        return view('admin.fuentes.delete', compact('pagina'));
   
    }


    public function edit(string $id)
    {
        $pagina  = Pagina::find($id);
        return view('admin.fuentes.update', compact('pagina'));
    }

  
   public function update(Request $request, string $id)
    {
        $pagina = Pagina::find($id);
        $request->validate(['nombre' => 'required']);
        
        $pagina->nombre = $request->post('nombre');
        $pagina->tipo = $request->post('tipo');
        $oldUrl = $pagina->url; // Guardamos la URL vieja para comparar
        $pagina->url = $request->post('url');
        $pagina->nicho = $request->post('nicho');
        $pagina->descripcion = $request->post('descripcion');
        
     
        $pagina->save();
       
        return redirect()->route("Fuentes.index")->with("success", "Actualizado con éxito!");
    }
// MÉTODO PRIVADO: El motor que genera la imagen
    private function generateThumbnail($url, $id)
    {
        $fileName = 'screenshot_' . $id . '.jpg';
        // Guardamos en storage/app/public/screenshots/
        $path = 'screenshots/' . $fileName; 
        $fullPath = storage_path('app/public/' . $path);

        try {
            Browsershot::url($url)
                ->windowSize(1280, 720)
                ->save($fullPath);
            return $path; // Retornamos la ruta para guardarla en la BD
        } catch (\Exception $e) {
            return null; // O loguear el error si la web no carga
        }
    }
   
    public function destroy(string $id)
    {
        $pagina = Pagina::find($id);
        $pagina->delete();
        return redirect()->route("Fuentes.index")->with("success", "Eliminado con exito!");
    }
}