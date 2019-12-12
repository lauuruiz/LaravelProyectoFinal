<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'producto';
    public $timestamps = false;
    
    protected $fillable = [
        'nombre', 
        'precio', 
        'destino', 
        'idcategoria'
    ];

    public function categoria() {
        return $this->belongsTo('App\Categoria', 'idcategoria');
    }

}