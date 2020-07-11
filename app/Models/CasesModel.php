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
            'cfr')
            ->orderBy('confirmed', 'DESC')
            ->where('timestamp', '=', $latest)
            ->get();

        return $v;
    }
}
