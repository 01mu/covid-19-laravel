<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\KeyValueModel;

class InfoController extends Controller
{
    public function getInfo() {
        $kvm = new KeyValueModel;

        echo json_encode($kvm->getAllValues());
    }
}
