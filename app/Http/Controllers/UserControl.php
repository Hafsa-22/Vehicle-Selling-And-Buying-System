<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\Userinfo;
class UserControl extends Controller
{
    //
    function signup(Request $rq)
    {
        $email = $rq->email;
        $count = Userinfo::where('email', $email)->count();
        $mg = "This email is alweady used ";
        session()->put('mg', $mg);
        if ($count > 0) {
            session()->put('mg', $mg);
            return view('signup');
        } else {
            session()->pull('mg');

            $user = new Userinfo;
            $user->name = $rq->name;
            $user->address = $rq->address;
            $user->mobile = $rq->mobile;
            $user->email = $rq->email;
            $user->password = Hash::make($rq->password);
            $user->save();
            return view('login');
        }
    }
    function login(Request $req)
    {
        $data = Userinfo::where(['email' => $req->email])->first();

        if (!$data || !Hash::check($req->password, $data->password)) {
            $mg = "User name or password did't matched , try again";
            session()->put('login_mg', $mg);
            return view("login");
        } else {
            session()->pull('login_mg');
            session()->put('owner', $data);
            //return redirect('home');
            return redirect('carhome');
        }
    }
    
}
