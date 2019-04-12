<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = ['id_collaborater', 'id_customer', 'date_start', 'address_start', 'address_arrival', 'state_request'];
}
