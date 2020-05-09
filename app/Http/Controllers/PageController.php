<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Page;
use File;

class PageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        Page $page
        )
    {
        $this->middleware('auth:admins');
        $this->page                 = $page;
    }

    public function updatePage(Request $request, $id)
    {
        $this->validate($request, [
            'page_name'                 => 'required|string|max:255',
            'page_meta_description'     => 'nullable',
            'page_meta_title'           => 'nullable',
            'page_details'              => 'nullable',
            'page_summary'              => 'nullable',
            'page_header'               => 'nullable',
            'page_image_url'            => 'nullable|mimes:jpeg,jpg,png|max:2048'
        ]);

        $pageName = $request->page_name;
        $pageMetaDescription = $request->page_meta_description;
        $pageMetaTitle = $request->page_meta_title;
        $pageDetails = $request->page_details;
        $pageSummary = $request->page_summary;
        $pageHeader = $request->page_header;
        $pageImage = "";

        $file = $request->file('page_image_url');
        if($request->hasFile('page_image_url'))
        {
            $ext = $file->getClientOriginalExtension();

            $time = time();
            $imageName = $time. '.' . $ext;

            $pageImage = $file->storeAs('img', $imageName);

            $request->page_image_url->move(public_path('img/'), $imageName);

            $imageUrl = Page::where('id', $id)->first()->page_image_url;

            if(!empty($imageUrl)){
                $path = public_path().'/' . $imageUrl;

                File::delete($path);
            }
        }
        
        
        $updatedValue = Page::where('id', $id)
                                ->update([
                                    'page_name' => $pageName,
                                    'page_meta_description' => $pageMetaDescription,
                                    'page_meta_title' => $pageMetaTitle,
                                    'page_details' => $pageDetails,
                                    'page_summary' => $pageSummary,
                                    'page_header' => $pageHeader,
                                    'page_image_url' => $pageImage
                                ]);
        
        if($updatedValue)
        {
            $request->session()->flash('success', 'Page Updated Successfully!');
        }
        else
        {
            $request->session()->flash('danger', 'Page Not Updated!');
        }
        
        return back();
    }

    public function updateIndexStatus(Request $request, $id)
    {
        $status = $request->indexStatus;

        $updatedValue = Page::where('id', $id)
                                ->update(['isIndexed' => $status]);

        if($updatedValue)
        {
            $request->session()->flash('success', 'Page Index Status Updated!');
        
            return back();
        }
        else
        {
            $request->session()->flash('success', 'Page Index Status Not Updated!');
        
            return back();
        }
    }
}
