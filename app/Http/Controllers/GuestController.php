<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use Illuminate\Http\Request;

class GuestController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $guests = Guest::all();
        return view('guests.index', compact('guests'));
    }

    public function create()
    {
        return view('guests.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $guest = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'contact_number' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'email' => 'required|string|email|max:255|unique:users',
        ]);

        if(Guest::create($guest)){
            session()->flash('success', 'Guest has been added');
        }else{
            session()->flash('error', 'Failed to add new guest');
        }

        return back();
    }

    public function edit(Guest $guest)
    {
        return view('guests.edit', [
            'guest' => $guest,
        ]);
    }


    public function update(Request $request, Guest $guest)
    {
        $guest->first_name = $request->first_name;
        $guest->last_name = $request->last_name;
        $guest->address = $request->address;
        $guest->contact_number = $request->contact_number;
        $guest->email = $request->email;

        if($guest->save())
        {
            session()->flash('success', 'Guest has been updated');
        }else{
            session()->flash('error', 'Failed to update guest');
        }
        
        return redirect()->route('guest.index');
    }


    public function destroy(Request $request, Guest $guest)
    {
        if($guest->delete()){
            $request->session()->flash('success', 'guest has been deleted');
        }else{
            $request->session()->flash('error', 'There was an error deleting the guest');
        }

        return redirect()->route('guest.index');
    }
}
