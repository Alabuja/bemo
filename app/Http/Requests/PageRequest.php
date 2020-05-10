<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PageRequest extends FormRequest
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
            'page_name'                 => 'required|string|max:255',
            'page_meta_description'     => 'nullable',
            'page_meta_title'           => 'nullable',
            'page_details'              => 'nullable',
            'page_summary'              => 'nullable',
            'page_header'               => 'nullable',
        ];
    }
}
