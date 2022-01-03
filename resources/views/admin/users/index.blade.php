@extends('layouts.app')

@section('title', 'User Management')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h4>User Management</h4></div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#ID</th>
                            <th scope="col">FIRST NAME</th>
                            <th scope="col">LAST NAME</th>
                            <th scope="col">PHONE NUMBER</th>
                            <th scope="col">ADDRESS</th>
                            <th scope="col">EMAIL</th>
                            <th scope="col">ROLES</th>
                            <th scope="col">ACTIONS</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <th scope="row">{{$user->id}}</th>
                                <td>{{$user->first_name}}</td>
                                <td>{{$user->last_name}}</td>
                                <td>{{$user->phone_number}}</td>
                                <td>{{$user->address}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{implode(', ', $user->roles()->get()->pluck('name')->toArray())}}</td>
                                <td class="text-right row">
                                    <div class="btn-group" role="group">
                                        <div class="col-md-4">
                                            <a href="{{route('admin.users.edit', $user->id)}}"><button type="button" class="btn btn-primary">Edit</button></a>        
                                        </div>
                                        <div class="col-md-4">
                                            <form action="{{route('admin.users.destroy', $user)}}" method="post" class="">
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
