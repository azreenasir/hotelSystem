@extends('layouts.app')

@section('title', 'Payment')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div>
            <h4>Payment</h4>
        </div>
    </div>
    <hr>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Payment: Reservation number {{$reservation->reservation_id}}</div>

                <div class="card-body">
                    <form method="post" action="{{route('payment.store')}}">
                        @csrf

                        <div class="row mb-3">
                            <label for="reservation" class="col-md-4 col-form-label text-md-end">Reservation ID: </label>

                            <div class="col-md-6">
                                <input id="reservation" type="text" class="form-control @error('reservation') is-invalid @enderror" name="reservation" value="{{ $reservation->reservation_id }}" readonly autofocus>

                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="guest" class="col-md-4 col-form-label text-md-end">Guest ID: </label>

                            <div class="col-md-6">
                                <input id="guest" type="text" class="form-control @error('guest') is-invalid @enderror" name="guest" value="{{ $reservation->guest->guest_id }}" readonly autofocus>

                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="guest_name" class="col-md-4 col-form-label text-md-end">Guest Name: </label>

                            <div class="col-md-6">
                                <input id="guest_name" type="text" class="form-control @error('guest_name') is-invalid @enderror" name="guest_name" value="{{ $reservation->guest->first_name }} {{ $reservation->guest->last_name }}" readonly autofocus>

                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="payment_desc" class="col-md-4 col-form-label text-md-end">Description: </label>
    
                            <div class="col-md-6">
                                <textarea id="payment_desc" type="text" class="form-control @error('payment_desc') is-invalid @enderror" name="payment_desc" rows="5" readonly autofocus>Room ID: {{$reservation->rooms->rooms_id}}&#13;&#10;Room Type: {{$reservation->rooms->roomtype->roomtypes_name}}&#13;&#10;Check In: {{date('d-m-Y', strtotime($reservation->checkin_date))}}&#13;&#10;Check Out: {{date('d-m-Y', strtotime($reservation->checkout_date))}}&#13;&#10;Days : {{ \App\Models\Reservation::countDays($reservation) }}</textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="total_price" class="col-md-4 col-form-label text-md-end">Total Price: </label>

                            <div class="col-md-6">
                                <input id="total_price" type="text" class="form-control @error('total_price') is-invalid @enderror" name="total_price" value="{{ \App\Models\Reservation::totalPrice($reservation) }}" readonly autofocus>
                            </div>
                        </div>


                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Confirm Payment
                                </button>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection