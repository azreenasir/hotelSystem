@extends('layouts.app')

@section('title', 'Reservation List')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div>
            <h3 style="font-family: 'Franklin Gothic'">Reservation List</h3>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><b>Reservation List</b></div>

                <div class="card-body">
                    <table class="table table-striped table-dark">
                        <thead>
                            <tr class="text-center">
                            <th scope="col"><h5><b># ID</b></h5></th>
                            <th scope="col"><h5><b>Guest Name</b></h5></th>
                            <th scope="col"><h5><b>Room ID</b></h5></th>
                            <th scope="col"><h5><b>Room Type</b></h5></th>
                            <th scope="col"><h5><b>CheckIn Date</b></h5></th>
                            <th scope="col"><h5><b>CheckOut Date</b></h5></th>
                            <th scope="col"><h5><b>Days</b></h5></th>
                            <th scope="col"><h5><b>Total Price</b></h5></th>
                            <th scope="col"><h5><b>Reservation Status</b></h5></th>
                            <th scope="col"><h5><b>Actions</b></h5></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reservations as $reservation)
                            <tr class="text-center">
                                <th scope="row"><h5><b>{{$reservation->reservation_id}}</b></h5></th>
                                <td><h5><b>{{$reservation->guest->first_name}} {{$reservation->guest->last_name}}</b></h5></td>
                                <td><h5><b>NO: {{$reservation->rooms->rooms_id}} </b></h5></td>
                                <td><h5><b>{{$reservation->rooms->roomtype->roomtypes_name}}</b></h5></td>
                                <td><h5><b>{{date('d-m-Y', strtotime($reservation->checkin_date))}}</b></h5></td>
                                <td><h5><b>{{date('d-m-Y', strtotime($reservation->checkout_date))}}</b></h5></td>
                                <td><h5><b>{{ \App\Models\Reservation::countDays($reservation) }}</b></h5></td>
                                <td><h5><b>RM: {{ \App\Models\Reservation::totalPrice($reservation) }}</b></h5></td>
                                <td><h5><span class="badge badge-pill badge-success">{{$reservation->reservation_status}}</h5></span></td>
                                <td>
                                    <div class="btn-group" role="group">
                                            <a href="{{route('reservation.edit', $reservation)}}"><button type="button" class="btn btn-primary">Edit</button></a>        
                                        <div class="col-md-4">
                                            <form action="{{route('reservation.delete', $reservation)}}" method="post" class="">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-warning">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                                {{-- <td>{{$reservation->checkin_date}}</td> --}}
                                {{-- <td>{{$reservation->checkout_date}}</td> --}}
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