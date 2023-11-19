<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Estudiante;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $estudiantes=DB::table('estudiante')
        ->join('carrera', 'estudiante.carre_codi','=','carrera.carre_codi')
        ->select('estudiante.*',"carrera.carre_nomb")
        ->get();
        return json_encode(['estudiantes'=>$estudiantes]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $estudiante=new Estudiante();
        $estudiante->estu_nom=$request->estu_nom;
        $estudiante->carre_codi=$request->carre_codi;
        $estudiante->save();
        return json_encode(['estudiante'=>$estudiante]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $estudiante=Estudiante::find($id);
        
        $carreras=DB::table('carrera')
        ->orderBy('carre_nomb')
        ->get();
        return json_encode(['estudiante'=>$estudiante, 'carreras' => $carreras]);
    }

    /**
     * Update the specified resource in storage.
     * 
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    { 
        //
        $estudiante=Estudiante::find($id);
        $estudiante->estu_nom=$request->estu_nom;
        $estudiante->carre_codi=$request->carre_codi;
        $estudiante->save();
        return json_encode(['estudiante'=>$estudiante]);
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
            $estudiante= Estudiante::find($id);
        
        $estudiante->delete();
        $estudiantes=DB::table('estudiante')
        ->join('carrera', 'estudiante.carre_codi','=','carrera.carre_codi')
        ->select('estudiante.*',"carrera.carre_nomb")
        ->get();
        return json_encode(['estudiantes'=>$estudiantes, 'success'=>true]);
    }
}
