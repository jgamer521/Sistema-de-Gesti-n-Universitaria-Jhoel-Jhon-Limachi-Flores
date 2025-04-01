<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use App\Models\Gestion;
use App\Models\Nivel;

class AdminController extends Controller
{
    public function index()
    {
        $total_gestiones = Gestion::count();
        $total_carreras = Carrera::count();
        $total_niveles = Nivel::count();    
        return view('admin.index',compact('total_gestiones','total_carreras','total_niveles'));
    }
}
