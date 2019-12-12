<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Factura;

class FacturaController extends Controller
{    
    // metodo get
    public function index()
    {
        return response()->json(Factura::all(),200);
    }
   /* public function create()
    {
        return response()->json(['mensaje' => 'create'], 200);
    }*/
    public function store(Request $request)
    {
        try{
        $factura = Factura::create($request->all());
        $idFactura = $factura->id;
        } catch(\Exception $e){
            $idFactura = 0;
        }
        return response()->json($idFactura, 200);
    }
    public function show($id)
    {
        $factura = Factura::find($id);
        return response()->json($factura, 200);
    }
   /* public function edit($id)
    {
        return response()->json(['mensaje' => 'edit'], 200);
    }*/
    public function update(Request $request, $id)
    {
        $factura = Factura::find($id);
        $array = ['error' => 'data not deleted'];
        $status = 400;
        
        if($factura != null){
            try{
                $result = $factura->update($request->all());
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
        $result = Factura::destroy($id);
        if($result){
            return response()->json([], 204);
        }
        return response()->json(['error' => 'data not deleted'], 400);
    }
    
    public function facturaMesa($id)
    {
        $factura = Factura::where('mesa', $id)->first();
            return response()->json($factura->id, 200);
        
    }


}