<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class visit extends Model
{
    protected $table = 'visit';

    public static function visitLog() {
        return \DB::select("select v.id, date(v.date) as date, concat(c.last_name, ', ', c.first_name) as name, v.type, c.comments from visit v
left join client c on v.client_id = c.id");
    }

    public static function visitsForClient($id) {
        return \DB::select("select *, date(date) as date from visit where client_id = ?", [$id]);
    }
}
