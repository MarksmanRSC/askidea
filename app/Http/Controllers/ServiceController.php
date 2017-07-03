<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    /**
     * Show services page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('service.index');
    }
}
