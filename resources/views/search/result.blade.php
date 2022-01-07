@extends('layouts.app')

@section('title', 'All Booked Room')


@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div>
            <h4>All Available Room</h4>
        </div>
    </div>
    <hr>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-3">
                        <label for="time_from" class="col-md-4 col-form-label text-md-end">Check In Date: </label>
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <input type="text" id="datepicker1" class="form-control" name="checkin_date" value="{{$checkin_date, old('checkin_date')}}" readonly>
                            </div>
                        </div>
            
                        @error('time_from')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
            
                    <div class="row mb-3">
                        <label for="time_to" class="col-md-4 col-form-label text-md-end">Check Out Date: </label>
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <input type="text" id="datepicker2" class="form-control" name="checkout_date" value="{{$checkout_date, old('checkout_date')}}" readonly>
                            </div>
                        </div>
            
                        @error('time_to')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped table-dark">
                        <thead>
                        <tr class="text-center">
                            <th scope="col">ID</th>
                            <th scope="col">RoomType</th>
                            <th scope="col">Max Person</th>
                            <th scope="col">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($rooms as $room)
                            <tr class="text-center">
                                <b><th scope="row">{{$room->rooms_id}}</th></b>
                                <td>{{$room->roomtype->roomtypes_name}}</td>
                                <td>{{$room->roomtype->roomtypes_size}}</td>
                                <td>
                                    <a class="btn btn-primary" href="{{route('reservation.create', ['rooms_id' => $room->rooms_id,'checkin_date' => $checkin_date, 'checkout_date' => $checkout_date])}}">
                                    Make reservation</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection