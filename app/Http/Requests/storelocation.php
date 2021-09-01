<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class storelocation extends FormRequest
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


    public function rules()
    {
        return [
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',

        ];
    }

}
