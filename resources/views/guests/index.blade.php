@extends('layouts.app')

@section('title', 'Guest List')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-between ml-4 mr-4">
        <div>
            <h3>List of Guest</h3>
        </div>
        <div>
            <a href="{{route('guest.create')}}" class="btn btn-primary">Add New Guest</a>
        </div>
    </div>
    <hr>
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <center><b><h3>Guest List</h3></b></center>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-dark">
                        <thead class="text-center">
                            <tr>
                            <th scope="col"><h5># ID</h5></th>
                            <th scope="col"><h5>First Name</h5></th>
                            <th scope="col"><h5>Last Name</h5></th>
                            <th scope="col"><h5>Address</h5></th>
                            <th scope="col"><h5>Contact Number</h5></th>
                            <th scope="col"><h5>Email</h5></th>
                            <th scope="col"><h5>Actions</h5></th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach ($guests as $guest)
                            <tr>
                                <th scope="row"><h5>{{$guest->guest_id}}</h5></th>
                                <td><h5>{{$guest->first_name}}</h5></td>
                                <td><h5>{{$guest->last_name}}</h5></td>
                                <td><h5>{{$guest->address}}</h5></td>
                                <td><h5>{{$guest->contact_number}}</h5></td>
                                <td><h5>{{$guest->email}}</h5></td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <div class="col-md-4">
                                            <a href="{{route('guest.edit', $guest)}}"><button type="button" class="btn btn-primary">Edit</button></a>        
                                        </div>
                                        <div class="col-md-4">
                                            <form action="{{route('guest.delete', $guest)}}" method="post" class="">
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
</div>
    
@endsection