<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BsObjectRequest extends FormRequest
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
            'name' => 'required|unique:bs_objects|regex:/^[a-z,A-Z,0-9,_-]+$/',
            'name_rus' => 'required',
            'address' => 'required'
        ];
    }
    public function attributes()
    {
        return ['name'      => 'Название англ.',
                'name_rus'  => 'Название русск.' 
                ];
    }
}
