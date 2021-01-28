<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginControlador extends Controller
{
    public function __construct(){
        $this->middleware(['guest']);
    }

    public function index(){
        return view('auth.login');
    }

    public function store(Request $request){
         //Validación
         $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required'
        ]);

        //Comproba si el usuario existe
        if(!auth()->attempt($request->only('email','password'),$request->remember)){
            return back()->with('status','Datos invalidos');
        }

        return redirect()->route('dashboard');
    }
}
