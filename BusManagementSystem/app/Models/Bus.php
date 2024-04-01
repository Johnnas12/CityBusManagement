<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    protected $fillable = [
   'plate',
   'model',
   'manufacturer',
   'yearofmanufacture',
    'seatcapacity',
   'fuel',
   'vin',
   'transmission',
   'status',
];
    use HasFactory;
}
