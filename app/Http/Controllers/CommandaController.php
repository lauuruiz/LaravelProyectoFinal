<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Comanda;
use Illuminate\Support\Facades\DB;

class CommandaController extends Controller
{
    // metodo get
    public function index()
    {
        return response()->json(Comanda::all(),200);
    }
   /* public function create()
    {
        return response()->json(['mensaje' => 'create'], 200);
    }*/
    public function store(Request $request)
    {
        try{
        $comanda = Comanda::create($request->all());
        } catch(\Exception $e){
            return response()->json(false, 400);
        }
        return response()->json(true, 201);
    }
    public function show($id)
    {
        $comanda = Comanda::find($id);
        return response()->json(['data' => $comanda], 200);
    }
   /* public function edit($id)
    {
        return response()->json(['mensaje' => 'edit'], 200);
    }*/
    public function update(Request $request, $id)
    {
        $comanda = Comanda::find($id);
        $array = ['error' => 'data not deleted'];
        $status = 400;
        
        if($comanda != null){
            try{
                $result = $comanda->update($request->all());
                $array = $result;
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
        
        $result = Comanda::destroy($id);
        if($result){
            return response()->json($id, 200);
        }
        return response()->json(['error' => 'data not deleted'], 400);
    }

    public function destroy2($idfactura,$idproducto)
    {

    $result = DB::delete('delete from comanda where idfactura = :idfactura AND idproducto = :idproducto', ['idproducto' => $idproducto, 'idfactura' => $idfactura]);
        return response()->json($result, 200);
    }

    public function factura($id)
    {
        //Eloquent
        $comandas = Comanda::where('idfactura', $id)->get();                                                                                                                                                  
        return response()->json($comandas, 200);
        
    }
}
