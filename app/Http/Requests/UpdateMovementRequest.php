<?php

namespace App\Http\Requests;

use App\Movement;
use Illuminate\Foundation\Http\FormRequest;

class UpdateMovementRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('movement_edit');
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
