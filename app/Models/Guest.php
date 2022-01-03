<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    use HasFactory;

    protected $primaryKey = 'guest_id';

    protected $fillable = ['first_name', 'last_name', 'address', 'contact_number', 'email'];


    public function reservations()
    {
        return $this->hasOne(Reservation::class, 'reservation_id');
    }

    public function payment(){
        return $this->hasOne(Payment::class, 'payment_id');
    }
}
