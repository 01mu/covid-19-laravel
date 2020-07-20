<?php

namespace Covid\Http\Controllers;

use Illuminate\Http\Request;

use Covid\Models\DailyModel;
use Covid\Models\CasesModel;
use Covid\Models\USCasesModel;

class DailyController extends Controller
{
    public function getDaily($type, $nth) {
        $dm = new DailyModel;

        if(!$nth || !is_numeric($nth)) {
            $nth = 1;
        }

        echo json_encode($dm->getDaily($type)->nth($nth));
    }

    public function getTodayPage(){
        $r = [];

        $cm = new CasesModel;
        $us = new USCasesModel;

        $r['individual'] = $cm->getUSandGlobal();
        $r['global'] = $cm->getTopForDaily();
        $r['united_states'] = $us->getTopForDaily();

        echo json_encode($r);
    }
}
