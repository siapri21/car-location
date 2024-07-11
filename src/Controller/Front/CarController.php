<?php

namespace App\Controller\Front;

use App\Controller\Front\AbstractController;

class CarController extends AbstractController
{
    public function showReservationDetails($param)
    {
        $this->render('reservation', ['id' => $param['id']]);
    }


}
