<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; //import Models
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    function login(Request $req){
        // return $req->input();
        // now check the user is present or not In database
        $user= User::where(['email'=>$req->email])->first();
        if (!$user || !Hash::check($req->password,$user->password)){
            return redirect('/');
        }
        else{
            // set Session
            $req->session()->put('user',$user);
            return redirect('CompanyResources');
        }

    }
}