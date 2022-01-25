<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChartController extends Controller
{
    
    public function pieChart()
    {
        $result = \DB::select(\DB::raw("SELECT count(e.reservation_id) as rooms, d.rooms_id, l.roomtypes_name
        FROM reservations e
        JOIN rooms d
        ON e.rooms_id = d.rooms_id
        JOIN roomtypes l
        ON d.roomtypes_id = l.roomtypes_id
        GROUP BY d.rooms_id, l.roomtypes_name"));
        $data = "";
        foreach($result as $val){
            $data.="['No:".$val->rooms_id. " | " . $val->roomtypes_name."',     ".$val->rooms."],";
        }
        return view('reports.pie', compact('data'));
    }
}
