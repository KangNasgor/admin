<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;

class RegisterController extends Controller
{
    public function register(){
        return view('register/register');
    }
    public function registerSubmit(Request $request){
        Users::create([
            'name' => $request->input('name'),
            'password' => $request->input('password'),
            'role' => $request->input('role'),
        ]);
        return redirect()->route('login');
    }
}
