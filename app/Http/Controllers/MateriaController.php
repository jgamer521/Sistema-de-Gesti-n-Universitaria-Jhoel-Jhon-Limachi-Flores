<?php

namespace App\Http\Controllers;

use App\Models\Materia;
use App\Models\Carrera;
use Illuminate\Http\Request;

class MateriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $materias = Materia::all();
        return view('admin.materias.index', compact('materias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $carreras = Carrera::all();
        return view('admin.materias.create', compact('carreras'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'carrera_id' => 'required|exists:carreras,id',
            'nombre'     => 'required|string|max:255',
            'codigo'     => 'required|string|max:50',
        ]);

        Materia::create($request->all());

        return redirect()->route('admin.materias.index')
            ->with('mensaje', 'Materia creada correctamente')
            ->with('icono', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //$materia =Materia::find($id);
        //return view('admin.materias.show', compact('materia'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $materia = Materia::find($id);
        $carreras =Carrera::all();
        return view('admin.materias.edit', compact('materia', 'carreras'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'carrera_id' => 'required|exists:carreras,id',
            'nombre'     => 'required|string|max:255',
            'codigo'     => 'required|string|max:50',
        ]);

        $materia = Materia::findOrFail($id);
        $materia->update($request->all());

        return redirect()->route('admin.materias.index')
            ->with('mensaje', 'Materia actualizada correctamente')
            ->with('icono', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $materia = Materia::find($id);
        $materia->delete();

        return redirect()->route('admin.materias.index')
            ->with('mensaje', 'Materia eliminada correctamente')
            ->with('icono', 'success');
    }
}