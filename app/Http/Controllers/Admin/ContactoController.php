<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contacto;

class ContactoController extends Controller
{
   
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $contacto = Contacto::all();
        return view('admin.contacto.index', compact('contacto'));
    }

  
    public function create()
    {
        
    }

}
