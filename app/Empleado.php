<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Empleado extends Model
{

    protected $table = 'empleado';
    public $timestamps = false;

    protected $fillable = [
        'login',
        'clave'
    ];

    public function facturas() {
        return $this->hasMany('App\Factura');
    }
    
    public function comandas() {
        return $this->hasMany('App\Comanda');
    }
}