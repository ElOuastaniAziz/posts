<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class RegisterControlador extends Controller
{
    public function __construct(){
        $this->middleware(['guest']);
    }


   public function index(){
     return view('auth.register');
   }

   public function store(Request $request){
      // dd($request->email); //es lo mismo  $request->get('email');
       //Validación de datos
       //Almacenamiento de datos
       //Hacer el login
       //Redireccionamiento
       //validate es un método de la clase Controller
        //si la validación no es correcta, try un objeto de error
       $this->validate($request,[
           'nombre'=>'required|max:255',
           'username'=>'required|max:255',
           'email'=>'required|email|max:255',
           'password'=>'required|confirmed' //busca en el formulario si algun campo contiene _confirmation
       ]);


        //Almacenamiento
       User::create([
           'name'=>$request->nombre,
           'username'=>$request->username,
           'email'=>$request->email,
           'password'=>Hash::make($request->password),//usamos hash
            //para no guardar en plano

       ]);

       //Login
        auth()->attempt($request->only('email','password'));
       //redireccionamiento
       return redirect()->route('dashboard');
   }
}
