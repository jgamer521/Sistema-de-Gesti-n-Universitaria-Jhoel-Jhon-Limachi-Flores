<?php

namespace App\Http\Controllers;

use App\Models\Configuracion;
use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;

class ConfiguracionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $configuracion = Configuracion::first();
        return view('admin.configuraciones.index',compact('configuracion'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'nombre' => 'required|string|max:255',  
        'descripcion' => 'required|string|max:255',
        'direccion' => 'required|string|max:255',
        'telefono' => 'required|string|max:20',
        'email' => 'required|email|max:255',
        'web' => 'nullable|url|max:255',
        'logo' => 'image|mimes:jpeg,png,jpg',
    ]);

    // Buscar si existe un registro 
    $configuracion = Configuracion::first();

    // Si hay un archivo de logo, lo procesamos
    if ($request->hasFile('logo')) {
        $logo = $request->file('logo');
        $nombreArchivo = time() . '_' . $logo->getClientOriginalName();
        $rutaDestino = public_path('uploads/logos');
        $logo->move($rutaDestino, $nombreArchivo);
        $logoPath = 'uploads/logos/' . $nombreArchivo;
    } else {
        // Si no se sube un nuevo logo, mantener el actual
        $logoPath = $configuracion->logo ?? null;
    }

    if ($configuracion) {
        // Si existe, actualizar
        $configuracion->update([
            'nombre' => $request->nombre,
            'descripcion'=> $request->descripcion,
            'direccion'=> $request->direccion,
            'telefono'=> $request->telefono,
            'email'=> $request->email,
            'web'=> $request->web, 
            'logo'=> $logoPath,
        ]);
    } else {
        // Si no existe, crear una nueva configuración
        Configuracion::create([
            'nombre' => $request->nombre,
            'descripcion'=> $request->descripcion,
            'direccion'=> $request->direccion,
            'telefono'=> $request->telefono,
            'email'=> $request->email,
            'web'=> $request->web, 
            'logo'=> $logoPath,
        ]);
    }

    return redirect()->back()
        ->with('mensaje', 'Configuración guardada correctamente')
        ->with('icono', 'success');
}


    /**
     * Display the specified resource.
     */
    public function show(Configuracion $configuracion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Configuracion $configuracion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Configuracion $configuracion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Configuracion $configuracion)
    {
        //
    }
}
