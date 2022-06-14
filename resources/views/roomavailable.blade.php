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
                        <label for="time_from" class="col-md-4 col-form-label text-md-end"><h5><b>Check In Date:</b></h5> </label>
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
                        <label for="time_to" class="col-md-4 col-form-label text-md-end"><h5><b>Check Out Date:</b></h5> </label>
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
                            <th scope="col"><h5><b>ID</b></h5></th>
                            <th scope="col"><h5><b>RoomType</b></h5></th>
                            <th scope="col"><h5><b>Max Person</b></h5></th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($rooms as $room)
                            <tr class="text-center">
                                <b><th scope="row"><h5>{{$room->rooms_id}}</h5></th></b>
                                <td><h5><b>{{$room->roomtype->roomtypes_name}}</b></h5></td>
                                <td><h5><b>{{$room->roomtype->roomtypes_size}}</b></h5></td>
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