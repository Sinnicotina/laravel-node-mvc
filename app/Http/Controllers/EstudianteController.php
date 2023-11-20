<?php

namespace App\Http\Controllers;
use App\Models\Estudiante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        {
            $estudiantes=DB::table('estudiante')
            ->join('carrera', 'estudiante.carre_codi','=','carrera.carre_codi')
            ->select('estudiante.*',"carrera.carre_nomb")
            ->get();
            return view('estudiante.index', ['estudiantes'=>$estudiantes]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $carreras=DB::table('carrera')
        ->orderBy('carre_nomb')
        ->get();
        return view ('estudiante.new', ['carreras'=>$carreras]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $estudiante=new Estudiante();
        $estudiante->estu_nom=$request->name;
        $estudiante->carre_codi=$request->code;
        $estudiante->save();
        $estudiantes=DB::table('estudiante')
            ->join('carrera', 'estudiante.carre_codi','=','carrera.carre_codi')
            ->select('estudiante.*',"carrera.carre_nomb")
            ->get();
            return view('estudiante.index', ['estudiantes'=>$estudiantes]);
        
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $estudiante=Estudiante::find($id);
        $carreras=DB::table(('carrera'))
        ->orderBy('carre_nomb')
        ->get();
        return view('estudiante.edit',['estudiante'=>$estudiante,'carreras'=>$carreras]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $estudiante=Estudiante::find($id);
        $estudiante->estu_nom=$request->name;
        $estudiante->carre_codi=$request->code;
        $estudiante->save();
        
        $estudiantes=DB::table('estudiante')
            ->join('carrera', 'estudiante.carre_codi','=','carrera.carre_codi')
            ->select('estudiante.*',"carrera.carre_nomb")
            ->get();
            
            return view ('estudiante.index',['estudiantes'=>$estudiantes]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $estudiante= Estudiante::find($id);
        
        $estudiante->delete();
        $estudiantes=DB::table('estudiante')
        ->join('carrera', 'estudiante.carre_codi','=','carrera.carre_codi')
        ->select('estudiante.*',"carrera.carre_nomb")
        ->get();
        return view('estudiante.index',['estudiantes'=>$estudiantes]);
    }
}
