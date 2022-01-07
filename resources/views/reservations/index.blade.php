@extends('layouts.app')

@section('title', 'Reservation List')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div>
            <h4>Reservation List</h4>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Reservation List</div>

                <div class="card-body">
                    <table class="table table-striped table-dark">
                        <thead>
                            <tr class="text-center">
                            <th scope="col"># ID</th>
                            <th scope="col">Guest Name</th>
                            <th scope="col">Room ID</th>
                            <th scope="col">Room Type</th>
                            <th scope="col">CheckIn Date</th>
                            <th scope="col">CheckOut Date</th>
                            <th scope="col">Days</th>
                            <th scope="col">Total Price</th>
                            <th scope="col">Reservation Status</th>
                            <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reservations as $reservation)
                            <tr class="text-center">
                                <th scope="row">{{$reservation->reservation_id}}</th>
                                <td>{{$reservation->guest->first_name}} {{$reservation->guest->last_name}}</td>
                                <td>NO: {{$reservation->rooms->rooms_id}} </td>
                                <td>{{$reservation->rooms->roomtype->roomtypes_name}}</td>
                                <td>{{date('d-m-Y', strtotime($reservation->checkin_date))}}</td>
                                <td>{{date('d-m-Y', strtotime($reservation->checkout_date))}}</td>
                                <td>{{ \App\Models\Reservation::countDays($reservation) }}</td>
                                <td>RM: {{ \App\Models\Reservation::totalPrice($reservation) }}</td>
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