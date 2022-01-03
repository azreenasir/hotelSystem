@extends('layouts.app')

@section('title', 'Guest List')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-between ml-4 mr-4">
        <div>
            <h4>List of Guest</h4>
        </div>
        <div>
            <a href="{{route('guest.create')}}" class="btn btn-primary">Add New Guest</a>
        </div>
    </div>
    <hr>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Guest
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col"># ID</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Address</th>
                            <th scope="col">Contact Number</th>
                            <th scope="col">Email</th>
                            <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($guests as $guest)
                            <tr>
                                <th scope="row">{{$guest->guest_id}}</th>
                                <td>{{$guest->first_name}}</td>
                                <td>{{$guest->last_name}}</td>
                                <td>{{$guest->address}}</td>
                                <td>{{$guest->contact_number}}</td>
                                <td>{{$guest->email}}</td>
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