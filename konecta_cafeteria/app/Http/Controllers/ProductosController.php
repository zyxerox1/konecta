<?php

namespace App\Http\Controllers;

use App\Models\productos;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\DB;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('productos.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //se crea un array de las reglas
        $rules = [
            'Nombre_del_producto' => ['required','string'],
            'Referencia' => ['required','string'],
            'Precio' => ['required','integer'],
            'Peso'=> ['required','integer'],
            'Categoria' => ['required','string'],
            'Stock' => ['required',"integer"],
        ];
        $validatedData = $request->validate($rules);

        //se crea un producto
        $productos=new productos();
        $productos->nombre_producto=$request->Nombre_del_producto;
        $productos->referencia=$request->Referencia;
        $productos->precio=$request->Precio;
        $productos->peso=$request->Peso;
        $productos->categoria=$request->Categoria;
        $productos->stock=$request->Stock;
        $productos->save();
      
        return redirect('/')->withErrors($validatedData,'validacion');
    }

    public function get()
    {
        //se obtiene toda la lista de los produtos
    
        $data=productos::get();

        //se retorna como datatable
        return DataTables()->of($data)->addColumn('fecha_format', function ($data)  {
            return \Carbon\Carbon::parse($data->created_at)->format('d/m/Y H:i:s');
        })->toJson();
    }

    public function query($tipo)
    {
        //pregunta el tipo de consulta
        //1. stock mas vedidos
        //2. stock con mayor cantidad
        if($tipo==1){
            $data=productos::orderBy('productos.stock', 'desc')->first();
        }else{
            $subquery="(SELECT SUM(ventas.cantidad) as total_ventas, ventas.id_producto
            FROM ventas 
            GROUP BY ventas.id_producto) AS sub_query";
            $data=productos::join(DB::raw($subquery),"productos.id","=","sub_query.id_producto")->orderBy('sub_query.total_ventas', 'desc')->first();
        }

        return json_encode($data);
    }

    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function edit($id_producto)
    {
        $productos = productos::find($id_producto);
        
        //dd($productos->stock);
        return view('productos.actualizar', compact('productos'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_producto)
    {
        //se crea un array de las reglas
        $rules = [
            'Nombre_del_producto' => ['required','string'],
            'Referencia' => ['required','string'],
            'Precio' => ['required','integer'],
            'Peso'=> ['required','integer'],
            'Categoria' => ['required','string'],
            'Stock' => ['required',"integer"],
        ];
        $validatedData = $request->validate($rules);

        $productos = productos::find($id_producto);
        $productos->nombre_producto=$request->Nombre_del_producto;
        $productos->referencia=$request->Referencia;
        $productos->precio=$request->Precio;
        $productos->peso=$request->Peso;
        $productos->categoria=$request->Categoria;
        $productos->stock=$request->Stock;
        $productos->save();

        return redirect('/')->withErrors($validatedData,'validacion');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_productos)
    {
        productos::destroy($id_productos); 
        return redirect('/')->with('mensaje_correcto', 'Se eliminado exitosamente.');
    }
}
