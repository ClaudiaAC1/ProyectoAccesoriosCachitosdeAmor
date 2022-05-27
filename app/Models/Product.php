<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = "products";

    protected $guarded = [];

    //protected $hidden = ['created_at', 'updated_at'];
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function category()
    {
        // belongsTo = relacion de 1-1 o 1-n
        //parametro = nos dice con que modelo esta la relacion
        return $this->belongsTo(Category::class);
    }
    public function sales()
    {
        return $this->BelongsToMany('App\models\Sale');
    }
}
