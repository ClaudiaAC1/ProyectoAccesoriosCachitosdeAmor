<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id', 'Desc')->get();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
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
                'name' => 'required', 
                'telefono' => 'required',               
                'email' => 'required',
                'rol' => 'required',
                'password' => 'required'
            ],
            [
                'name.required' => 'Se requiere de un nombre para el usuario',
                'telefono.required' => 'Se requiere de un numero de telefono para el usuario',                
                'email.required' => 'Se requiere de un correo electronico para el usuario',                
                'rol.required' => 'Se requiere de un rol electronico para el usuario',
                'password.required' => 'Se requiere contraseña para el usuario'
            ]
        );

        if ($validator->fails()) {
            return back()->withErrors($validator)
                ->with('message', 'Se ha producido un error!')
                ->with('typealert', 'danger')->withInput();
        }

       return $request;

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->rol = $request->input('rol');
        $user->tel = $request->input('telefono');
        $user->rolpassword = $request->input('password');
        

        if ($user->save()) {
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
    public function edit($id)
    {
        //
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
