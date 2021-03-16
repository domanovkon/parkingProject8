<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Parking extends Model
{
    public $timestamps = false;
    protected $fillable = ['houseId', 'typeId', 'placeNumber', 'pricePerDay'];
}
