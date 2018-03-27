<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Http\Request;
use App\Client;
use App\Visit;

class DBController extends Controller
{
    public function viewclientDeleteVisit(Client $client, Visit $visit) {
        $visit->delete();
        return redirect()->route('view-client', $client);
    }

    public function showViewClient(Client $client) {
        return view('view-client', ['client' => $client]);
    }

    public function visitlogDeleteVisit(Visit $visit) {
        $visit->delete();
        return view('visitlog');
    }

    public function showVisitLog() {
        return view('visitlog');
    }

    public function deleteClient(Client $client) {
        $client->delete();
        return $this->showUpdate(False);
    }

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
        $query = "select c.id as client_id, v.id as visit_id, concat(c.last_name, ', ', c.first_name) as name, v.date, v.comments, v.count, v.daysSinceLastVisit from 

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
        } else if ($sortby == 4) {
            $query = $query . "name";
        } else if ($sortby == 5) {
            $query = $query . "name desc";
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
            'age' => 'integer',
            'email' => 'email'
        ]);

        $client = new Client;
        $client->first_name = $request->first_name;
        $client->last_name = $request->last_name;
        $client->age = $request->age;
        $client->disability_status = $request->disability_status;
        $client->senior_citizenship_status = $request->senior_citizenship_status;
        $client->email = $request->email;
        $client->phone_number = $request->phone_number;
        $client->character_of_service = $request->character_of_service;
        $client->valid_id = $request->valid_id;
        $client->income_level = $request->income_level;
        $client->benefits = $request->benefits;
        $client->address = $request->address;
        $client->drivers_license_status = $request->drivers_license_status;
        $client->employment_status = $request->employment_status;
        $client->background = $request->background;
        $client->comments = $request->comments;
        $client->branch = $request->branch;
        $client->healthcare_id_status = $request->healthcare_id_status;
        $client->combat_zone_service = $request->combat_zone_service;

        $client->save();

        return view('addclient', ['added' => True]);
    }

    public function getAgeReport(){
        $age = DB::table('client')
                    ->select(
                        DB::raw("age"),
                        DB::raw("COUNT(age) as occurences")) 
                    ->orderBy("age")
                    ->groupBy(DB::raw("age"))
                    ->get();

        $result[] = ['Age','Number'];
        foreach ($age as $key => $value) {
            $result[++$key] = [$value->age, (int)$value->occurences];
        }
        return $result;
    }

    public function getCOSReport(){
        $cosdata = DB::table('client')
            ->select(
                DB::raw("character_of_service"),
                DB::raw("COUNT(character_of_service) as occurences")) 
            ->orderBy("character_of_service")
            ->groupBy(DB::raw("character_of_service"))
            ->get();

        $result[] = ['Character Of Service','Number'];
        
        foreach ($cosdata as $key => $value) {
            $result[++$key] = [$value->character_of_service, (int)$value->occurences];
        }
        return $result;
    }

    public function getDisabilityReport(){
        $disdata = DB::table('client')
                    ->select(
                        DB::raw("disability_status"),
                        DB::raw("COUNT(disability_status) as occurences")) 
                    ->orderBy("disability_status")
                    ->groupBy(DB::raw("disability_status"))
                    ->get();

        $result[] = ['Disability Status','Number'];
        foreach ($disdata as $key => $value) {
            $result[++$key] = [$value->disability_status, (int)$value->occurences];
        }
        return $result;
    }

    public function getDLReport(){
        $DLdata = DB::table('client')
                    ->select(
                        DB::raw("drivers_license_status"),
                        DB::raw("COUNT(drivers_license_status) as occurences")) 
                    ->orderBy("drivers_license_status")
                    ->groupBy(DB::raw("drivers_license_status"))
                    ->get();

        $result[] = ['Drivers License Status','Number'];
        foreach ($DLdata as $key => $value) {
            $result[++$key] = [$value->drivers_license_status, (int)$value->occurences];
        }
        return $result;
    }

    public function getEmploymentReport(){
        $employmentdata = DB::table('client')
                    ->select(
                        DB::raw("employment_status"),
                        DB::raw("COUNT(employment_status) as occurences")) 
                    ->orderBy("employment_status")
                    ->groupBy(DB::raw("employment_status"))
                    ->get();

        $result[] = ['Drivers License Status','Number'];
        foreach ($employmentdata as $key => $value) {
            $result[++$key] = [$value->employment_status, (int)$value->occurences];
        }
        return $result;
    }

    public function getIncomeReport(){
        $incomedata = DB::table('client')
                    ->select(
                        DB::raw("income_level"),
                        DB::raw("COUNT(income_level) as occurences")) 
                    ->orderBy("income_level")
                    ->groupBy(DB::raw("income_level"))
                    ->get();

        $result[] = ['Income Level','Number'];
        foreach ($incomedata as $key => $value) {
            $result[++$key] = [$value->income_level, (int)$value->occurences];
        }
        return $result;
    }
    public function getSnrReport(){
        $snrdata = DB::table('client')
                    ->select(
                        DB::raw("senior_citizenship_status"),
                        DB::raw("COUNT(senior_citizenship_status) as occurences")) 
                    ->orderBy("senior_citizenship_status")
                    ->groupBy(DB::raw("senior_citizenship_status"))
                    ->get();

        $result[] = ['Senior Citizenship Status','Number'];
        foreach ($snrdata as $key => $value) {
            $result[++$key] = [$value->senior_citizenship_status, (int)$value->occurences];
        }
        return $result;
    }

    public function getDataTable($columns){
        $data = DB::table('client')
                    ->select(
                        DB::raw("concat(last_name, ', ', first_name) as name"),
                        DB::raw($columns . " as columns"))
                    ->orderBy(DB::raw($columns))
                    ->get();

        $result[] = ['Name','Value'];
        foreach ($data as $key => $value) {
            $result[++$key] = [$value->name, $value->columns];
        }

        return json_encode($result);
    }

    public function getDataTableAJAX(\Request $request){
        $response = array(
          'status' => 'success',
          'result' => 'test',
        );
        return \Response::json($response);
/*
        $input = $request->all();
        $filter = $input['filter'];
        $column = $input['id'];
        $where = $column . '=' . $filter;
        $data = DB::table('client')
                    ->select(
                        DB::raw("concat(last_name, ', ', first_name) as name"),
                        DB::raw($columns . " as columns"))
                    ->where(DB::raw($where)) 
                    ->orderBy(DB::raw($column))
                    ->get();

        $result[] = ['Name','Value'];
        foreach ($data as $key => $value) {
            $result[++$key] = [$value->name, $value->column];
        }
        $response = array(
            'status' =>'success',
            'result' => json_encode($result),
        );

        return \Response::json($response);*/
    }

    public function getDataReport(){
        $age = DBController::getAgeReport();
        $cos = DBController::getCOSReport();
        $dis = DBController::getDisabilityReport();
        $dl = DBController::getDLReport();
        $emp = DBController::getEmploymentReport();
        $inc = DBController::getIncomeReport();
        $snr = DBController::getSnrReport();

        return view('report-generator')
                ->with('age',json_encode($age))
                ->with('cos', json_encode($cos))
                ->with('dis', json_encode($dis))
                ->with('dl', json_encode($dl))
                ->with('emp', json_encode($emp))
                ->with('inc', json_encode($inc))
                ->with('snr', json_encode($snr));
    }
}
