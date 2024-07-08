<?php

namespace App\Controller;

class CarController
{
    public function showReservationDetails($param)
    {
        $id = $param['id'];
        require_once '../templates/reservation.php';
    }


}
