@extends('layouts.app')

@section('title', 'Employee Management')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header"><h4 style="font-family: 'Franklin Gothic'">Employee Management</h4></div>
                <div class="card-body">
                    <table class="table table-striped table-dark">
                        <thead>
                          <tr class="text-center">
                            <th scope="col"><h5><b>#ID</b></h5></th>
                            <th scope="col"><h5><b>FIRST NAME</b></h5></th>
                            <th scope="col"><h5><b>LAST NAME</b></h5></th>
                            <th scope="col"><h5><b>PHONE NUMBER</b></h5></th>
                            <th scope="col"><h5><b>ADDRESS</b></h5></th>
                            <th scope="col"><h5><b>ADDRESS</b></h5></th>
                            <th scope="col"><h5><b>ROLES</b></h5></th>
                            <th scope="col"><h5><b>ACTIONS</b></h5></th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr class="text-center">
                                <th scope="row"><h5><b>{{$user->id}}</b></h5></th>
                                <td><h6><b>{{$user->first_name}}</b></h6></td>
                                <td><h6><b>{{$user->last_name}}</b></h6></td>
                                <td><h6><b>{{$user->phone_number}}</b></h6></td>
                                <td><h6><b>{{$user->address}}</b></h6></td>
                                <td><h6><b>{{$user->email}}</b></h6></td>
                                <td><h6><b>{{implode(', ', $user->roles()->get()->pluck('name')->toArray())}}</b></h6></td>
                                <td class="text-right row ml-4">
                                    <div class="btn-group" role="group">
                                        <div class="col-md-4">
                                            <a href="{{route('admin.users.edit', $user->id)}}"><button type="button" class="btn btn-primary"><h6>Edit</h6></button></a>        
                                        </div>
                                        <div class="col-md-4">
                                            <form action="{{route('admin.users.destroy', $user)}}" method="post" class="">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-warning"><h6>Delete</h6></button>
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
