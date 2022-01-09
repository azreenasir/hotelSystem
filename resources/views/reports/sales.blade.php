@extends('layouts.app')

@section('title', 'Generate Sales')


@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div>
            <h4>Sales</h4>
        </div>
    </div>
    <hr>
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="row-mb-3">
                        <div class="col-md-6">
                            <p>FROM DATE: {{date('d-m-Y', strtotime($date_from))}}</p>
                            <P>TO DATE: {{date('d-m-Y', strtotime($date_to))}}</P>
                        </div>
                    </div>
                    
                    
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Sales</div>

                <div class="card-body">
                    <table class="table table-striped table-dark">
                        <thead>
                            <tr class="text-center">
                                <th scope="col">Payment Date</th>
                                <th scope="col">Sales</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($price as $prices)
                            <tr class="text-center">
                                <td>{{date('d-m-Y', strtotime($prices->payment_date))}}</td>
                                <td>RM {{$prices->total_price}}</td>
                            </tr>
                            @endforeach
                            <tr class="text-right">
                                <td colspan="{{$count}}"><H5>TOTAL SALES: RM {{$sum}}</H5></td>
                            </tr>
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection