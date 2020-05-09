<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;
use App\Setting;
use App\User;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        User $user, 
        Setting $setting, 
        Page $page
        )
    {
        $this->middleware('auth:admins');

        $this->user                 = $user;
        $this->setting              = $setting;
        $this->page                 = $page;
    }

    public function dashboard()
    {
        $count = $this->page->pageCount();
        
        return view('admin.dashboard', compact('count'));
    }

    public function getPages()
    {
        $pages = $this->page->getPages();

        return view('admin.pages.show', compact('pages'));
    }

    public function getPage($id)
    {
        $page = $this->page->getPage($id);

        return view('admin.pages.single', compact('page'));
    }

    public function getSetting()
    {
        $setting = $this->setting->getSetting();

        return view('admin.settings.index', compact('setting'));
    }
}
