<?php

namespace Covid\Http\Controllers;

use Illuminate\Http\Request;

use Covid\Models\CasesModel;
use Covid\Models\NewsModel;

class CasesController extends Controller
{
    public function getCountry($country, $nth) {
        $cm = new CasesModel;
        $nm = new NewsModel;

        if(!$nth || !is_numeric($nth)) {
            $nth = 1;
        }

        $news = $nm->getNews($country);

        $v = [];

        $v['news'] = $news;
        $v['cases'] = $cm->getCountry($country)->nth($nth);

        echo json_encode($v);
    }

    public function getCountries() {
        $cm = new CasesModel;

        echo json_encode($cm->getCountries());
    }
}
