<?php

namespace App\Http\Controllers;

use App\Models\ventas;
use Illuminate\Http\Request;
use App\Models\productos;
use Illuminate\Support\Facades\DB;

class VentasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id=0,$cantidad=0)
    {
        $productos=productos::find($id);
        return view("ventas.index",compact("productos","cantidad"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $productos=productos::find($request->id_producto);
        if($productos!=null && ($productos->stock-$request->cantidad)>=0){
            
            DB::beginTransaction();
            try {

                productos::where("id",$request->id_producto)->update(['stock' => $productos->stock-$request->cantidad]);
                $rowData = [
                    'id_producto' => $request->id_producto,
                    'cantidad' => $request->cantidad,
                    "created_at" =>  \Carbon\Carbon::now(), # new \Datetime()
                    "updated_at" => \Carbon\Carbon::now(),  # new \Datetime()
                ];
                DB::table('ventas')->insert($rowData);
                DB::commit();
                return redirect('/')->with('mensaje_correcto', 'La venta se registro exitosamente.');
            } catch (\Exception $e) {
                //dd($e);
                DB::rollback();
                return redirect('/')->with("err","$e");
            }
        
        }else{
            return redirect('/')->with("err","No es posible realizar la venta");
            
        }
        
    }


    public function get()
    {
        //se obtiene toda la lista de las ventas
    
        $data=ventas::join("productos","productos.id","ventas.id_producto")->get(["productos.nombre_producto","ventas.cantidad","ventas.created_at"]);

        //se retorna como datatable
        return DataTables()->of($data)->addColumn('fecha_format', function ($data)  {
            return \Carbon\Carbon::parse($data->created_at)->format('d/m/Y H:i:s');
        })->toJson();
    }
}
