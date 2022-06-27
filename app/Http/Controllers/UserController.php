<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Ciudad;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function list(){
        return view('usuarios.main');
    }

    public function showRegistrationForm(){
        $ciudades = Ciudad::all();
        return view('auth.register', ['ciudades' => $ciudades]);
    }

    public function logout(Request $request)
    {
        Auth::logout(); 

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}

?>