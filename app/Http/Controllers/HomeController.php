<?php

namespace App\Http\Controllers;
use App\Jobs\ContactFormJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Setting;
use App\Page;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Setting $setting, Page $page)
    {
        $this->setting = $setting;
        $this->page = $page;

        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $setting = $this->setting->getSetting();

        $page = $this->page->getPageByUrl('index');

        $pages = $this->page->getPages();

        return view('home', compact('setting', 'page', 'pages'));
    }

    public function contact()
    {
        $setting = $this->setting->getSetting();

        $page = $this->page->getPageByUrl('contact');

        $pages = $this->page->getPages();
        
        return view('contact', compact('setting', 'page', 'pages'));
    }

    public function sendContactForm(Request $request)
    {
        $this->validate($request, [
            'email'                 => 'required|email|max:255',
            'name'                  => 'required|string|max:255',
            'description'           => 'required'
        ]);

        DB::transaction(function () use ($request)    {
            
            $messages = [
                'email' => $request->email,
                'name' => $request->name,
                'description' => $request->description
            ];

            ContactFormJob::dispatch($messages)->delay(now()->addSeconds(1));
            
        }, 5);

        $request->session()->flash('success', 'Message Sent Successfully!');
        
        return back();
    }
}
