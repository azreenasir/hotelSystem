@extends('layouts.app')

@section('title', 'Reservation')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row justify-content-between">
                        <div class="col-md-4">
                            <div>
                                <b><h5>Room Reservation</h5></b>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div>
                                
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                    <h6>Register guest</h6>
                                </button>

                                <!--Add Guest Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="exampleModalLabel">Register Guest</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post" action="{{route('guest.store')}}">
                                                @csrf
                        
                                                <div class="row mb-3">
                                                    <label for="first_name" class="col-md-4 col-form-label text-md-end"><h6><b>First Name</b></h6></label>
                        
                                                    <div class="col-md-6">
                                                        <input type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>
                        
                                                        @error('first_name')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                        
                                                <div class="row mb-3">
                                                    <label for="last_name" class="col-md-4 col-form-label text-md-end"><h6><b>Last Name</b></h6></label>
                        
                                                    <div class="col-md-6">
                                                        <input type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>
                        
                                                        @error('last_name')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                        
                                                <div class="row mb-3">
                                                    <label for="address" class="col-md-4 col-form-label text-md-end"><h6><b>Address</b></h6></label>
                            
                                                    <div class="col-md-6">
                                                        <textarea type="text" class="form-control @error('address') is-invalid @enderror" name="address" required autocomplete="address" autofocus></textarea>
                            
                                                        @error('address')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                        
                                                <div class="row mb-3">
                                                    <label for="contact_number" class="col-md-4 col-form-label text-md-end"><h6><b>Contact Number</b></h6></label>
                        
                                                    <div class="col-md-6">
                                                        <input type="number" class="form-control @error('contact_number') is-invalid @enderror" name="contact_number" value="{{ old('contact_number') }}" required autocomplete="contact_number" autofocus>
                        
                                                        @error('contact_number')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                        
                                                <div class="row mb-3">
                                                    <label for="email" class="col-md-4 col-form-label text-md-end"><h6><b>Email</b></h6></label>
                            
                                                    <div class="col-md-6">
                                                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="" required autocomplete="email">
                            
                                                        @error('email')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                        
                                                <div class="row mb-0">
                                                    <div class="col-md-6 offset-md-4">
                                                        <button type="submit" class="btn btn-primary">
                                                            <h6>Register</h6>
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <form method="post" action="{{route('reservation.store')}}" id="form">
                        @csrf

                        <div class="row mb-3">
                            <label for="guest" class="col-md-4 col-form-label text-md-end"><h6>Guest Name: </h6></label>

                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <select class="custom-select select2guest" id="guest_id" name="guest" data-width="100%" required>
                                        <option disabled  selected>Select your option</option>
                                        @foreach ($guests as $guest)
                                            <option value="{{$guest->guest_id}}">{{$guest->first_name}} {{$guest->last_name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                @error('guest')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="checkin_date" class="col-md-4 col-form-label text-md-end"><h6>Check In Date: </h6></label>
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
                            <label for="checkout_date" class="col-md-4 col-form-label text-md-end"><h6>Check Out Date: </h6></label>
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
                            <label for="room" class="col-md-4 col-form-label text-md-end"><h6>Room Number: </h6></label>

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
                            <label for="num_of_guest" class="col-md-4 col-form-label text-md-end"><h6>Number Of Guest:</h6></label>

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
                                    <h6>Submit</h6>
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
