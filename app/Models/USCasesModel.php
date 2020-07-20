<?php

namespace Covid\Models;

use Illuminate\Database\Eloquent\Model;

class USCasesModel extends Model
{
    protected $table = 'cases_us';

    public function getState($state) {
        return USCasesModel::select('timestamp', 'confirmed', 'deaths',
            'new_confirmed', 'new_deaths', 'recovered', 'new_recovered',
            'cfr', 'new_confirmed_per', 'new_deaths_per', 'new_recovered_per',
            'confirmed_per', 'deaths_per', 'recovered_per')
            ->where('state', '=', $state)
            ->orderBy('timestamp', 'ASC')
            ->get();
    }

    public function getStates() {
        $latest = USCasesModel::select('timestamp')
            ->orderBy('timestamp', 'DESC')
            ->limit(1)
            ->get()[0]['timestamp'];

        $v = USCasesModel::select('state', 'confirmed', 'deaths',
            'new_confirmed', 'new_deaths', 'recovered', 'new_recovered',
            'cfr', 'new_confirmed_per', 'new_deaths_per', 'new_recovered_per',
            'confirmed_per', 'deaths_per', 'recovered_per')
            ->orderBy('confirmed', 'DESC')
            ->where('timestamp', '=', $latest)
            ->get();

        return $v;
    }

    public function getTopForDaily() {
        $r = [];

        $latest = USCasesModel::select('timestamp')
            ->orderBy('timestamp', 'DESC')
            ->limit(1)
            ->get()[0]['timestamp'];

        $c = USCasesModel::select('state', 'new_confirmed', 'new_confirmed_per')
            ->orderBy('new_confirmed', 'DESC')
            ->where('timestamp', '=', $latest)
            ->limit(5)
            ->get();

        $d = USCasesModel::select('state', 'new_deaths', 'new_deaths_per')
            ->orderBy('new_deaths', 'DESC')
            ->where('timestamp', '=', $latest)
            ->limit(5)
            ->get();

        $r['confirmed'] = $c;
        $r['deaths'] = $d;
        $r['last_update'] = $latest;

        return $r;
    }
}
