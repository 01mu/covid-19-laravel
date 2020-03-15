<?php

namespace Covid\Models;

use Illuminate\Database\Eloquent\Model;

class DailyModel extends Model
{
    protected $table = 'daily';

    public function getDaily($type) {
        return DailyModel::select('timestamp', 'value')
            ->where('type', '=', $type)
            ->orderBy('timestamp', 'ASC')
            ->get();
    }
}
