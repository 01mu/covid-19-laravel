<?php

namespace Covid\Http\Controllers;

use Illuminate\Http\Request;

use Covid\Models\USCasesModel;

class USCasesController extends Controller
{
    public function getState($state, $nth) {
        $cm = new USCasesModel;

        if(!$nth || !is_numeric($nth)) {
            $nth = 1;
        }

        echo json_encode($cm->getState($state)->nth($nth));
    }

    public function getStates() {
        $cm = new USCasesModel;

        echo json_encode($cm->getStates());
    }
}
