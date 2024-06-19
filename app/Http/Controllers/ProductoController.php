<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Proveedor;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::all();
        return view('productos.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $proveedores = Proveedor::all(); // Obtener todos los proveedores para el formulario de creación
        return view('productos.create', compact('proveedores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|string|unique:productos',
            'nombre_producto' => 'required|string',
            'descripcion' => 'required|string',
            'precio' => 'required|numeric',
            'proveedor_id' => 'required|string|exists:proveedors,_id',
        ]);

        Producto::create($request->all());

        return redirect()->route('productos.index')->with([
            'message' => 'Producto creado correctamente',
            'type' => 'success'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $product_id
     * @return \Illuminate\Http\Response
     */
    public function show($product_id)
    {
        $producto = Producto::where('product_id', $product_id)->first();

        if (!$producto) {
            return redirect()->route('productos.index')->with([
                'message' => 'Producto no encontrado',
                'type' => 'error'
            ]);
        }

        return view('productos.show', compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $product_id
     * @return \Illuminate\Http\Response
     */
    public function edit($product_id)
    {
        $producto = Producto::where('product_id', $product_id)->first();
        $proveedores = Proveedor::all(); // Obtener todos los proveedores para el formulario de edición

        if (!$producto) {
            return redirect()->route('productos.index')->with([
                'message' => 'Producto no encontrado',
                'type' => 'error'
            ]);
        }

        return view('productos.edit', compact('producto', 'proveedores'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $product_id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $product_id)
    {
        $request->validate([
            'nombre_producto' => 'required|string',
            'descripcion' => 'required|string',
            'precio' => 'required|numeric',
            'proveedor_id' => 'required|string|exists:proveedors,_id',
        ]);

        $producto = Producto::where('product_id', $product_id)->first();

        if (!$producto) {
            return redirect()->route('productos.index')->with([
                'message' => 'Producto no encontrado',
                'type' => 'error'
            ]);
        }

        $producto->update($request->all());

        return redirect()->route('productos.index')->with([
            'message' => 'Producto actualizado correctamente',
            'type' => 'success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $product_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($product_id)
    {
        $producto = Producto::where('product_id', $product_id)->first();

        if (!$producto) {
            return redirect()->route('productos.index')->with([
                'message' => 'Producto no encontrado',
                'type' => 'error'
            ]);
        }

        $producto->delete();

        return redirect()->route('productos.index')->with([
            'message' => 'Producto eliminado correctamente',
            'type' => 'success'
        ]);
    }

}