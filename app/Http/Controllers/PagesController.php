<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estudiante;


class PagesController extends Controller
{
    
    public function fnIndex(){
        return view('welcome');
    }

    public function fnEstActualizar($id){
        $xActAlumnos = Estudiante::findOrFail($id);
        return view('Estudiante.pagActualizar', compact('xActAlumnos'));
    }

    public function fnUpdate(Request $request, $id){        //Paso 2
        //return $request->all();         //Prueba de "token" y datos recibidos
        $xUpdateAlumnos = Estudiante::findOrFail($id);

        $xUpdateAlumnos->codEst = $request->codEst;
        $xUpdateAlumnos->nomEst = $request->nomEst;
        $xUpdateAlumnos->apeEst = $request->apeEst;
        $xUpdateAlumnos->fnaEst = $request->fnaEst;
        $xUpdateAlumnos->turMat = $request->turMat;
        $xUpdateAlumnos->semMat = $request->semMat;
        $xUpdateAlumnos->estMat = $request->estMat;
        
        $xUpdateAlumnos->save();
    
        return back()->with('msj','Se actualizó con éxito...');  //Regresar con msj
    }

    public function fnEliminar(Request $request, $id){
        $deleteAlumno = Estudiante::findOrFail($id);
        $deleteAlumno->delete();
        return back()->with('msj','Se elimino con éxito...');
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

    public function fnSeguimiento(){
        $xAlumnos = Estudiante::all();   
        return view('pagSeguimiento', compact('xAlumnos'));
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


