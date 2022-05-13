<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

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
                'nombre' => 'required', 
                'telefono' => 'required',               
                'email' => 'required',
                'rol' => 'required',
                'password' => 'required',
                'pass2' => 'required|same:password' 
            ],
            [
                'nombre.required' => 'Se requiere de un nombre para el usuario',
                'telefono.required' => 'Se requiere de un numero de telefono para el usuario',                
                'email.required' => 'Se requiere de un correo electronico para el usuario',                
                'rol.required' => 'Se requiere de un rol electronico para el usuario',
                'password.required' => 'Se requiere contraseña para el usuario',
                'pass2.required' => 'Se requiere confirmar contraseña',
                'pass2.same' => 'No coindicen las contraseñas'
            ]
        );

        if ($validator->fails()) {
            return back()->withErrors($validator)
                ->with('message', 'Se ha producido un error!')
                ->with('typealert', 'danger')->withInput();
        }

        $user = new User();
        $user->nombre = $request->input('nombre');
        $user->slug= Str::slug($request->input('nombre'));
        $user->email = $request->input('email');
        $user->rol = $request->input('rol');
        $user->telefono = $request->input('telefono');
        $user->password =  Hash::make($request->input('password'));
        

        if ($user->save()) {
            return redirect()->route('admin.users.index')
                ->with('message', '¡¡Se ha guardado exitosamente el usuario!!')
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
