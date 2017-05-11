<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    // table associated with this model.
    protected $table = 'client';

    public static function clientList() {
        return \DB::select("select *, concat(last_name, ', ', first_name) as name from client order by name");
    }

    public static function visitsInPastMonth() {
        return \DB::select("select count(*) as count from visit v
left join client c on v.client_id = c.id
where month(v.created_at) = month(now())")[0]->count;
    }

    public static function visitsInPastYear() {
        return \DB::select("select count(*) as count from visit v
left join client c on v.client_id = c.id
where year(v.created_at) = year(now())")[0]->count;
    }
}
