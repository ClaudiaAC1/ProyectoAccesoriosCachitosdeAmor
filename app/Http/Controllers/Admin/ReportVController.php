<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Sale;

class ReportVController extends Controller
{

    public function __construct()
    {
        $this->camposTabla = ["ID Usuario", "Fecha/Hora", "Monto"];
    }


    public function index(Request $request)
    {

        $listaventas = null;
        if (count($request->all()) >= 0) {
            $listaventas = $this->getVentasPorConsulta($request);
        } else {
            //se rellena con todos los registros
            $listaventas = Sale::paginate(5);
        }

        $aniodisponible = Sale::selectRaw('year(fecha) as anio')
        ->groupBy('anio')
        ->orderBy('anio')
        ->get();

        //$listaventas = Sale::paginate(5);
     return view("admin.reporteVentas.index")
     ->with('camposTabla', $this->camposTabla)
     ->with('listaventas', $listaventas)
     ->with('aniodisponible',$aniodisponible);
     
    }
    private function getVentasPorConsulta(Request $request)
    {
        $rows = null;
        if ($request->has('inputBusqueda') && $request->inputBusqueda != null) {
            $rows = Sale::where('usuario', 'like', $request->inputBusqueda . '%');
        }
        //if ($request->has('inputBusqueda') && $request->inputBusqueda != null) {
            //$rows = Sale::where('total', 'like', $request->inputBusqueda . '%');
        //}
        if ($request->has('inputSelectorMes') && $request->inputSelectorMes != null && $request->inputSelectorMes != "0") {
            if ($rows == null) {
                $rows = Sale::where('usuario', 'like', '%');
            }
            $rows = $rows->whereMonth('fecha', '=', $request->inputSelectorMes);
        }
        if ($request->has('inputSelectorAnio') && $request->inputSelectorAnio != null && $request->inputSelectorAnio != "0") {
            if ($rows == null) {
                $rows = Sale::where('usuario', 'like', '%');
            }
            $rows = $rows->whereYear('fecha', '=', $request->inputSelectorAnio);
        }

        if ($rows == null) {
            $rows = Sale::paginate(10);
        } else {
            $rows = $rows->paginate(10);
        }
        return $rows;
    }
}
