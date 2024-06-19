<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bodega;
use App\Models\Proveedor;
use App\Models\Producto;
use App\Models\Distribuidor;

class BodegaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bodegas = Bodega::all();
        return view('bodegas.index', compact('bodegas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('bodegas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'Bod_id' => 'required|string|unique:bodegas,Bod_id',
            'ubicacion' => 'required|string|max:255',
            'capacidad' => 'required|integer',
            'inventario_actual' => 'required|array',
            'inventario_actual.*.proveedor_id' => 'required|string|max:255',
            'inventario_actual.*.product_id' => 'required|string|max:255',
            'inventario_actual.*.cantidad' => 'required|integer',
            'gerentes' => 'required|array',
            'gerentes.*.id' => 'required|string|max:255',
            'gerentes.*.nombre' => 'required|string|max:255',
            'gerentes.*.informacion_contacto.email' => 'required|string|email|max:255',
            'gerentes.*.informacion_contacto.telefono' => 'required|string|max:15',
            'historial_envios' => 'required|array',
            'historial_envios.*.id' => 'required|string|max:255',
            'historial_envios.*.fecha' => 'required|date',
            'historial_envios.*.productos_enviados' => 'required|array',
            'historial_envios.*.productos_enviados.*.product_id' => 'required|string|max:255',
            'historial_envios.*.productos_enviados.*.cantidad' => 'required|integer',
            'historial_envios.*.dist_id' => 'required|string|max:255'
        ]);

        Bodega::create($validated);

        return redirect()->route('bodegas.index')->with([
            'message' => 'Bodega creada exitosamente',
            'type' => 'success'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Bodega $bodega)
    {
        return view('bodegas.show', compact('bodega'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bodega $bodega)
    {
        return view('bodegas.edit', compact('bodega'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bodega $bodega)
    {
        $validated = $request->validate([
            'Bod_id' => 'required|string|max:255|unique:bodegas,Bod_id,' . $bodega->id,
            'ubicacion' => 'required|string|max:255',
            'capacidad' => 'required|integer',
            'inventario_actual' => 'required|array',
            'inventario_actual.*.proveedor_id' => 'required|string|max:255',
            'inventario_actual.*.product_id' => 'required|string|max:255',
            'inventario_actual.*.cantidad' => 'required|integer',
            'gerentes' => 'required|array',
            'gerentes.*.id' => 'required|string|max:255',
            'gerentes.*.nombre' => 'required|string|max:255',
            'gerentes.*.informacion_contacto.email' => 'required|string|email|max:255',
            'gerentes.*.informacion_contacto.telefono' => 'required|string|max:15',
            'historial_envios' => 'required|array',
            'historial_envios.*.id' => 'required|string|max:255',
            'historial_envios.*.fecha' => 'required|date',
            'historial_envios.*.productos_enviados' => 'required|array',
            'historial_envios.*.productos_enviados.*.product_id' => 'required|string|max:255',
            'historial_envios.*.productos_enviados.*.cantidad' => 'required|integer',
            'historial_envios.*.dist_id' => 'required|string|max:255'
        ]);

        $bodega->update($validated);

        return redirect()->route('bodegas.index')->with([
            'message' => 'Bodega actualizada exitosamente',
            'type' => 'success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bodega $bodega)
    {
        $bodega->delete();

        return redirect()->route('bodegas.index')->with([
            'message' => 'Bodega eliminada exitosamente',
            'type' => 'success'
        ]);
    }
}