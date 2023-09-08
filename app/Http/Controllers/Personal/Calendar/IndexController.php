<?php

namespace App\Http\Controllers\Personal\Calendar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        return view('personal.calendar.main');
    }
}
