<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index() {
        return view('theme.index');
    }

    public function cart() {

        $template = 'page';
        $title = 'Cart';
        return view('theme.pages.cart', compact('title', 'template'));
    }

    public function checkout() {

        $template = 'page';
        $title = 'Checkout';
        return view('theme.pages.checkout', compact('title', 'template'));
    }

}