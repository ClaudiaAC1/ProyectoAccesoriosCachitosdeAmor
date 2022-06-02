<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class welcome extends Controller
{
    public function getCatalog(){
        $categories = Category::all(); 
        return view('catalog-products', compact('categories'));
    }
}
