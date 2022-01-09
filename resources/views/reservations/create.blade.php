@extends('layouts.app')

@section('title', 'Reservation')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Room Reservation</div>

                <div class="card-body">
                    <form method="post" action="{{route('reservation.store')}}">
                        @csrf

                        <div class="row mb-3">
                            <label for="guest" class="col-md-4 col-form-label text-md-end">Guest Name: </label>

                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <select class="custom-select select2guest" id="guest_id" name="guest" data-width="100%" required>
                                        <option selected disabled>Choose...</option>
                                        @foreach ($guests as $guest)
                                            <option value="{{$guest->guest_id}}">{{$guest->first_name}} {{$guest->last_name}}</option>
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
                            <label for="checkin_date" class="col-md-4 col-form-label text-md-end">Check In Date: </label>
                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <input type="text" id="datepicker1" class="form-control" name="checkin_date" value="{{$checkin_date, old('checkin_date')}}" readonly >
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
                                    <input type="text" id="datepicker2" class="form-control" name="checkout_date" value="{{$checkout_date, old('checkout_date')}}" readonly >
                                </div>
                            </div>

                            @error('checkout_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="row mb-3">
                            <label for="room" class="col-md-4 col-form-label text-md-end">Room Number: </label>

                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <select class="custom-select select2room" id="rooms_id" name="rooms" data-width="100%">
                                        <option disabled>Choose...</option>
                                            <option selected value="{{$rooms, old('rooms_id')}}" selected >ROOM NO: {{$rooms}}</option>
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
                                <input id="num_of_guest" type="number" class="form-control @error('num_of_guest') is-invalid @enderror" name="num_of_guest" value="{{ old('num_of_guest') }}" required autocomplete="num_of_guest" autofocus>

                                @error('num_of_guest')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Submit
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
