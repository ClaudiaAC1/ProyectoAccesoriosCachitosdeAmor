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
                'nombre' => 'required|regex:/^[A-Z][a-zÀ-ÿ\s]/',
                'telefono' => 'required|regex:/^[0-9]{10}$/',
                'email' => 'required|regex:/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/', 
                'rol' => 'required',
                'password' => 'required|regex: /^[A-Za-z0-9\_]{8,15}$/',
                'pass2' => 'required|same:password'
            ],
            [
                'nombre.required' => 'Se requiere de un nombre para el usuario',
                'telefono.required' => 'Se requiere de un número de télefono para el usuario',
                'telefono.regex' => 'El número de télefono es inválido.',
                'email.required' => 'Se requiere de un correo electronico para el usuario',
                'email.regex' => 'El formato del Correo Electronico es incorrecto',
                'rol.required' => 'Se requiere de un rol para el usuario',
                'password.required' => 'Se requiere contraseña para el usuario',
                'password.regex' => 'La contraseña debe contener al menos 8 carácteres',
                'pass2.required' => 'Se requiere confirmar contraseña',
                'pass2.same' => 'No coindicen las contraseñas'
            ]
        );

        if ($validator->fails()) {
            return back()->withErrors($validator)
                ->with('message', '¡Se ha producido un error!')
                ->with('typealert', 'danger')->withInput();
        }

        $user = new User();
        $user->nombre = $request->input('nombre');
        $user->slug = Str::slug($request->input('nombre'));
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
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //se hace el guardado en la bd 
        $validator = Validator::make(
            $request->all(),
            [
                'nombre' => 'required|regex:/^[A-Z][a-zÀ-ÿ\s]/',
                'telefono' => 'required|regex:/^[0-9]{10}$/',
                'email' => 'required|regex:/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/', 
                'rol' => 'required',
                'password' => 'required|regex: /^[A-Za-z0-9\_]{8,15}$/',
                'pass2' => 'required|same:password'
            ],
            [
                'nombre.required' => 'Se requiere de un nombre para el usuario',
                'telefono.required' => 'Se requiere de un número de télefono para el usuario',
                'telefono.regex' => 'El número de télefono es inválido.',
                'email.required' => 'Se requiere de un correo electronico para el usuario',
                'email.regex' => 'El formato del Correo Electronico es incorrecto',
                'rol.required' => 'Se requiere de un rol para el usuario',
                'password.required' => 'Se requiere contraseña para el usuario',
                'password.regex' => 'La contraseña debe contener al menos 8 carácteres',
                'pass2.required' => 'Se requiere confirmar contraseña',
                'pass2.same' => 'No coindicen las contraseñas'
            ]
        );

        if ($validator->fails()) {
            return back()->withErrors($validator)
                ->with('message', 'Se ha producido un error!')
                ->with('typealert', 'danger')->withInput();
        }

        $user->nombre = $request->input('nombre');
        $user->slug = Str::slug($request->input('nombre'));
        $user->email = $request->input('email');
        $user->rol = $request->input('rol');
        $user->telefono = $request->input('telefono');
        $user->password =  Hash::make($request->input('password'));


        if ($user->save()) {
            return redirect()->route('admin.users.index')
                ->with('message', '¡¡Se ha actualizado exitosamente el usuario!!')
                ->with('typealert', 'success');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
         $user->delete();
        return redirect()->route('admin.users.index')
                ->with('message', '¡¡Se ha eliminado exitosamente el usuario!!')
                ->with('typealert', 'success');
    }
}
