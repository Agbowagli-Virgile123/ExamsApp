<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
   
    public function index(){


        Session::put("nextq", '1');
        Session::put("wrongans", '0');
        Session::put("correctans", '0');

        $user = Auth::user();

        if($user && $user->usertype == "user"){

            return view("dashboard");

        }else if($user && $user->usertype == "admin"){

            return view("admin.adminDashboard");

        }else {
            abort(404);
        }
    }

    public function admin(){
        return view("admin.OnlyAdmin");
    }
}
