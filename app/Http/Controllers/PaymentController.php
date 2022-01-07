<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use App\Models\Payment;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;

class PaymentController extends Controller
{

    public function index(Reservation $reservation)
    {
        return view('payments.index', [
            'reservation' => $reservation,
            'guests' => Guest::get(),
        ]);
    }

    public function store(Request $request, Payment $payment, Reservation $reservation)
    {
        $payment = $request->all();

        $payment['reservation_id'] = request('reservation');
        $payment['guest_id'] = request('guest');

        if(Payment::create($payment)){
            
            $results = Reservation::where('reservation_id', request('reservation'))->first(); // this point is the most important to change
            $results->reservation_status = 'Booked Successful';
            $results->save();

            session()->flash('success', 'Reservation has been successfully pay');
        }else{
            session()->flash('error', 'Failed to pay');
        }
        
        return redirect()->route('reservation.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        //
    }
}
