<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class LogoutControlador extends Controller
{
    public function store(){
        //logout
        auth()->logout();
        return redirect()->route('home');
    }
}
