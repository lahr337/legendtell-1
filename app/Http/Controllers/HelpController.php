<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelpController extends Controller
{

    public function index()
    {
        $page_title = 'Help';
        $view = auth()->check() ? "help.after" : "help.index";
        return view($view, compact('page_title'));
    }
}
