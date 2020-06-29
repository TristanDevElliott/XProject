<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Setting;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function appLayout()
    {
        $settings = Setting::all();
        return view('layouts.app', compact('settings'));
    }
}
