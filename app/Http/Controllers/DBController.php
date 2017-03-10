<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Client;

class DBController extends Controller
{
    public function getClientList() {
        $clientlist = DB::select('select * from client');
        $columnNames = DB::select("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'client';");
        unset($columnNames[0]);
        unset($columnNames[1]);
        unset($columnNames[2]);

        return view('clientlist', ['clientlist' => $clientlist, 'columns' => $columnNames]);
    }

    public function getClientNotifications() {
        // take most recent visit from each client
        $clientlist = DB::select("select * from visit v left join client c on v.client_id = c.id group by c.id");
        return view('notifications', ['clientlist' => $clientlist]);
    }

    public function addNewClient(Request $request) {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'age' => 'integer'
        ]);

        $client = new Client;
        $client->last_name = $request->last_name;
        $client->first_name = $request->first_name;
        $client->last_name = $request->last_name;
        $client->age = $request->age;
        $client->disability_status = $request->disability_status;
        $client->senior_citizenship_status = $request->senior_citizenship_status;
        $client->phone_number = $request->phone_number;
        $client->DD214 = $request->DD214;
        $client->valid_id_status = $request->valid_id_status;
        $client->income_level = $request->income_level;
        $client->benefits = $request->benefits;
        $client->residence = $request->residence;
        $client->drivers_license_status = $request->drivers_license_status;
        $client->employment_status = $request->employment_status;
        $client->background = $request->background;
        $client->comments = $request->comments;

        $client->save();

        return view('addclient', ['added' => True]);
    }
}
