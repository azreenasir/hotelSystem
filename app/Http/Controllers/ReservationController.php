<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use App\Models\Reservation;
use App\Models\Room;
use App\Models\Roomtype;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReservationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $guests = Guest::get();
        $rooms = Room::get();
        $roomtypes = Roomtype::get();
        $reservations = Reservation::get();

        return view('reservations.index', compact('reservations','rooms', 'roomtypes', 'guests'));
    }

    public function create()
    {
        $guests = Guest::get();
        $rooms = Room::get();
        $roomtypes = Roomtype::get();

        return view('reservations.create', compact('rooms', 'roomtypes', 'guests'));
    }

    public function store(Request $request)
    {

        $reservation = $request->all();

        $reservation['reservation_status'] = strtolower('pending');
        $reservation['guest_id'] = request('guest');
        $reservation['rooms_id'] = request('rooms');      
        
        if(Reservation::create($reservation))
        {
            session()->flash('success', 'Reservation has been added');
        }else{
            session()->flash('error', 'Failed to add new Reservation');
        }
        
        return redirect()->route('reservation.index');
    }

    public function edit(Reservation $reservation)
    {

        return view('reservations.edit', [
            'reservation' => $reservation,
            'rooms' => Room::get(),
            'guests' => Guest::get(),
        ]);
    }

    public function update(Request $request,Reservation $reservation)
    {
        $reservation->guest_id = $request->guest;
        $reservation->rooms_id = $request->rooms;
        $reservation->checkin_date = $request->checkin_date;
        $reservation->checkout_date = $request->checkout_date;
        $reservation->num_of_guest = $request->num_of_guest;
        $reservation->reservation_status = $request->reservation_status;

        if($reservation->save())
        {
            session()->flash('success', 'Reservation has been updated');
        }else{
            session()->flash('error', 'Failed to add new Reservation');
        }
        
        return redirect()->route('reservation.index');
    }

    public function destroy(Request $request, Reservation $reservation)
    {

        if($reservation->delete()){
            $request->session()->flash('success', 'reservation has been deleted');
        }else{
            $request->session()->flash('error', 'There was an error deleting the reservation');
        }

        return redirect()->route('reservation.index');
    }

    
}
