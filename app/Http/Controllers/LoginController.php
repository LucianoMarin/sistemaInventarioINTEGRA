<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Loginrequest;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    public function show()
    {

        if (Auth::check()) {
            return redirect('/principal');
        }
        return view('auth.login');
    }

    public function login(Loginrequest $request)
    {
        try {
            $credentials = $request->getCredentials();
            if (!Auth::validate($credentials)) {
                return redirect()->to('/login')->withErrors('Credenciales ingresadas no validas');
            }
            $user = Auth::getProvider()->retrieveByCredentials($credentials);
            Auth::login($user);
            return $this->authenticated($request, $user);
        } catch (\Illuminate\Database\QueryException $ex) {
            return redirect()->to('/login')->withErrors('Error: Problemas de conexion BD');

        }
    }


    public function authenticated(Request $request, $user)
    {
        return redirect('/principal');

    }

}