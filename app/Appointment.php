<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $table = 'request';
    public $timestamps = false;
    public $guarded = [];
}
