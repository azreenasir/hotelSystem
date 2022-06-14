<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class GuestSearchController extends Controller
{
    public function result(Request $request)
    {
        $checkin_date = $request->checkin_date;
        $checkout_date = $request->checkout_date;

        $rooms = Room::whereNotIn('rooms_id', function($query) use ($checkin_date, $checkout_date) {
            $query->from('reservations')
             ->select('rooms_id')
             ->where('checkin_date', '<', $checkout_date)
                ->where('checkout_date', '>', $checkin_date);
         })->orderBy('rooms_id', 'ASC')->get();

        return view('roomavailable', compact('rooms', 'checkout_date', 'checkin_date'));
        
    }
}
