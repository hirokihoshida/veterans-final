<?php

namespace App\Http\Controllers;

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


}
