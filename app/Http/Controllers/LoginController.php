<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class LoginController extends Controller
{
    public function loginForm(){

        return view('auth.login');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('pistas.index');
    }

    public function newsignup(Request $request){
        $user = User::create([
            'usuario' => $request->usuario,
            'password' => bcrypt($request->password)
        ]);

        Auth::login($user);

        return redirect()->route('pistas.index');
    }

    public function signup(){
        return view('auth.signup');
    }
    public function login(Request $request){
        $credenciales = $request->only('usuario', 'password');
        if (Auth::attempt($credenciales)){
            return redirect()->intended(route('pistas.index'));
        }else{
            $error = 'Usuario incorrecto';
            return view('auth.login', compact('error'));
        }
    }
}
