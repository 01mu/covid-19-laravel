<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\DailyModel;

class DailyController extends Controller
{
    public function getDaily($type) {
        $dm = new DailyModel;

        echo json_encode($dm->getDaily($type));
    }
}
