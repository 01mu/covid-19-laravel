<?php

namespace Covid\Http\Controllers;

use Illuminate\Http\Request;

use Covid\Models\DailyModel;

class DailyController extends Controller
{
    public function getDaily($type, $nth) {
        $dm = new DailyModel;

        if(!$nth || !is_numeric($nth)) {
            $nth = 1;
        }

        echo json_encode($dm->getDaily($type)->nth($nth));
    }
}
