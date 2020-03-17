<?php

namespace Covid\Http\Controllers;

use Illuminate\Http\Request;

use Covid\Models\CasesModel;

class CasesController extends Controller
{
    public function getCountry($country, $nth) {
        $cm = new CasesModel;

        if(!$nth || !is_numeric($nth)) {
            $nth = 1;
        }

        echo json_encode($cm->getCountry($country)->nth($nth));
    }

    public function getCountries() {
        $cm = new CasesModel;

        echo json_encode($cm->getCountries());
    }
}
