<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('id', 'Desc')->paginate(5);
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //se hace el guardado en la bd 
        $validator = Validator::make(
            $request->all(),
            [
                'nombre' => 'required',
                'url_img' => 'required|image',
                'precio' => 'required',
                'categoria' => 'required',
                'cantidad' => 'required',
                'descripcion' => 'required',
            ],
            [
                'nombre.required' => 'Se requiere de un nombre para el producto',
                'url_img.required' => 'Se requiere de una imagen para el producto',
                'url_img.image' => 'El archivo no es una imagen',
                'categoria.required' => 'Se requiere seleccion de una categoria',
                'precio.required' => 'Se requiere precio del producto',
                'descripcion.required' => 'Se requiere una descripcion del producto',
                'cantidad.required' => 'Se requiere la cantidad existente del producto'
            ]
        );

        if ($validator->fails()) {
            return back()->withErrors($validator)
                ->with('message', 'Se ha producido un error!')
                ->with('typealert', 'danger')->withInput();
        }

        $url = Storage::put('products', $request->file('url_img'));

        $product = new Product();
        $product->nombre = $request->input('nombre');
        $product->cantidad = $request->input('cantidad');
        $product->category_id = $request->input('categoria');
        $product->precio = $request->input('precio');
        $product->descripcion = $request->input('descripcion');
        $product->url_img = $url;
        $product->slug = Str::slug($request->input('nombre'));

        if ($product->save()) {
            return redirect()->route('admin.products.index')
                ->with('message', '¡¡Se ha guardado exitosamente el producto!!')
                ->with('typealert', 'success');
        }
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
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //se hace el guardado en la bd 
        $validator = Validator::make(
            $request->all(),
            [
                'nombre' => 'required',
                'url_img' => 'required|image',
                'precio' => 'required',
                'categoria' => 'required',
                'cantidad' => 'required',
                'descripcion' => 'required',
            ],
            [   
                'nombre.required' => 'Se requiere de un nombre para el producto',
                'url_img.required' => 'Se requiere de una imagen para el producto',
                'url_img.image' => 'El archivo no es una imagen',
                'categoria.required' => 'Se requiere seleccion de una categoria',
                'precio.required' => 'Se requiere precio del producto',
                'descripcion.required' => 'Se requiere una descripcion del producto',
                'cantidad.required' => 'Se requiere la cantidad existente del producto'
            ]
        );

        if ($validator->fails()) {
            return back()->withErrors($validator)
                ->with('message', 'Se ha producido un error!')
                ->with('typealert', 'danger')->withInput();
        }

        $url = Storage::put('products', $request->file('url_img'));

       
        $product->nombre = $request->input('nombre');
        $product->cantidad = $request->input('cantidad');
        $product->category_id = $request->input('categoria');
        $product->precio = $request->input('precio');
        $product->descripcion = $request->input('descripcion');
        $product->url_img = $url;
        $product->slug = Str::slug($request->input('nombre'));

        if ($product->save()) {
            return redirect()->route('admin.products.index')
                ->with('message', '¡¡Se ha actualizado exitosamente el producto!!')
                ->with('typealert', 'success');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.products.index')
                ->with('message', '¡¡Se ha eliminado exitosamente el producto!!')
                ->with('typealert', 'success');
    }
}
