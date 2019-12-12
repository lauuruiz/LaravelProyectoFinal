<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::resource('empleado', 'EmpleadoController', ['except'=> ['create', 'edit']]);
Route::resource('categoria', 'CategoriaController', ['except'=> ['create', 'edit']]);
Route::resource('comanda', 'CommandaController', ['except'=> ['create', 'edit']]);
Route::resource('factura', 'FacturaController', ['except'=> ['create', 'edit']]);
Route::resource('producto', 'ProductoController', ['except'=> ['create', 'edit']]);

Route::get('producto/categoria/{id}', 'ProductoController@categoria');
Route::get('comanda/factura/{id}', 'CommandaController@factura');
Route::get('factura/mesa/{id}', 'FacturaController@facturaMesa');

Route::get('comanda/{idfactura}/{idproducto}', 'CommandaController@destroy2');