<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $primaryKey = 'reservation_id';

    protected $fillable = ['guest_id', 'num_of_guest', 'checkin_date', 'checkout_date', 'rooms_id', 'reservation_status', 'employee_id'];


    public function guest()
    {
        return $this->belongsTo(Guest::class, 'guest_id');
    }

    public function rooms()
    {
        return $this->belongsTo(Room::class, 'rooms_id');
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class, 'payment_id');
    }

    public function totalPrice(Reservation $reservation){
        $fromdate = $reservation->checkin_date;
        $todate = $reservation->checkout_date;
        $datetime1 = new \DateTime($fromdate);
        $datetime2 = new \DateTime($todate);
        $interval = $datetime1->diff($datetime2);
        $days = $interval->format('%a');//now do whatever you like with $days

        $total = $days * $reservation->rooms->roomtype->roomtypes_price;

        return $total;
    }

    public function countDays(Reservation $reservation)
    {
        $fromdate = $reservation->checkin_date;
        $todate = $reservation->checkout_date;
        $datetime1 = new \DateTime($fromdate);
        $datetime2 = new \DateTime($todate);
        $interval = $datetime1->diff($datetime2);
        $days = $interval->format('%a');//now do whatever you like with $days
        return $days;
    }
        
}
