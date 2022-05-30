<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class welcome extends Controller
{
    public function getCatalog(){
        return view('catalog-products');
    }
}
