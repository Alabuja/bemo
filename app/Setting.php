<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'email_address', 'facebook_advertising_pixel', 'google_analytics', 'facebook_url', 'twitter_url', 'logo_image_url'
    ];

    public function getSetting()
    {
        return self::first();
    }
}
