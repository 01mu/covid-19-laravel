<?php

namespace Covid\Http\Controllers;

use Illuminate\Http\Request;

use Covid\Models\USCasesModel;
use Covid\Models\NewsModel;

class USCasesController extends Controller
{
    public function getState($state, $nth) {
        $cm = new USCasesModel;
        $nm = new NewsModel;

        if(!$nth || !is_numeric($nth)) {
            $nth = 1;
        }

        $news = $nm->getNews($state);

        $v = [];

        $v['news'] = $news;
        $v['cases'] = $cm->getState($state)->nth($nth);

        echo json_encode($v);
    }

    public function getStates() {
        $cm = new USCasesModel;

        echo json_encode($cm->getStates());
    }
}
