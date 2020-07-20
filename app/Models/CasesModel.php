<?php

namespace Covid\Models;

use Illuminate\Database\Eloquent\Model;

class CasesModel extends Model
{
    protected $table = 'cases';

    public function getCountry($country) {
        return CasesModel::select('timestamp', 'confirmed', 'deaths',
            'new_confirmed', 'new_deaths', 'recovered', 'new_recovered',
            'cfr', 'new_confirmed_per', 'new_deaths_per', 'new_recovered_per',
            'confirmed_per', 'deaths_per', 'recovered_per')
            ->where('country', '=', $country)
            ->orderBy('timestamp', 'ASC')
            ->get();
    }

    public function getCountries() {
        $latest = CasesModel::select('timestamp')
            ->orderBy('timestamp', 'DESC')
            ->limit(1)
            ->get()[0]['timestamp'];

        $v = CasesModel::select('country', 'confirmed', 'deaths',
            'new_confirmed', 'new_deaths', 'recovered', 'new_recovered',
            'cfr', 'new_confirmed_per', 'new_deaths_per', 'new_recovered_per',
            'confirmed_per', 'deaths_per', 'recovered_per')
            ->orderBy('confirmed', 'DESC')
            ->where('timestamp', '=', $latest)
            ->get();

        return $v;
    }

    public function getUSandGlobal() {
        $r = [];

        $latest = CasesModel::select('timestamp')
            ->orderBy('timestamp', 'DESC')
            ->limit(1)
            ->get()[0]['timestamp'];

        $g = CasesModel::select('confirmed', 'deaths',
            'new_confirmed', 'new_deaths', 'new_confirmed_per',
            'new_deaths_per', 'confirmed_per', 'deaths_per')
            ->where('country', '=', 'Global')
            ->first();

        $u = CasesModel::select('confirmed', 'deaths',
            'new_confirmed', 'new_deaths', 'new_confirmed_per',
            'new_deaths_per', 'confirmed_per', 'deaths_per')
            ->where('country', '=', 'United States')
            ->where('timestamp', '=', $latest)
            ->first();

        $r['global'] = $g;
        $r['united_states'] = $u;

        return $r;
    }

    public function getTopForDaily() {
        $r = [];

        $latest = CasesModel::select('timestamp')
            ->orderBy('timestamp', 'DESC')
            ->limit(1)
            ->get()[0]['timestamp'];

        $c = CasesModel::select('country', 'new_confirmed', 'new_confirmed_per')
            ->orderBy('new_confirmed', 'DESC')
            ->where('timestamp', '=', $latest)
            ->where('country', '!=', 'Global')
            ->limit(5)
            ->get();

        $d = CasesModel::select('country', 'new_deaths', 'new_deaths_per')
            ->orderBy('new_deaths', 'DESC')
            ->where('timestamp', '=', $latest)
            ->where('country', '!=', 'Global')
            ->limit(5)
            ->get();

        $r['confirmed'] = $c;
        $r['deaths'] = $d;
        $r['last_update'] = $latest;

        return $r;
    }
}
