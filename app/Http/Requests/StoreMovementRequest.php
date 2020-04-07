<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMovementRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('movement_create');
    }

    public function rules()
    {
        return [
            'title' => [
                'required',
            ],
        ];
    }
}
