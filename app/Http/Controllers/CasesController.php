<?php

namespace Covid\Http\Controllers;

use Illuminate\Http\Request;

use Covid\Models\CasesModel;

class CasesController extends Controller
{
    public function getCountry($country) {
        $cm = new CasesModel;

        echo json_encode($cm->getCountry($country));
    }
}
