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
        ]);
        return redirect()->route('login');
    }
}
