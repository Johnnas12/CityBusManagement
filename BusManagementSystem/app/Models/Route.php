<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Route extends Model
{

    protected $fillable = [
        'busnum', 
        'from',
        'to',
        'via',
        'driver',
        'starttime',
        'departuretime',
        'price', 
        'distance',
        'availableseats', 
        'reserved', 
        'unreserved',
    ];
    use HasFactory;

    // public function ticket()
    // {
    //     return $this->belongsTo(Ticket::class);
    // }
}
