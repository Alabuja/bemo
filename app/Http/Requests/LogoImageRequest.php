<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LogoImageRequest extends FormRequest
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
            'logo_image_url' => 'required|mimes:jpeg,jpg,png|max:2048'
        ];
    }
}
