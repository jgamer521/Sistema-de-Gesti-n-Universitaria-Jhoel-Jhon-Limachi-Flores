<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use Illuminate\Http\Request;

class CarreraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $carreras = Carrera::all();
        return view('admin.carreras.index', compact('carreras'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.carreras.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        Carrera::create($request->all()); 

        return redirect()->route('admin.carreras.index')
            ->with('mensaje', 'Carrera creada correctamente')
            ->with('icono', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Carrera $carrera)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $carrera = Carrera::findOrFail($id); // Encuentra la carrera por ID
        return view('admin.carreras.edit', compact('carrera'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        $carrera = Carrera::findOrFail($id); // Encuentra la carrera por ID
        $carrera->update($request->all()); // Actualiza los datos de la carrera

        return redirect()->route('admin.carreras.index')
            ->with('mensaje', 'Carrera actualizada correctamente')
            ->with('icono', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $carrera = Carrera::findOrFail($id); // Encuentra la carrera por ID
        $carrera->delete(); // Elimina la carrera

        return redirect()->route('admin.carreras.index')
            ->with('mensaje', 'Carrera eliminada correctamente')
            ->with('icono', 'success');
    }
}
