<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roomtype extends Model
{
    use HasFactory;

    protected $primaryKey = 'roomtypes_id';

    public function rooms(){
        return $this->hasMany('Room'::class, 'rooms_id');
    }
}
