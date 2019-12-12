<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comanda extends Model
{
    protected $table = 'comanda';
    public $timestamps = false;
    
    protected $fillable = [
        'idfactura',
        'idproducto',
        'idempleado',
        'unidades',
        'precio',
        'entregada'
    ];

    public function factura() {
        return $this->belongsTo('App\Factura', 'idfactura');
    }
    public function producto() {
             $this->belongsTo('App\Producto', 'idproducto');
    }
    public function empleado() {
             $this->belongsTo('App\Empleado', 'idempleado');
    }
         
}