<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request){

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect('admin');
        }else{
            return back()->with('error','wrong credentails details');
        }
    }
    public function logout(Request $request){
        Auth::logout();
        return Redirect('/');
    }
}
