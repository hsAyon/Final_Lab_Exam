<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\loginReq;
use App\login;

class LoginController extends Controller
{
    function index(Request $request){
        if($request->session()->get('usertype') == "employer"){
            return redirect('/home');
        }
        else if($request->session()->get('usertype') == "admin"){
            return redirect('/admin');
        }
        
        return view('login.index');
    }
    function verify(LoginReq $request){

        $data = login::where('username', $request->username)
                    ->where('password', $request->password)
                    ->get();

        if (count($data) > 0) {
            $request->session()->put('username', $request->username);
            if($data[0]->usertype == "employer"){
                $request->session()->put('usertype', "employer");
                return redirect('/home');
            }
            else if($data[0]->usertype == "admin"){
                $request->session()->put('usertype', "admin");
                return redirect('/admin');
            }
        } else {
            return view('login.index')->withErrors(['token' => 'Invalid Credentials!']);
        }
    }
}
