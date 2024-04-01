<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = ['routeID', 'passengerID', 'ticketID', 'status', 'starttime', 'departuretime', 'from', 'to'];
    use HasFactory;
    // public function route()
    // {
    //     return $this->hasOne(Route::class);
    // }
}
