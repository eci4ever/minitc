<?php

namespace App\Http\Requests;

use App\Minute;
use Illuminate\Foundation\Http\FormRequest;

class UpdateVerifyRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('verify_edit');
    }

    public function rules()
    {
        return [
            'pengesah' => [
                'required',
            ],
        ];
    }
}
