@extends('layouts.app')

@section('title', 'All Rooms')

@section('content')
<div class="container-fluid">
    <div>
        <h4>Types Of Room</h4>
    </div>
    <hr>
    
    <div class="row">
            
            @foreach ($roomtypes as $room)
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-header">
                            <center>
                                <b>
                                    {{ $room->roomtypes_name}}
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
                                    RM: {{$room->roomtypes_price}} FOR 1 NIGHT
                                </center>
                            </div>
                            <div class="m-2">
                                <center>
                                    <a href="/room/{{$room->roomtypes_id}}">View Room</a>
                                </center>
                            </div>
                            
                        </div>
                    </div>
                </div>
            @endforeach
            
    </div>
</div>    
@endsection