<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CambiarClaveController extends Controller
{


    public function update(Request $request)
    {
        $this->validate($request, [
            'password' => 'required|confirmed|min:8|max:32',
        ]);

        $user = Auth::user(); 

        $npassword = $request->password; 


        $user->password = $npassword; 
        $user->save();

       return redirect()->route('salir')->with('success','Se cambio exitosamente su clave');

    }

}
