@extends('layouts.app')

@section('title', 'Search Room')


@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div>
            <h3 style="font-family: 'Franklin Gothic'"><b>Search Available Room</b></h3>
        </div>
    </div>
    <hr>
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card  bg-light mb-3">
                <div class="card-body">
                    <form method="post" action="{{route('search.result')}}">
                        @csrf

                        <div class="row mb-3">
                            <label for="time_from" class="col-md-4 col-form-label text-md-end"><h5><b> Check In Date : </b></h5></label>
                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <input type="text" id="datepicker1" class="form-control" name="checkin_date" required>
                                </div>
                            </div>

                            @error('time_from')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="row mb-3">
                            <label for="time_to" class="col-md-4 col-form-label text-md-end"><h5><b>Check Out Date : </b></h5></label>
                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <input type="text" id="datepicker2" class="form-control" name="checkout_date" required>
                                </div>
                            </div>

                            @error('time_to')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-5">
                                <button type="submit" class="btn btn-primary" >
                                    <h5 >Search</h5>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> 
@endsection