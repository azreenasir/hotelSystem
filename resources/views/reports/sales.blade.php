@extends('layouts.app')

@section('title', 'Generate Sales')


@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div>
            <h3 style="font-family: 'Franklin Gothic'">Sales</h3>
        </div>
    </div>
    <hr>
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="row-mb-6">
                        <div class="col text-center">
                            <h5><b>FROM DATE: {{date('d-m-Y', strtotime($date_from))}}</b></h5>
                            <h5><b>TO DATE: {{date('d-m-Y', strtotime($date_to))}}</b></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><b>Sales Report</b></div>

                <div class="card-body">
                    <table class="table table-striped table-dark">
                        <thead>
                            <tr class="text-center">
                                <th scope="col"><h5><b>Payment ID</b></h5></th>
                                <th scope="col"><h5><b>Payment Date</b></h5></th>
                                <th scope="col"><h5><b>Payment Desc</b></h5></th>
                                <th scope="col"><h5><b>Sales</b></h5></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($price as $prices)
                            <tr class="text-center">
                                <td><h5><b>{{$prices->payment_id}}</b></h5></td>
                                <td><h5><b>{{date('d-m-Y', strtotime($prices->payment_date))}}</b></h5></td>
                                <td><h5><b>{{Str::limit($prices->payment_desc, 11, '')}}</b></h5></td>
                                <td><h5><b>RM {{$prices->total_price}}</b></h5></td>
                            </tr>
                            @endforeach
                            <tr class="text-right">
                                <td colspan="4"><h4><b>TOTAL SALES: RM {{$sum}}</b></h4></td>
                            </tr>
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection