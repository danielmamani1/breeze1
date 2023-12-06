<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Estudiante;
use App\Models\Estudiante_detalle;


class PagesController extends Controller
{
    
    public function fnIndex(){
        return view('welcome');
    }

    public function fnRegistrar (Request $request) {

        $request -> validate([
            'codEst'=>'required',
            'nomEst'=>'required',
            'apeEst'=>'required',
            'fnaEst'=>'required',
            'turMat'=>'required',
            'semMat'=>'required',
            'estMat'=>'required'
        ]);

        $nuevoEstudiante = new Estudiante;

        $nuevoEstudiante->codEst = $request->codEst;
        $nuevoEstudiante->nomEst = $request->nomEst;
        $nuevoEstudiante->apeEst = $request->apeEst;
        $nuevoEstudiante->fnaEst = $request->fnaEst;
        $nuevoEstudiante->turMat = $request->turMat;
        $nuevoEstudiante->semMat = $request->semMat;
        $nuevoEstudiante->estMat = $request->estMat;

        $nuevoEstudiante->save();
        return back() -> with('msj', 'Se registró con éxito...');
    }

    public function fnEstDetalle($id){
        $xDetAlumnos = Estudiante::findOrFail($id);      //Datos de BD por id
        return view('Estudiante.pagDetalle', compact('xDetAlumnos'));
    }

    public function fnLista(){
        $xAlumnos = Estudiante::all();      //Datos de BD
        return view('pagLista', compact('xAlumnos'));
    }
    
    public function fnGaleria($numero = 0){
        $valor = $numero;
        $otro = 25;
        return view('pagGaleria', compact('valor','otro'));
    }
}


