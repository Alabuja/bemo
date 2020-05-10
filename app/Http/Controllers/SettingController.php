<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use File;
use App\Http\Requests\SettingRequest;
use App\Http\Requests\LogoImageRequest;

class SettingController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        Setting $setting
        )
    {
        $this->middleware('auth:admins');
        $this->setting                 = $setting;
    }

    public function updateSetting(SettingRequest $request)
    {
        $emailAddress = $request->email_address;
        $facebookAdvertisingPixel = $request->facebook_advertising_pixel;
        $googleAnalytics = $request->google_analytics;
        $facebookUrl = $request->facebook_url;
        $twitterUrl = $request->twitter_url;

        $updatedValue = Setting::first()
                                ->update([
                                    'email_address' => $emailAddress,
                                    'facebook_advertising_pixel' => $facebookAdvertisingPixel,
                                    'google_analytics' => $googleAnalytics,
                                    'facebook_url' => $facebookUrl,
                                    'twitter_url' => $twitterUrl
                                ]);
        
        if($updatedValue)
        {
            $request->session()->flash('success', 'Settings Updated Successfully!');
        }
        else
        {
            $request->session()->flash('danger', 'Settings Not Updated!');
        }
        
        return back();
    }

    public function updateLogoImage(LogoImageRequest $request)
    {
        if($request->hasFile('logo_image_url'))
        {
            $file = $request->file('logo_image_url');
            $ext = $file->getClientOriginalExtension();

            $time = time();
            $imageName = $time. '.' . $ext;

            $logoImageUrl = $file->storeAs('img/logo', $imageName);

            $request->logo_image_url->move(public_path('img/logo'), $imageName);

            $imageUrl = Setting::first()->logo_image_url;

            if(!empty($imageUrl)){
                $path = public_path().'/' . $imageUrl;
                
                File::delete($path);
            }

            $updatedValue = Setting::first()
                                ->update([
                                    'logo_image_url' => $logoImageUrl
                                ]);
        
            if($updatedValue)
            {
                $request->session()->flash('success', 'Logo Updated Successfully!');
            }
            else
            {
                $request->session()->flash('danger', 'Logo Not Updated!');
            }

            return back();
        }
        else
        {
            $request->session()->flash('danger', 'No Image!');
            return back();
        }
    }
}
