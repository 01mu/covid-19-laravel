<?php

namespace Covid\Models;

use Illuminate\Database\Eloquent\Model;

class NewsModel extends Model
{
    protected $table = 'news';

    public function getNews($country) {
        return NewsModel::select('*')
            ->where('place', '=', $country)
            ->orderBy('published', 'DESC')
            ->limit(20)
            ->get();
    }
}
