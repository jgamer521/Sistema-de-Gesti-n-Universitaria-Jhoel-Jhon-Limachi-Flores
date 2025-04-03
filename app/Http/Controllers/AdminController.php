<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use App\Models\Gestion;
use App\Models\Nivel;
use App\Models\Paralelo;
use App\Models\Periodo;
use App\Models\Turno;
use App\Models\Materia;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $total_gestiones = Gestion::count();
        $total_carreras = Carrera::count();
        $total_niveles = Nivel::count();    
        $total_turnos = Turno::count();
        $total_paralelos = Paralelo::count();
        $total_periodos = Periodo::count();
        $total_materias = Materia::count();
        return view('admin.index',compact('total_gestiones','total_carreras','total_niveles','total_turnos','total_paralelos','total_periodos','total_materias'));
    }
}
