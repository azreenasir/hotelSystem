<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Reservation;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('reports.index');
    }

    public function totalSales(Request $request)
    {
        $time_from = $request->date_from;
        $time_to = $request->date_to;

        $date_from = Carbon::parse($time_from)->format('Y-m-d');
        $date_to = Carbon::parse($time_to)->format('Y-m-d');

        $price = Payment::select('payment_id','total_price', 'payment_date', 'payment_desc')
        ->whereBetween('payment_date', [$date_from, $date_to])
        ->get();
        
        $count = count($price);
        if($count == 0){
            $count = 2;
        }

        $sum = 0;
        foreach ($price as $p) {
            $id = $p->payment_id;
            $find = Payment::where('payment_id', $id)->first();
            $total = $find->total_price;
            $sum += $total;
        }

        return view('reports.sales', compact('price', 'date_from', 'date_to', 'sum', 'count'));

        
    }
}
