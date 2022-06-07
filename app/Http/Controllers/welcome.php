<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class welcome extends Controller
{
    public function getCatalog(){
        $productos = Product::orderBy('id', 'Desc') -> get();
        $categories = Category::orderBy('id', 'Asc') -> get(); 
        return view('catalog-products', compact('categories', 'productos'));
    }
}
