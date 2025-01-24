<?php

namespace App\Http\Controllers;

class CoreController extends Controller
{
    public function index_view()
    {
        return view('core.index');
    }
}
