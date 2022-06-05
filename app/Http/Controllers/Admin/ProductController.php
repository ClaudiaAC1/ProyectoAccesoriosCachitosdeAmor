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
                'nombre' => 'required|regex:/^[A-Z][a-zÀ-ÿ\s]/',
                'cantidad' => 'required|regex:/^\d+$/',
                'precio' => 'required|regex:/^[0-9]{2}+\.[0-9]{2}+$/',
                'categoria' => 'required',
                'descripcion' => 'required|regex:/^[A-Z][a-zÀ-ÿ\s]/',
                'url_img' => 'required|image',
            ],
            [
                'nombre.required' => 'Se requiere de un nombre para el producto',
                'nombre.regex' => 'El formato del nombre para el producto no es el correcto, debe empezar por mayúscula.',
                'url_img.required' => 'Se requiere de una imagen para el producto',
                'url_img.image' => 'El archivo no es una imagen',
                'categoria.required' => 'Se requiere la seleccion de una categoria',
                'categoria.regex' => 'El formato del nombre para la categoría no es el correcto.',
                'cantidad.regex' => 'Solo cantidades permitida de 0 a 9999.',
                'precio.required' => 'Se requiere precio del producto.',
                'precio.regex' => 'El precio debe tener dos decimales y ser positivo.',
                'descripcion.required' => 'Se requiere una descripción del producto.',
                'descripcion.regex' => 'Sólo se aceptan caracteres del alfabeto.',
                'cantidad.required' => 'Se requiere una cantidad existente del producto'
            ]
        );

        if ($validator->fails()) {
            return back()->withErrors($validator)
                ->with('message', '¡Se ha producido un error!')
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
                'nombre' => 'required|regex:/^[A-Z][a-zÀ-ÿ\s]/',
                'cantidad' => 'required|regex:/^\d+$/',
                'precio' => 'required|regex:/^[0-9]+\.[0-9]{2}+$/',
                'categoria' => 'required',
                'descripcion' => 'required|regex:/^[A-Z][a-zÀ-ÿ\s]/',
                'url_img' => 'required|image',
            ],
            [
                'nombre.required' => 'Se requiere de un nombre para el producto',
                'nombre.regex' => 'El formato del nombre para el producto no es el correcto, debe empezar por mayúscula.',
                'url_img.required' => 'Se requiere de una imagen para el producto',
                'url_img.image' => 'El archivo no es una imagen',
                'categoria.required' => 'Se requiere la seleccion de una categoria',
                'categoria.regex' => 'El formato del nombre para la categoría no es el correcto.',
                'precio.required' => 'Se requiere precio del producto.',
                'precio.regex' => 'El precio debe tener dos decimales y ser positivo.',
                'descripcion.required' => 'Se requiere una descripción del producto.',
                'descripcion.regex' => 'Sólo se aceptan caracteres del alfabeto.',
                'cantidad.required' => 'Se requiere una cantidad existente del producto',
                'cantidad.regex' => 'Solo cantidades permitida de 0 a 9999.',
            ]
        );

        if ($validator->fails()) {
            return back()->withErrors($validator)
                ->with('message', '¡Se ha producido un error!')
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
