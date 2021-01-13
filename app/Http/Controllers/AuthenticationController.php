<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Auth;

class AuthenticationController extends BaseController
{
    function login(){
    	return view('authentication.login');
    }

    function register(){
    	return view('authentication.register');
    }

    function lockscreen(){
        return view('authentication.lockscreen');
    }

    function forgot(){
    	return view('authentication.forgot');
    }
    
    function page404(){
    	return view('authentication.page404');
    }

    function page500(){
        return view('authentication.page500');
    }

    function offline(){
    	return view('authentication.offline');
    }

    public function update(Request $request){
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255','unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:3'],
        ]);
        $request['password']= Hash::make($request->password);
        User::create($request->all());
        return redirect('dashboard/index')->with('Status','Your account has been registered. Please Log In');
    }

    public function signin(Request $request){
        if (Auth::attempt(['name'=>$request->name,'password'=>$request->password])){
            return redirect('dashboard/index');
        }
        return redirect('authentication/login')->with('Status','Username/Password are incorrect');
    }
}
