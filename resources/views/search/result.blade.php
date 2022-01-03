@extends('layouts.app')

@section('title', 'All Booked Room')


@section('content')
<div class="row justify-content-between ml-4 mr-4">
    <div>
        <h4>Search Booked Room</h4>
    </div>
    <div>
        <a href="{{route('reservation.create')}}" class="btn btn-primary">Make Reservation</a>
    </div>
</div>
<hr>
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">All Booked Room</div>
            <div class="card-body">
                <table class="table">
                    <thead>
                      <tr class="text-center">
                        <th scope="col">#ID</th>
                        <th scope="col">Guest ID</th>
                        <th scope="col">Rooms ID</th>
                        <th scope="col">Rooms Type</th>
                        <th scope="col">Number Of Guest</th>
                        <th scope="col">Reservation Status</th>
                        <th scope="col">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($reserved as $reserve)
                        <tr class="text-center">
                            <th scope="row">{{$reserve->reservation_id}}</th>
                            <td>{{$reserve->guest->guest_id}}</td>
                            <td>{{$reserve->rooms->rooms_id}}</td>
                            <td>{{$reserve->rooms->roomtype->roomtypes_name}}</td>
                            <td>{{$reserve->num_of_guest}}</td>
                            <td><a class="btn btn-success"><b>{{$reserve->reservation_status}}</td>
                            <td>
                                <div class="btn-group" role="group">
                                        <a href="{{route('reservation.edit', $reserve)}}"><button type="button" class="btn btn-primary">Edit</button></a>        
                                    <div class="col-md-4">
                                        <form action="{{route('reservation.delete', $reserve)}}" method="post" class="">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-warning">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
               
            </div>
        </div>
    </div>
</div>
    
@endsection