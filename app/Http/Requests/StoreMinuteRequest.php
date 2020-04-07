<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMinuteRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('minute_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'required',
            ],
        ];
    }
}
