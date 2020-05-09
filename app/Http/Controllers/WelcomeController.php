<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use App\Page;


class WelcomeController extends Controller
{

    public function __construct(Setting $setting, Page $page)
    {
        $this->setting = $setting;
        $this->page = $page;
    }

    public function welcome()
    {
        $pages = $this->page->getPages();

        return view('welcome', compact('pages'));
    }
}
