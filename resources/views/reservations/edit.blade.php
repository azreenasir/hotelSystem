@extends('layouts.app')

@section('title', 'Reservation')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Room Reservation: {{$reservation->reservation_id}}</div>

                <div class="card-body">
                    <form method="post" action="{{route('reservation.update', $reservation)}}">
                        @csrf

                        <div class="row mb-3">
                            <label for="guest" class="col-md-4 col-form-label text-md-end">Guest Name: </label>

                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <select class="custom-select select2guest" id="guest_id" name="guest" data-width="100%" required>
                                        @foreach ($guests as $guest)
                                            <option {{ $guest->guest_id == $reservation->guest_id ? 'selected': ''}} value="{{$guest->guest_id}}">{{$guest->first_name}} {{$guest->last_name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                @error('guest_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="room" class="col-md-4 col-form-label text-md-end">Room Number: </label>

                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <select class="custom-select select2room" id="rooms_id" name="rooms" data-width="100%">
                                        @foreach ($rooms as $room)
                                            <option {{ $room->rooms_id == $reservation->rooms_id ? 'selected': ''}} value="{{$room->rooms_id}}">ROOM NO: {{$room->rooms_id}}  {{$room->roomtype->roomtypes_name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                @error('rooms_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="num_of_guest" class="col-md-4 col-form-label text-md-end">Number Of Guest:</label>

                            <div class="col-md-6">
                                <input id="num_of_guest" type="number" class="form-control @error('num_of_guest') is-invalid @enderror" name="num_of_guest" value="{{$reservation->num_of_guest }}" required autocomplete="num_of_guest" autofocus>

                                @error('num_of_guest')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="checkin_date" class="col-md-4 col-form-label text-md-end">Check In Date: </label>
                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <input type="text" id="datepicker1" class="form-control" name="checkin_date" value="{{date('Y-m-d', strtotime($reservation->checkin_date))}}">
                                </div>
                            </div>

                            @error('checkin_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="row mb-3">
                            <label for="checkout_date" class="col-md-4 col-form-label text-md-end">Check Out Date: </label>
                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <input type="text" id="datepicker2" class="form-control" name="checkout_date" value="{{date('Y-m-d', strtotime($reservation->checkout_date))}}">
                                </div>
                            </div>

                            @error('checkout_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="row mb-3">
                            <label for="reservation_status" class="col-md-4 col-form-label text-md-end">Reservation Status</label>
    
                            <div class="col-md-6">
                                <input id="reservation_status" type="text" class="form-control @error('reservation_status') is-invalid @enderror" name="reservation_status" value="{{ $reservation->reservation_status }}" required autocomplete="reservation_status" autofocus>
    
                                @error('reservation_status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Update
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