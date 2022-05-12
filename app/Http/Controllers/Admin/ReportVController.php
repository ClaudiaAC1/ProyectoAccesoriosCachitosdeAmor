<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReportVController extends Controller
{

    public function __construct()
    {
        $this->camposTabla = ["#", "Fecha/Hora", "ID Direccion", "Monto", "Descripcion", "ID Cliente", "Ver"];
    }


    public function index()
    {
     return view("admin.reporteVentas.index")
     ->with('camposTabla', $this->camposTabla);   
    }
}
