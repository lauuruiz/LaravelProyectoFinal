<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    protected $table = 'factura';
    public $timestamps = false;
    
    protected $fillable = [
        'mesa', 
        'horainicio',
        'idempleadoinicio',
        'horacierre',
        'idempleadocierre',
        'total'
    ];

    public function idempleadoinicio() {
        return $this->belongsTo('App\Empleado', 'idempleadoinicio');
    }
    
    public function idempleadocierre() {
        return $this->belongsTo('App\Empleado', 'idempleadocierre');
    }
    
    public function comandas() {
        return $this->hasMany('App\Comanda');
    }
    
}