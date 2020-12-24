<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class TestController extends Controller
{
    public function map() {
        return view('pages.map');
    }

    public function map2() {
        return view('pages.test.map2');
    }

    public function map3() {
        return view('pages.test.map3');
    }

    public function map4() {
        return view('pages.test.map4');
    }

    public function map5() {
        return view('pages.test.map5');
    }

    public function map6() {
        return view('pages.test.map6');
    }
}
