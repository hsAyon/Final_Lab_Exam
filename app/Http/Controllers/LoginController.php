<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\loginReq;
use App\login;

class LoginController extends Controller
{
    function index(){
        return view('login.index');
    }
    function verify(LoginReq $request){

        $data = login::where('username', $request->username)
                    ->where('password', $request->password)
                    ->get();

        if (count($data) > 0) {
            $request->session()->put('username', $request->username);
            if($data[0]->type == "member"){
                $request->session()->put('type', "employer");
                return redirect('/home');
            }
            else if($data[0]->type == "admin"){
                $request->session()->put('type', "admin");
                return redirect('/admin');
            }
        } else {
            return view('login.index')->withErrors(['token' => 'Invalid Credentials!']);
        }
    }
}
