<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutUsController extends Controller
{
    /**
     * Show about_us page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('about_us.index');
    }
}
