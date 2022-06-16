<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Sale;
use Carbon\Carbon;
use Mockery\Undefined;

class SaleController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        $name_user = auth()->user()->name;
        $fecha = Carbon::now()->toDateString();

        $products = Product::orderBy('id', 'Desc')->get();
        return view('admin.sales.create', compact('products', 'name_user', 'fecha'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // if ($request->get('bandera') != 'enviado') {

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
                Product::find($ids[$i])->decrement('cantidad');
            }
        }
        // }

    }

    public function agregarProductos()
    {
        redirect()->route('admin.sales.create')->with('message', '¡Se ha  registrado la venta con exito!')
            ->with('typealert', 'success');
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
