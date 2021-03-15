<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    public $timestamps = false;
    protected $fillable = ['address'];
}
