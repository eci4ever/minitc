<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
{
    // public function authorize()
    // {
    //     //return \Gate::allows('user_edit');
    // }

    public function rules()
    {
        return [
            'name'    => [
                'required',
            ],
            'email'   => [
                'required',
            ],
            'nokp'   => [
                'required',
            ],
            'avatar'   => [
                'image:jpeg,png,jpg,gif,svg|max:1024',
            ],
        ];
    }
}
