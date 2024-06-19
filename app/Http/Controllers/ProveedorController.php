<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proveedor;

class ProveedorController extends Controller
 {/**
     * Display a listing of the resource.
     */
    public function index()
    {
        $proveedores = Proveedor::all();
        return view('proveedores.index', compact('proveedores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('proveedores.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'proveedor_id' => 'required|string|max:255|unique:proveedor,proveedor_id',
            'nombre' => 'required|string|max:255',
            'información_personal.email' => 'required|string|email|max:255',
            'información_personal.telefono' => 'required|string|max:15',
            'información_personal.dirección' => 'required|string|max:255',
            'productos_suministrados' => 'required|array|min:1',
            'productos_suministrados.*.product_id' => 'required|string|max:255',
            'productos_suministrados.*.cantidad' => 'required|integer|min:1',
            'bodegas_suministradas' => 'required|array|min:1',
            'bodegas_suministradas.*' => 'required|string|max:255',
        ]);

        Proveedor::create($validated);

        return redirect()->route("proveedores.index")->with([
            "message" => "Proveedor creado exitosamente",
            "type" => "success"
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Proveedor $proveedor)
    {
        return view('proveedores.form', compact('proveedor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Proveedor $proveedor)
    {
        $validated = $request->validate([
            'proveedor_id' => 'required|string|max:255|unique:proveedors,proveedor_id,' . $proveedor->_id,
            'nombre' => 'required|string|max:255',
            'información_personal.email' => 'required|string|email|max:255',
            'información_personal.telefono' => 'required|string|max:15',
            'información_personal.dirección' => 'required|string|max:255',
            'productos_suministrados' => 'required|array|min:1',
            'productos_suministrados.*.product_id' => 'required|string|max:255',
            'productos_suministrados.*.cantidad' => 'required|integer|min:1',
            'bodegas_suministradas' => 'required|array|min:1',
            'bodegas_suministradas.*' => 'required|string|max:255',
        ]);

        $proveedor->update($validated);

        return redirect()->route("proveedores.index")->with([
            "message" => "Proveedor actualizado exitosamente",
            "type" => "success"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Proveedor $proveedor)
    {
        $proveedor->delete();

        return redirect()->route("proveedores.index")->with([
            "message" => "Proveedor eliminado exitosamente",
            "type" => "success"
        ]);
    }
}
