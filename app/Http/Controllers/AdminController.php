<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {
        dd('Logged in as admin');
        return view('settings.index');
    }
}