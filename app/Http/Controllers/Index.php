<?php

namespace App\Http\Controllers;

class Index extends Controller
{
    public static function home()
    {
        $page_title = 'Assassins Creed Forum - Home';

        return view('general.pages.home', compact(['page_title']));
    }
}
