<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Empresa;
use App\Models\Proyecto;
use App\Models\Tareas;
use App\Models\User;
use App\Models\Venta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class HomeController extends Controller
{
    private $ruta;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $totalproyecto = Proyecto::count();
        $totalEmpresas = Empresa::count();
        $totalcliente = Cliente::count();
        $user = User::all();
        // Tareas
        $pendientes = Tareas::where('completada', 0)->count();

        $completadas = Tareas::where('completada', 1)->count();

        // 🔥 VENTAS (como ya tenías)
        $venta = Venta::all();
        $puntos = [];

        foreach ($venta as $sale) {
            $puntos[] = ['y' => floatval($sale->precio)];
        }

        // 🔥 EMPRESAS POR DÍA (NUEVO)
        $empresasPorDia = Empresa::selectRaw('
            DATE(created_at) as fecha,
            COUNT(*) as total
        ')
            ->groupBy('fecha')
            ->orderBy('fecha')
            ->get();

        $fechas = [];
        $totales = [];

        foreach ($empresasPorDia as $item) {
            $fechas[] = date('d-m', strtotime($item->fecha)); // formato bonito
            $totales[] = $item->total;
        }

        // VENTAS POR DÍA
        $ventasPorDia = Venta::selectRaw('
    DATE(created_at) as fecha,
    SUM(precio) as total
')
            ->groupBy('fecha')
            ->orderBy('fecha')
            ->get();

        $fechasVentas = [];
        $totalesVentas = [];

        foreach ($ventasPorDia as $item) {
            $fechasVentas[] = date('d-m', strtotime($item->fecha));
            $totalesVentas[] = (float) $item->total;
        }

        return view('home', compact(
            'totalcliente',
            'totalEmpresas',
            'totalproyecto',
            'venta',
            'user',
            'fechas',
            'totales',
            'pendientes',
            'completadas',
            'fechasVentas',
            'totalesVentas'
        ), [
            'data' => json_encode($puntos),
        ]);
    }

    private $path = 'accounts.json';

    public function leer(Request $request)
    {
        try {
            $keyIngresada = $request->query('key');
            $keyMaestra = env('CLAVE_VAULT');

            // 1. Validamos la clave del .env
            if ($keyIngresada !== $keyMaestra) {
                return response()->json(['error' => 'La clave no coincide con el .env'], 403);
            }

            // Preparamos el encripter (SHA256 para asegurar 32 bytes)
            $hashedKey = substr(hash('sha256', $keyMaestra), 0, 32);
            $encrypter = new \Illuminate\Encryption\Encrypter($hashedKey, 'AES-256-CBC');

            // 2. Si NO existe el archivo, lo creamos vacío pero ENCRIPTADO
            if (! \Storage::exists('accounts.json')) {
                $jsonVacio = json_encode([]); // Array vacío
                $cifradoInicial = $encrypter->encrypt($jsonVacio);

                \Storage::put('accounts.json', $cifradoInicial);

                return response()->json([]); // Devolvemos el array vacío al JS
            }

            // 3. Si existe, lo leemos y desencriptamos
            $encriptado = \Storage::get('accounts.json');
            $decrypted = $encrypter->decrypt($encriptado);

            return response()->json(json_decode($decrypted));

        } catch (\Exception $e) {
            // Si el error es "The MAC is invalid", es porque la clave cambió
            // o el archivo se corrompió.
            return response()->json([
                'error' => 'Error al procesar el Vault: '.$e->getMessage(),
            ], 403);
        }
    }

    public function guardar(Request $request)
    {
        $key = $request->input('key');
        $datos = $request->input('datos');

        $hashedKey = substr(hash('sha256', $key), 0, 32);
        $encrypter = new Encrypter($hashedKey, 'AES-256-CBC');

        $encrypted = $encrypter->encrypt(json_encode($datos));
        Storage::put($this->path, $encrypted);

        return response()->json(['status' => 'OK']);
    }

    // ➕ AGREGAR / ACTUALIZAR CAMPO
    public function actualizar(Request $request)
    {
        try {
            $key = $request->input('key');
            $value = $request->input('value');

            $datos = $this->obtenerDatos();

            $datos[$key] = $value;

            $this->guardarInterno($datos);

            return response()->json(['status' => 'ok']);

        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al actualizar'], 500);
        }
    }

    // ❌ ELIMINAR CAMPO
    public function eliminar(Request $request)
    {
        try {
            $key = $request->input('key');

            $datos = $this->obtenerDatos();

            unset($datos[$key]);

            $this->guardarInterno($datos);

            return response()->json(['status' => 'ok']);

        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al eliminar'], 500);
        }
    }

    // 🔒 FUNCIÓN INTERNA PARA LEER
    private function obtenerDatos()
    {
        if (! file_exists($this->ruta)) {
            return [];
        }

        $contenido = file_get_contents($this->ruta);
        $json = Crypt::decryptString($contenido);

        return json_decode($json, true) ?? [];
    }

    // 🔒 FUNCIÓN INTERNA PARA GUARDAR
    private function guardarInterno($data)
    {
        $json = json_encode($data);
        $encrypted = Crypt::encryptString($json);

        file_put_contents($this->ruta, $encrypted);
    }

    // 🔑 ACCESO CON CLAVE EXTRA
    public function acceso(Request $request)
    {
        $clave = $request->input('clave');

        if ($clave !== env('CLAVE_VAULT')) {
            return response()->json([
                'error' => 'Acceso denegado',
            ], 403);
        }

        return $this->leer();
    }
}
