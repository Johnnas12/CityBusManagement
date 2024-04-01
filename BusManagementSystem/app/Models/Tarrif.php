<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarrif extends Model
{
    protected $fillable = [
        'busnum',
        'from',
        'to',
        'via',
        'distance',
        'price',
    ];
    use HasFactory;
}
