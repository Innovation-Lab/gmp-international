<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display the Home view.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('admin.home');
    }
}
