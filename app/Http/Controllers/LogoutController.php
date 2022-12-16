<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Session\Session;

class LogoutController extends Controller
{
   
public function logout(){

    Auth::logout();        
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/');
    
}

}
