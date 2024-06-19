<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClienteFinal;

class ClienteFinalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientesFinales = ClienteFinal::all();
        return view('clientesfinales.index', compact('clientesFinales'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clientesfinales.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_cliente' => 'required|string|unique:clientefinal,id_cliente',
            'nombre' => 'required|string|max:255',
            'informacion_contacto.email' => 'required|string|email|max:255',
            'informacion_contacto.telefono' => 'required|string|max:15',
            'informacion_contacto.direccion' => 'required|string|max:255',
            'historial_compras' => 'required|array|min:1',
            'historial_compras.*.id_compra' => 'required|string|max:255',
            'historial_compras.*.product_id' => 'required|string|max:255',
            'historial_compras.*.cantidad' => 'required|integer|min:1',
            'historial_compras.*.fecha_compra' => 'required|date',
            'preferencias' => 'required|array|min:1',
            'preferencias.*' => 'required|string|max:255',
        ]);

        ClienteFinal::create($validated);

        return redirect()->route("clientesfinales.index")->with([
            "message" => "Cliente final creado exitosamente",
            "type" => "success"
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ClienteFinal $clientefinal)
    {
        return view('clientesfinales.edit', compact('clientefinal'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ClienteFinal $clientefinal)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'informacion_contacto.email' => 'required|string|email|max:255',
            'informacion_contacto.telefono' => 'required|string|max:15',
            'informacion_contacto.direccion' => 'required|string|max:255',
            'historial_compras' => 'required|array|min:1',
            'historial_compras.*.id_compra' => 'required|string|max:255',
            'historial_compras.*.product_id' => 'required|string|max:255',
            'historial_compras.*.cantidad' => 'required|integer|min:1',
            'historial_compras.*.fecha_compra' => 'required|date',
            'preferencias' => 'required|array|min:1',
            'preferencias.*' => 'required|string|max:255',
        ]);

        $clientefinal->update($validated);

        return redirect()->route("clientesfinales.index")->with([
            "message" => "Cliente final actualizado exitosamente",
            "type" => "success"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ClienteFinal $clientefinal)
    {
        $clientefinal->delete();

        return redirect()->route("clientesfinales.index")->with([
            "message" => "Cliente final eliminado exitosamente",
            "type" => "success"
        ]);
    }
}
