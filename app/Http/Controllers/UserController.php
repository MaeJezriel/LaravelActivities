<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;

class UserController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');


        
    }



    public function index() {
        //$users = DB::table('users')->get();
        $users = User::get();


        return view('users.index', compact('users')); 
       //return $users;
    }

    public function show($id){
        $user = User::where('id',$id)->first();
         
        return view('users.show', compact('user'));
    }

}
