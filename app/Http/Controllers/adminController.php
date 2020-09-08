<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests\registerReq;
use App\login;
use App\employer;

class adminController extends Controller
{
    //root
    function index(){
        return view('admin.index');
    }

    //addemp
    function addemp(){
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

    //viewemp
    function viewemp(){
        
        $data = DB::table('employers')
                ->join('logins', 'employers.uid', '=', 'logins.id')
                ->select('employers.*', 'logins.username')
                ->where('logins.usertype','employer')
                ->get();

        return view('admin.viewemp')->with('data', $data);
    }
}
