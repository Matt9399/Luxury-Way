<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = ['id_collaborater', 'id_customer', 'isPaid', 'date_start', 'address_start', 'address_arrival', 'price', 'distance', 'duration', 'state_request'];
}
