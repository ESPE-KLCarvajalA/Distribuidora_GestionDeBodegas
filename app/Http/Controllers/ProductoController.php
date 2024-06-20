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


    // ProductosController.php

public function index(Request $request)
{
    $search = $request->input('search');

    if ($search) {
        $productos = Producto::where('nombre_producto', 'like', '%' . $search . '%')->get();
    } else {
        $productos = Producto::all();
    }

    return view('productos.index', compact('productos'));
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // No se necesita pasar proveedores si no se va a seleccionar uno
        return view('productos.create');
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

        if (!$producto) {
            return redirect()->route('productos.index')->with([
                'message' => 'Producto no encontrado',
                'type' => 'error'
            ]);
        }

 $proveedores = Proveedor::all(); // Obtener todos los proveedores
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
