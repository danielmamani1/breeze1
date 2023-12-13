<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estudiante;
use App\Models\Seguimiento;

class PagesSeguimiento extends Controller
{
    public function fnSeguimiento(){
        $xAlumnos = Estudiante::all();      //Datos de BD
        return view('pagSeguimiento', compact('xAlumnos'));
    }
}
