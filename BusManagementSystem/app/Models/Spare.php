<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spare extends Model
{
    protected $fillable = ['category', 'component', 'quantity', ];
    use HasFactory;
}
