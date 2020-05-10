<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email_address'                 => 'nullable|email|max:255',
            'facebook_advertising_pixel'    => 'nullable',
            'google_analytics'              => 'nullable',
            'facebook_url'                  => 'nullable',
            'twitter_url'                   => 'nullable',
        ];
    }
}
