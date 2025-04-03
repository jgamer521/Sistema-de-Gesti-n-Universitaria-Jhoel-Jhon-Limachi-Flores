<?php

namespace App\Http\Controllers;

use App\Models\Periodo;
use Illuminate\Http\Request;

class PeriodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $periodos = Periodo::all();
        return view('admin.periodos.index', compact('periodos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.periodos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre'      => 'required|string|max:255',
        ]);

        Periodo::create($request->all());

        return redirect()->route('admin.periodos.index')
            ->with('mensaje', 'Periodo creado correctamente')
            ->with('icono', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Periodo $periodo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $periodo = Periodo::findOrFail($id);
        return view('admin.periodos.edit', compact('periodo'));
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre'      => 'required|string|max:255',
        ]);

        $periodo = Periodo::findOrFail($id);
        $periodo->update($request->all());

        return redirect()->route('admin.periodos.index')
            ->with('mensaje', 'Periodo actualizado correctamente')
            ->with('icono', 'success');
    }

    public function destroy($id)
    {
        $periodo = Periodo::findOrFail($id);
        $periodo->delete();

        return redirect()->route('admin.periodos.index')
            ->with('mensaje', 'Paralelo eliminado correctamente')
            ->with('icono', 'success');
    }
}
