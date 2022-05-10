<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $hidden = ['created_at', 'updated_at'];
    public function getRouteKeyName()
    {
        return 'slug';
    }

    //busqueda por categoria
    public function products(){
        //retornar todos los productos que la categoria seleccionada en un vista (categoria= "anillos", se hace la busqueda por "anillos")
        return $this->hasMany(Product::class);
    }
}
