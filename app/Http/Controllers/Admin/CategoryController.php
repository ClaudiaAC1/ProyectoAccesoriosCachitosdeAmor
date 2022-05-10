<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
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
                'nombre' => 'required'
            ],
            [
                'nombre.required' => 'Se requiere de un nombre de la categoria'
            ]
        );

        if ($validator->fails()) {
            return back()->withErrors($validator)
                ->with('message', 'Se ha producido un error!')
                ->with('typealert', 'danger')->withInput();
        }

        $category = new Category();
        $category->nombre = $request->input('nombre');
        $category->slug = Str::slug($request->input('nombre'));

        if ($category->save()) {
            return redirect()->route('admin.categories.index')
                ->with('message', '¡¡Se ha guardado exitosamente la categoria!!')
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
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //se hace el guardado en la bd 
        $validator = Validator::make(
            $request->all(),
            [
                'nombre' => 'required'
            ],
            [
                'nombre.required' => 'Se requiere de un nombre de la categoria'
            ]
        );

        if ($validator->fails()) {
            return back()->withErrors($validator)
                ->with('message', 'Se ha producido un error!')
                ->with('typealert', 'danger')->withInput();
        }

        $category->nombre = $request->input('nombre');
        $category->slug = Str::slug($request->input('nombre'));

        if ($category->save()) {
            return redirect()->route('admin.categories.index')
                ->with('message', '¡¡Se ha actualizado exitosamente la categoria!!')
                ->with('typealert', 'success');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.categories.index')
        ->with('message', '¡¡Se ha eliminado exitosamente la categoria!!')
        ->with('typealert', 'success');
    }
}
