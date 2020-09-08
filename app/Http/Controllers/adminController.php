<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests\registerReq;
use App\Http\Requests\editReq;
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
    //edit
    function editemp($id, Request $req){
        
        $data = DB::table('employers')
                ->join('logins', 'employers.uid', '=', 'logins.id')
                ->select('employers.*', 'logins.username')
                ->where('logins.usertype','employer')
                ->where('employers.uid', $id)
                ->get();

        return view('admin.editemp')->with('data', $data[0]);
    }

    function editconf($id, editReq $request){

        $tlogin = login::where('id', $id)->first();
        $tlogin->username = $request->username;
        $tlogin->save();

        $temployer = employer::where('uid', $id)->first();
        $temployer->name = $request->name;
        $temployer->company = $request->company;
        $temployer->contact = $request->contact;
        $temployer->save();

        return redirect('/admin/viewemp');
    }

    //delete
    function delemp($id, Request $request){
        
        if($request->session()->has('username')){
            if($request->session()->get('usertype') == "admin"){
                $tlogin = login::find($id);
                $temployer = employer::where('uid', $id)->first();

                $tlogin->delete();
                $temployer->delete();

                return redirect('/admin/viewemp');
            }
        } else {
            return response('Not Admin', 403);
        }
    }

    //search
    function empsearch(Request $request){
        if( $request->has('search') && $request->search != ''){
            $data = DB::table('employers')
                ->join('logins', 'employers.uid', '=', 'logins.id')
                ->select('employers.*', 'logins.username')
                ->where('logins.usertype','employer')
                ->where('employers.name', 'LIKE', "%{$request->search}%")
                ->get();
        } else {
            $data = DB::table('employers')
                ->join('logins', 'employers.uid', '=', 'logins.id')
                ->select('employers.*', 'logins.username')
                ->where('logins.usertype','employer')
                ->get();
        }

        return view('admin.viewemp')->with('data', $data);
    }
}
