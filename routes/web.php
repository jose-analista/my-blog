<?php

// Agregar esta clase para redireccionar
use App\Http\Controllers\Admin\ClienteController;
// modelos
use App\Http\Controllers\Admin\ContactoController;
use App\Http\Controllers\Admin\CorreoController;
use App\Http\Controllers\Admin\DocumentoController;
use App\Http\Controllers\Admin\EducacionController;
use App\Http\Controllers\Admin\EmpresaController;
use App\Http\Controllers\Admin\ExperienciaController;
use App\Http\Controllers\Admin\FuentesController;
use App\Http\Controllers\Admin\InteraccionController;
use App\Http\Controllers\Admin\OportunidadesController;
// controlador
use App\Http\Controllers\Admin\PhpmyadminController;
use App\Http\Controllers\Admin\ProyectoController;
use App\Http\Controllers\Admin\PyAccountantController;
use App\Http\Controllers\Admin\RequisitosController;
use App\Http\Controllers\Admin\ServicioController;
use App\Http\Controllers\Admin\TareaController;
use App\Http\Controllers\Admin\TecnologiaController;
use App\Http\Controllers\Admin\UsuarioController;
use App\Http\Controllers\Admin\VentaController;
use App\Http\Controllers\ContactoControllerform;
use App\Http\Controllers\HomeController;
use App\Models\Cliente;
use App\Models\Contacto;
use App\Models\Educacion;
use App\Models\Empresa;
use App\Models\ExperienciaProfesional;
use App\Models\Proyecto;
use App\Models\Tecnologia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Agregar esta línea para redireccionar al momento de solo ingresar /Mi_blog
Route::get('/Mi_blog', function () {
    return redirect('/Mi_blog/public');
});

Route::get('/', function () {
    $experiencia = ExperienciaProfesional::all();
    $educacion = Educacion::all();
    $empresa = Empresa::all();
    $cliente = Cliente::all();
    $proyecto = Proyecto::where('estado', '1')->get();
    $tecnologia = Tecnologia::all();

    return view('welcome', compact('tecnologia', 'proyecto', 'cliente', 'empresa', 'educacion', 'experiencia'));
})->name('Welcome');

Route::get('descargar-archivo', [ContactoControllerform::class, 'descargarArchivo'])->name('Cv.pdf');

Auth::routes();

Route::post('store-contacto', [ContactoControllerform::class, 'store'])->name('Contacto.store');

Route::prefix('admin')->middleware('auth', 'isAdmin')->group(function () {

    Route::resource('/requisitos', RequisitosController::class)->names('Requisito');
    Route::get('/test-onlyoffice', function () {
        return 'ONLYOFFICE funcionando';
    });

    Route::resource('/correo', CorreoController::class)->names('Correo');
    Route::get(
        '/tareas/proyecto/{id}',

        [TareaController::class, 'mostrarProyecto']

    )->name('Tareas.proyecto');
    Route::post(
        '/admin/correo/enviar',
        [CorreoController::class, 'enviar']
    )->name('correo.enviar');

    Route::get(
        '/admin/markdown/export-all',
        [DocumentoController::class, 'exportAllZip']
    )->name('admin.markdown.exportAll');

    Route::get('/documento/{id}', [ProyectoController::class, 'verDocumento'])
        ->name('documento.ver');

    Route::get('/empresa/buscar-sector', [EmpresaController::class, 'buscarSector'])->name('Buscar.sector');

    Route::get(
        '/fuentes/buscar-nicho',
        [FuentesController::class, 'buscarNicho']
    )->name('Fuentes.buscarNicho');

    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::resource('interaccion', InteraccionController::class)->names('Interaccion');
    // Empresa

    Route::resource('empresa', EmpresaController::class)->names('Empresa');

    // Fuente

    Route::resource('fuente', FuentesController::class)->names('Fuentes');

    // Cliente

    Route::resource('cliente', ClienteController::class)->names('Cliente');

    // Proyecto

    Route::resource('proyecto', ProyectoController::class)->names('Proyecto');

    // actualizar imagen
    Route::put('edit-proyecto-imagen/{id}', [ProyectoController::class, 'storeimagen'])->name('Proyecto.edit.image');

    // fin proyecto

    // Contacto

    Route::resource('contacto', ContactoController::class)->names('Contacto');

    // Teclogía

    Route::resource('tecnologia', TecnologiaController::class)->names('Tecnologia');

    // venta

    Route::resource('venta', VentaController::class)->names('Venta');
    Route::get('/venta/imprimir/{id}',
        [VentaController::class, 'imprimir'])
        ->name('Venta.imprimir');

    // Usuario

    Route::get('configuration-user/{id}', [UsuarioController::class, 'configuration'])->name('Usuario.configuration');

    Route::put('updateconfiguration-user/{id}', [UsuarioController::class, 'updateconfiguration'])->name('Usuario.configurationupdate');

    // Educación

    Route::resource('educacion', EducacionController::class)->names('Educacion');

    // Experiencia

    Route::resource('experiencia', ExperienciaController::class)->names('Experiencia');
    // fin experiencia

    // User

    Route::resource('user', UsuarioController::class)->names('User');

    // fin user
    Route::get('PyAccountant', [PyAccountantController::class, 'index'])->name('PyAccountant.index');

    Route::get('Phpmyadmin', [PhpmyadminController::class, 'index'])->name('Phpmyadmin.index');

    // Route::get('PyAccountant/apagar', [PyAccountantController::class, 'stopApp'])->name('stopApp');
    // Route::get('PyAccountant/iniciar', [PyAccountantController::class, 'startApp'])->name('startApp');

    // oportunidad

    Route::resource('oportunidad', OportunidadesController::class)->names('Oportunidad');

    Route::resource('tareas', TareaController::class)->names('Tareas');

    Route::put('/tareas/{id}/completar', [TareaController::class, 'completar'])
        ->name('Tareas.completar');

    Route::get('/notificacion/{id}', [TareaController::class, 'leerNotificacion'])->name('notificacion.leer');

    Route::resource('servicios', ServicioController::class)->names('Servicios');

    Route::get('/ver-documento', [DocumentoController::class, 'show'])->name('Markdown.show');

    Route::get('/admin/markdown/view/{filename}', [DocumentoController::class, 'view'])->name('admin.markdown.view');

    Route::post('/admin/markdown/update/{filename}', [DocumentoController::class, 'update'])->name('admin.markdown.update');

    Route::post('/admin/markdown/store', [DocumentoController::class, 'store'])->name('admin.markdown.store');

    Route::post('/admin/markdown/rename/{filename}', [DocumentoController::class, 'rename'])->name('admin.markdown.rename');

    Route::delete('/admin/markdown/destroy/{filename}', [DocumentoController::class, 'destroy'])->name('admin.markdown.destroy');
    Route::delete('/markdown/image/{filename}', [DocumentoController::class, 'deleteImage'])
        ->name('markdown.image.delete');

    Route::post(
        '/markdown/svg',
        [DocumentoController::class, 'saveSvg']
    )->name('markdown.svg.save');

    Route::put(
        '/markdown/svg/{filename}',
        [DocumentoController::class, 'updateSvg']
    )->name('markdown.svg.update');

    Route::get('/accounts/leer', [HomeController::class, 'leer']);

    Route::post('/accounts/guardar', [HomeController::class, 'guardar']);

});
