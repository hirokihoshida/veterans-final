<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Http\Request;
use App\Client;
use App\Visit;

class DBController extends Controller
{
    public function showUpdate($saved = False) {
        return view('update', ['client' => null, 'saved' => $saved]);
    }

    public function updateClient(Request $request, Client $client) {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'age' => 'integer'
        ]);

        $client->first_name = $request->first_name;
        $client->last_name = $request->last_name;
        $client->age = $request->age;
        $client->branch = $request->branch;
        $client->disability_status = $request->disability_status;
        $client->senior_citizenship_status = $request->senior_citizenship_status;
        $client->phone_number = $request->phone_number;
        $client->income_level = $request->income_level;
        $client->benefits = $request->benefits;
        $client->residence = $request->residence;
        $client->drivers_license_status = $request->drivers_license_status;
        $client->employment_status = $request->employment_status;
        $client->healthcare_id_status = $request->healthcare_id_status;
        $client->char_of_service = $request->char_of_service;
        $client->combat_zone_service = $request->combat_zone_service;
        $client->comments = $request->comments;

        $client->save();

        return $this->showUpdate(True);
    }

    public function showUpdateClient(Client $client) {
        return view('update', ['client' => $client, 'saved' => False]);
    }

    // export client list to CSV
    public function export() {
        $clients = Client::all();

        $output = fopen('php://output', 'w') or die("Can't open file");
        header("Content-Type:application/csv");
        header('Content-Disposition: attachment; filename="client-list.csv";');

        $fields = Schema::getColumnListing('client');
        fputcsv($output, $fields);
        foreach($clients as $client){
            $result_array = array();
            foreach ($fields as $field) {
                array_push($result_array, $client->$field);
            }
            fputcsv($output, $result_array);
        }
        fpassthru($output);
        fclose($output) or die("Can't close file");

    }

    // export search results to CSV
    public function exportSearch() {
        $results = session('search-results');
        $output = fopen('php://output', 'w') or die("Can't open file");
        header("Content-Type:application/csv");
        header('Content-Disposition: attachment; filename="search-results.csv";');

        $fields = session('search-fields');
        fputcsv($output, $fields);
        foreach($results as $result){
            $result_array = array($result->$fields[0], $result->$fields[1], $result->$fields[2], $result->$fields[3]);
            fputcsv($output, $result_array);
        }
        fpassthru($output);
        fclose($output) or die("Can't close file");
    }

    public function getClientList() {
        return view('clientlist', ['columns' => $this->getClientColumns()]);
    }

    public function saveVisit(Request $request) {

        $this->validate($request, [
            'date' => 'date_format:Y-m-d',
            'time' => 'date_format:h:i'
        ]);

        $names = DB::select("select id, concat(first_name, ' ', last_name) as name from client");

        $visit = new Visit;
        $visit->client_id = $request->client;

        // parse date and time from form to SQL datetime format
        $datetime = $request->date . " " . $request->time;
        $hours = intval(substr($request->time, 0, 2));
        if (strcmp($request->am_pm, "PM") == 0 && $hours < 12) {
            $datetime = $request->date . " " . ($hours + 12) . ":" . substr($request->time, 3);
        }
        $visit->date = $datetime;

        $visit->type = $request->type;
        $visit->comments = $request->comments;

        $visit->save();
        return view('logvisit', ['names' => $names, 'saved' => True]);

    }

    public function logVisit() {
        return view('logvisit', ['saved' => False]);
    }

    public function loadSearch() {
        return view('search', ['columns' => $this->getClientColumns(), 'results' => null, 'fields' => null]);
    }

    public function getClientColumns() {
        $columns = DB::select("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'client'");
        // Page doesn't need id, created_at, or updated_at, which are the first three columns in the client table
        unset($columns[0]);
        unset($columns[1]);
        unset($columns[2]);
        return $columns;
    }

    public function search(Request $request) {
        if (strcmp($request->where, "age") == 0) {
            $this->validate($request, [
                'select' => 'required',
                'where' => 'required',
                'value' => 'required|integer'
            ]);
        } else {
            $this->validate($request, [
                'select' => 'required',
                'where' => 'required'
            ]);
        }

        $results = DB::table('client')->select('last_name', 'first_name', $request->where, $request->select)->where($request->where, $request->operator, $request->value)->get();
        $request->session()->flash('search-results', $results);

        $fields = array('last_name', 'first_name', $request->select, $request->where);
        $request->session()->flash('search-fields', $fields);

        return view('search', ['columns' => $this->getClientColumns(), 'results' => $results, 'fields' => $fields]);
    }

    public function getClientNotifications($sortby = null) {
        $query = "select c.last_name, c.first_name, v.date, v.comments, v.count, v.daysSinceLastVisit from 

client c left join 

(select c.id, v.date, v.comments, count(*) as count, datediff(current_date(), v.date) as daysSinceLastVisit
from client c 
inner join visit v on v.client_id = c.id 
group by c.id) as v

on c.id = v.id
 
order by ";
        if ($sortby == null) {
            $query = $query . "v.date desc";
        } else if ($sortby == 1) {
            $query = $query . "v.date";
        } else if ($sortby == 2) {
            $query = $query . "c.last_name";
        } else if ($sortby == 3) {
            $query = $query . "c.last_name desc";
        } else if ($sortby == 4) {
            $query = $query . "c.first_name";
        } else if ($sortby == 5) {
            $query = $query . "c.first_name desc";
        } else if ($sortby == 6) {
            $query = $query . "v.count desc";
        } else if ($sortby == 7) {
            $query = $query . "v.count";
        } else if ($sortby == 8) {
            $query = $query . "v.daysSinceLastVisit desc";
        } else if ($sortby == 9) {
            $query = $query . "v.daysSinceLastVisit";
        }

        // take most recent visit from each client
        $clientlist = DB::select($query);
        return view('notifications', ['clientlist' => $clientlist, 'sortby' => $sortby]);
    }

    public function addNewClient(Request $request) {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'age' => 'integer'
        ]);

        $client = new Client;
        $client->first_name = $request->first_name;
        $client->last_name = $request->last_name;
        $client->age = $request->age;
        $client->branch = $request->branch;
        $client->disability_status = $request->disability_status;
        $client->senior_citizenship_status = $request->senior_citizenship_status;
        $client->phone_number = $request->phone_number;
        $client->income_level = $request->income_level;
        $client->benefits = $request->benefits;
        $client->residence = $request->residence;
        $client->drivers_license_status = $request->drivers_license_status;
        $client->employment_status = $request->employment_status;
        $client->healthcare_id_status = $request->healthcare_id_status;
        $client->char_of_service = $request->char_of_service;
        $client->combat_zone_service = $request->combat_zone_service;
        $client->comments = $request->comments;

        $client->save();

        return view('addclient', ['added' => True]);
    }
}
