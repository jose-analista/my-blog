<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UsuarioController extends Controller
{
   
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = User::all();
        return view('admin.usuario.index', compact('user'));

    }

   
    public function create()
    {
        
    }

  
    public function store(Request $request)
    {
        $user = new User();
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'fono' => 'required',
            'password' => 'required|min:8',
            'role_as' => 'required',
            'imagen' => 'required',
        ]);
        $user->name = $request->post('name');
        $user->email = $request->post('email');
        $user->fono = $request->post('fono');
        $user->password = Bcrypt($request->post('password'));
        $user->role_as = $request->post('role_as');
        if($request->hasFile('imagen')){
            $imagen = $request->file('imagen');
            $url = 'img/usuario/';
            $nombreimagen = time() . '-' . $imagen->getClientOriginalName();
            $uploadSuccess = $request->file('imagen')->move($url,$nombreimagen);
            $user->imagen = $url. $nombreimagen;
        }
        $user->save();
        return redirect()->back()->with("success", "Agregado con exito!");
    }

   
    public function show(string $id)
    {
        $user  = User::find($id);
        return view('admin.usuario.delete', compact('user'));
    }

 
    public function edit(string $id)
    {
        $user  = User::find($id);
        return view('admin.usuario.update', compact('user'));
    }

    public function update(Request $request, string $id)
    {
        $user  = User::find($id);
        $user->name = $request->post('name');
        $user->email = $request->post('email');
        $user->fono = $request->post('fono');
        $user->password = Bcrypt($request->post('password'));
        $user->role_as = $request->post('role_as');
        if($request->hasFile('imagen')){
            $imagen = $request->file('imagen');
            $url = 'img/usuario/';
            $nombreimagen = time() . '-' . $imagen->getClientOriginalName();
            $uploadSuccess = $request->file('imagen')->move($url,$nombreimagen);
            $user->imagen = $url. $nombreimagen;
        }
        $user->save();
        return redirect()->back()->with("success", "Actualizado con exito!");
    }

    public function destroy(string $id)
    {
        $user  = User::find($id);
        $user->delete();
        return redirect()->route("User.index")->with("success", "Eliminado con exito!");
    }

   /**
    * The above code defines two functions in PHP for handling user configuration settings, one for
    * retrieving the settings and one for updating them.
    * 
    * @param string id The "id" parameter is a string that represents the unique identifier of a user.
    * It is used to find and retrieve the user from the database in the "configuration" and
    * "updateconfiguration" methods.
    * 
    * @return The first function is returning a view called 'admin.usuario.settings' with the variable
    * 'usuario' passed to it.
    */
    public function configuration(string $id)
    {
        $usuario  = User::find($id);
        return view('admin.usuario.settings', compact('usuario'));
    }

    public function updateconfiguration(Request $request, string $id)
    {
        $usuario  = User::find($id);
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
        if($request->hasFile('imagen')){
            $imagen = $request->file('imagen');
            $url = 'img/usuario/';
            $nombreimagen = time() . '-' . $imagen->getClientOriginalName();
            $uploadSuccess = $request->file('imagen')->move($url,$nombreimagen);
            $usuario->imagen = $url. $nombreimagen;
        }
        $usuario->name = $request->post('name');
        $usuario->email = $request->post('email');
        $usuario->password = bcrypt($request->post('password'));
        $usuario->save();
       
        return redirect()->back()->with("success", "Actualizado con exito!");
    }
}
