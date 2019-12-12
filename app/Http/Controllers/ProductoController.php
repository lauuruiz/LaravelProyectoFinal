<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Producto;

class ProductoController extends Controller
{
       // metodo get
    public function index()
    {
        return response()->json(Producto::all(),200);
    }
   /* public function create()
    {
        return response()->json(['mensaje' => 'create'], 200);
    }*/
    public function store(Request $request)
    {
        try{
        $producto = Producto::create($request->all());
        } catch(\Exception $e){
            return response()->json(['error' => $e->getMessage()], 400);
        }
        return response()->json(true, 201);
    }
    public function show($id)
    {
        $producto = Producto::find($id);
        return response()->json(['data' => $producto], 200);
    }
   /* public function edit($id)
    {
        return response()->json(['mensaje' => 'edit'], 200);
    }*/
    public function update(Request $request, $id)
    {
        $producto = Producto::find($id);
        $array = ['error' => 'data not deleted'];
        $status = 400;
        
        if($producto != null){
            try{
                $result = $producto->update($request->all());
                $array = ['data' => $result];
                $status = 200;
            }catch(\Exception $e){
                
            }
            return response()->json($array, $status);
        }    
        
        /*
           // return response()->json(['data' => $result], 400);
        }
        try{
            $result = $empleado->update($request->all());
        }catch(\Exception $e){
            error
        }
        return response()->json(['data' => $result], 200);*/
    }
    public function destroy($id)
    {
        $result = Producto::destroy($id);
        if($result){
            return response()->json([], 204);
        }
        return response()->json(['error' => 'data not deleted'], 400);
    }

    public function categoria($id)
    {
        //Eloquent
        $productos = Producto::where('idcategoria', $id)->get();                                                                                                                                                  
        return response()->json($productos, 200);
        
    }

}
