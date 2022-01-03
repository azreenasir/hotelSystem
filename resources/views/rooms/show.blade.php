@extends('layouts.app')

@section('title', $roomtype->roomtypes_name)

@section('content')
<div class="container">
    <div class="d-flex justify-content-between m-2">
        <div>
            <h4>ROOM: {{$roomtype->roomtypes_name}}</h4>
            
        </div>
        <div>
            <a href="/room" class="btn btn-primary">Back</a>
        </div>
    </div>
    <hr>

    <div class="card">
        <div class="card-header">
            <h1>
                <center>
                    {{$roomtype->roomtypes_name}}
                </center>
                
            </h1>
        </div>
        <div class="card-body">
            <div class="container-fluid p-4">
                <center>
                    @if($roomtype->roomtypes_name == 'SINGLE')
                    <img src="/images/1.jpg" width="70%">
                    @elseif($roomtype->roomtypes_name == 'DOUBLE')
                    <img src="/images/2.jpg" width="70%">
                    @else
                    <img src="/images/3.jpg" width="70%">
                    @endif
                </center>
            </div>

            <div>
                <h5>ROOM SIZE: {{$roomtype->roomtypes_size}} Person</h5>
                <h5>ROOM PRICE: RM{{$roomtype->roomtypes_price}}</h5>
                <h5>ROOM DESCRIPTION: {{$roomtype->roomtypes_desc}}</h5>
            </div>
        </div>
    </div>
        
</div>
    
    
@endsection