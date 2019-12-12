<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categoria';
    public $timestamps = false;
    
    protected $fillable = [
        'nombre'
    ];

    public function categorias() {
        return $this->hasMany('App\Producto');
    }
}