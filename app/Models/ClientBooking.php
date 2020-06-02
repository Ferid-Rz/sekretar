<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientBooking extends Model
{
    protected $table = 'client_bookings';
    protected $guarded = [];
    public $timestamps = false;
}
