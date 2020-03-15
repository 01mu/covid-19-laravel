<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CasesModel extends Model
{
    protected $table = 'cases';

    public function getCountry($country) {
        return CasesModel::select('timestamp', 'confirmed', 'deaths',
            'recovered', 'new_confirmed', 'new_deaths', 'new_recovered',
            'cfr')
            ->where('country', '=', $country)
            ->orderBy('timestamp', 'ASC')
            ->get();
    }
}
