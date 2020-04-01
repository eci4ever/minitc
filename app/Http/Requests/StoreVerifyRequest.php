<?php

namespace App\Http\Requests;

use App\Minute;
use Illuminate\Foundation\Http\FormRequest;

class StoreVerifyRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('verify_create');
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
