<?php

namespace App\Http\Requests;

use App\Minute;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class MassDestroyMinuteRequest extends FormRequest
{
    public function authorize()
    {
        return abort_if(Gate::denies('minute_delete'), 403, '403 Forbidden') ?? true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:minutes,id',
        ];
    }
}
