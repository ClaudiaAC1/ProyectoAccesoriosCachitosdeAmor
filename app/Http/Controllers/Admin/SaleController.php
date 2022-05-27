<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Sale;
use Carbon\Carbon;


class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::orderBy('id', 'Desc')->get();
        return view('admin.sales.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $id_user = auth()->user()->id;
        $fecha = Carbon::now()->toDateString();

        $sale = new Sale(
            [
                'usuario' => $id_user,
                'fecha' => $fecha,
                'total' => $request->get("total"),
            ]
        );
        $sale->saveOrFail();


        $ids = $request->get("productos");
        $cantidades = $request->get("cantidades");

        $length = count($ids);
        for ($i = 0; $i < $length; ++$i) {

            for ($j = 0; $j < (int)$cantidades[$i]; ++$j) {
                $sale->products()->attach($ids[$i]);
            }
        }

        return redirect()->route('admin.sales.create')->with('message', '¡¡Venta exitosa!!');
    }

    public function agregarProductos()
    {
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
