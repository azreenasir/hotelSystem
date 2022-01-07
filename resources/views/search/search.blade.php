@extends('layouts.app')

@section('title', 'Search Room')


@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div>
            <h4>Search Available Room</h4>
        </div>
    </div>
    <hr>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form method="post" action="{{route('search.result')}}">
                        @csrf

                        <div class="row mb-3">
                            <label for="time_from" class="col-md-4 col-form-label text-md-end">Check In Date: </label>
                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <input type="text" id="datepicker1" class="form-control" name="checkin_date">
                                </div>
                            </div>

                            @error('time_from')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="row mb-3">
                            <label for="time_to" class="col-md-4 col-form-label text-md-end">Check Out Date: </label>
                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <input type="text" id="datepicker2" class="form-control" name="checkout_date">
                                </div>
                            </div>

                            @error('time_to')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Submit
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