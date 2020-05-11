<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {



    }

    public function myHome()
    {

        return view('pages.home');

    }
    public function myChart()
    {

        return view('pages.charts');

    }
    public function product()
    {
        return view('pages.product');

    }
    public function category()
    {
        return view('pages.category');
    }
}
