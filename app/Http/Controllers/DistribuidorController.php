<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Distribuidor;
use App\Models\Producto;
use App\Models\Cliente;

class DistribuidorController extends Controller
{
   /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $distribuidores = Distribuidor::all();
        return view('distribuidores.index', compact('distribuidores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('distribuidores.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'dist_id' => 'required|string|max:255|unique:distribuidors,dist_id',
            'nombre' => 'required|string|max:255',
            'informacion_contacto.email' => 'required|string|email|max:255',
            'informacion_contacto.telefono' => 'required|string|max:15',
            'informacion_contacto.direccion' => 'required|string|max:255',
            'regiones_distribucion' => 'required|array|min:1',
            'productos_distribuidos' => 'required|array|min:1',
            'productos_distribuidos.*.product_id' => 'required|string|max:255',
            'productos_distribuidos.*.cantidad' => 'required|integer|min:1',
            'contratos' => 'required|array|min:1',
            'historial_entregas' => 'required|array|min:1',
            'historial_entregas.*.id_entrega' => 'required|string|max:255',
            'historial_entregas.*.fecha' => 'required|date_format:Y-m-d',
            'historial_entregas.*.productos_entregados' => 'required|array|min:1',
            'historial_entregas.*.productos_entregados.*.product_id' => 'required|string|max:255',
            'historial_entregas.*.productos_entregados.*.cantidad' => 'required|integer|min:1',
            'historial_entregas.*.id_cliente' => 'required|string|max:255',
        ]);
    
        Distribuidor::create($validated);
    
        return redirect()->route("distribuidores.index")->with([
            "message" => "Distribuidor creado exitosamente",
            "type" => "success"
        ]);
    }
    
    /**
     * Display the specified resource.
     */
    public function show(Distribuidor $distribuidor)
    {
        return view('distribuidores.show', compact('distribuidor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Distribuidor $distribuidor)
    {
        return view('distribuidores.form', compact('distribuidor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Distribuidor $distribuidor)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'informacion_contacto.email' => 'required|string|email|max:255',
            'informacion_contacto.telefono' => 'required|string|max:15',
            'informacion_contacto.direccion' => 'required|string|max:255',
            'regiones_distribucion' => 'required|array|min:1',
            'productos_distribuidos' => 'required|array|min:1',
            'productos_distribuidos.*.product_id' => 'required|string|max:255',
            'productos_distribuidos.*.cantidad' => 'required|integer|min:1',
            'contratos' => 'required|array|min:1',
            'historial_entregas' => 'required|array|min:1',
            'historial_entregas.*.id_entrega' => 'required|string|max:255',
            'historial_entregas.*.fecha' => 'required|date_format:Y-m-d',
            'historial_entregas.*.productos_entregados' => 'required|array|min:1',
            'historial_entregas.*.productos_entregados.*.product_id' => 'required|string|max:255',
            'historial_entregas.*.productos_entregados.*.cantidad' => 'required|integer|min:1',
            'historial_entregas.*.id_cliente' => 'required|string|max:255',
        ]);
    
        $distribuidor->update($validated);
    
        return redirect()->route("distribuidores.index")->with([
            "message" => "Distribuidor actualizado exitosamente",
            "type" => "success"
        ]);
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Distribuidor $distribuidor)
    {
        $distribuidor->delete();

        return redirect()->route("distribuidores.index")->with([
            "message" => "Distribuidor eliminado exitosamente",
            "type" => "success"
        ]);
    }
}
