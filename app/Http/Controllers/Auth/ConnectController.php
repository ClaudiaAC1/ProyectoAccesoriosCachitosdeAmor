<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ConnectController extends Controller
{
    /* 
     * Constructor que ejecuta el middleware 
     * Ayuda a que una vez logueado ya no puedas ingresar al login o registro
     * Solo nos da acceso a poder cerrar la sesion( Logout ).
    */
    public function __construct()
    {
        $this->middleware('guest')->except(['getLogout']);
    }

    //
    public function getLogin()
    {
        return view('Auth.login');
    }

    /* 
     * Metodo nos permitira generar el inicio de sesion de nuestros usuarios
    */
    public function authenticate(Request $request)
    {

        // $user = new User();
        // $user->nombre = 'Katia';
        // $user->email = 'kati@gmail.com';
        // $user->telefono = '0000000000';
        // $user->password = Hash::make('5678');
        // $user->rol = 'Administrador';
        // $user->slug = 'katia';
        // $user->save();

        // return $user;


        //Validamos si el usuario ingreso loss datos correctos
        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')], true)) {
            return redirect()->route('admin.products.index');
        }
        return redirect()->route('auth.login');
    }

    public function getLogout()
    {
        Auth::logout();
        return redirect('/');
    }
}
