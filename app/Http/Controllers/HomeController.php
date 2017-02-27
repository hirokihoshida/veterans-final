<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use DB;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function show() {
//        $users = DB::select("select * from client");
//     	foreach ($users as $client) {
//            print_r($client);
//            echo("\n\n");
//        }

    	return view('home');
    }

    public function login() {
        return view('login');
    }

    public function authenticate(Request $request) {
        $username = $request->input('username');
        $password = $request->input('password');

        if (Auth::attempt(['username' => $username, 'password' => $password])) {
            echo("success");
            return redirect()->intended('home');
        } else {
            return redirect()->intended('login');
        }
    }
}
