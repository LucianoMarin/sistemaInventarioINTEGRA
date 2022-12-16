<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;


class RegisterController extends Controller
{
public function show(){
    if(!Auth::check()){
        return redirect('/login');
            }
return redirect()->route('register')->with('success','La cuenta se creo exitosamente!');


}

public function register(RegisterRequest $request){
$user=User::create($request->validated());
return redirect()->route('register')->with('success','La cuenta se creo exitosamente!');


}



}
