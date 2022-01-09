@extends('layouts.app')

@section('title', 'Sales')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                   <h4><center>Generate Sales Report</center></h4>
                </div>
                <div class="card-body">
                    <form method="post" action="{{route('sales.total')}}">
                        @csrf

                        <div class="row mb-3">
                            <label for="checkin_date" class="col-md-4 col-form-label text-md-end"><h5>From Date: </h5></label>
                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <input type="text" id="datepicker1" class="form-control" name="date_from">
                                </div>
                            </div>

                            @error('checkin_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="row mb-3">
                            <label for="checkout_date" class="col-md-4 col-form-label text-md-end"><h5>To Date: </h5></label>
                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <input type="text" id="datepicker2" class="form-control" name="date_to">
                                </div>
                            </div>

                            @error('checkout_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-5">
                                <button type="submit" class="btn btn-primary">
                                    Generate
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