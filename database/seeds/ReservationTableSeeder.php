<?php

use Illuminate\Database\Seeder;

class ReservationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $reservation = new \App\Reservation([
            'id_collaborater' => 0,
            'id_customer' => 0,
            'date_start' => date('2019-04-04 12:00:00'),
            'address_start' => '34 avenue Du general de Gaule, Paris',
            'address_arrival' => '50 avenue des champs elysees, Paris',
            'state_request' => 0
        ]);
        $reservation->save();
    }
}
