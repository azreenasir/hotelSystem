@extends('layouts.app')

@section('title', 'All Rooms')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <h2 style="font-family: 'Franklin Gothic'">TYPES OF ROOM</h2>
    </div>
    <hr>
    
    <div class="row">
            
            @foreach ($roomtypes as $room)
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-header">
                            <center>
                                <b>
                                    <h3 style="font-family: 'Bernard MT'">
                                        {{ $room->roomtypes_name}}
                                    </h3>
                                </b>
                            </center>
                        </div>
                        @if($room->roomtypes_name == 'SINGLE')
                        <img src="/images/1.jpg">
                        @elseif($room->roomtypes_name == 'DOUBLE')
                        <img src="/images/2.jpg">
                        @else
                        <img src="/images/3.jpg">
                        @endif
                        <div class="card-body">

                            <div>
                                <center>
                                    <h4>
                                        RM: {{$room->roomtypes_price}} FOR 1 NIGHT
                                    </h4>
                                </center>
                            </div>
                            <div class="m-2">
                                <center>
                                    <h4 style="font-family: 'Franklin Gothic'">
                                        <a  href="/room/{{$room->roomtypes_id}}" class="btn btn-info">View Room</a>
                                    </h4>
                                </center>
                            </div>
                            
                        </div>
                    </div>
                </div>
            @endforeach
            
    </div>
</div>    
@endsection