<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
    public $timestamps = false;
    protected $fillable = ['userId', 'parkingId', 'placeNumber', 'startDate', 'endDate', 'sum'];
}
