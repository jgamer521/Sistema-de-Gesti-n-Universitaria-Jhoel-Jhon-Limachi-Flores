<?php

namespace App\Http\Controllers;

use App\Models\Paralelo;
use Illuminate\Http\Request;

class ParaleloController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paralelos = Paralelo::all();
        return view('admin.paralelos.index',compact('paralelos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.paralelos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre'      => 'required|string|max:255',
        ]);

        Paralelo::create($request->all());

        return redirect()->route('admin.paralelos.index')
            ->with('mensaje', 'Paralelo creado correctamente')
            ->with('icono', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Paralelo $paralelo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $paralelo = Paralelo::findOrFail($id);
        return view('admin.paralelos.edit', compact('paralelo'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre'      => 'required|string|max:255',
        ]);

        $paralelo = Paralelo::findOrFail($id);
        $paralelo->update($request->all());

        return redirect()->route('admin.paralelos.index')
            ->with('mensaje', 'Paralelo actualizado correctamente')
            ->with('icono', 'success');
    }

    public function destroy($id)
    {
        $paralelo = Paralelo::findOrFail($id);
        $paralelo->delete();

        return redirect()->route('admin.paralelos.index')
            ->with('mensaje', 'Paralelo eliminado correctamente')
            ->with('icono', 'success');
    }
}
