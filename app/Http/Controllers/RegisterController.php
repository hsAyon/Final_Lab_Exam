<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\registerReq;
use App\login;
use App\employer;

class RegisterController extends Controller
{
    function index(){
        return view('register.index');
    }
    function register(registerReq $request){

        $tlogin = new login;
        $tlogin->username = $request->username;
        $tlogin->password = $request->password;
        $tlogin->usertype = 'employer';
        $tlogin->save();

        $temployer = new employer;
        $temployer->uid = $tlogin->id;
        $temployer->name = $request->name;
        $temployer->company = $request->company;
        $temployer->contact = $request->contact;
        $temployer->save();

        return redirect('/');
    }
}