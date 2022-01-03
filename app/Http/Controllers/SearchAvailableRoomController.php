<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Room;
use Illuminate\Http\Request;

class SearchAvailableRoomController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $rooms = Room::get();
        return view('search.search', compact('rooms'));
    }

    public function result(Request $request)
    {
        $time_from = $request->time_from;
        $time_to = $request->time_to;

        $reserved = Reservation::where('checkin_date',  '<=', $time_from)->where('checkout_date', '>=', $time_to)->get();

        return view('search.result', compact('reserved'));

    }

}
