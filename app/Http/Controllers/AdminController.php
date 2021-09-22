<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Setting;

class AdminController extends Controller
{
    public function index() {
        $setting = Setting::first();
		if ( $setting ) {
			return view('settings.edit', compact('setting'));
		}

		return view('settings.create');
    }
}