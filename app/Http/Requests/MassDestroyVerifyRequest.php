<?php

namespace App\Http\Requests;

use App\Minute;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class MassDestroyVerifyRequest extends FormRequest
{
    public function authorize()
    {
        return abort_if(Gate::denies('verify_delete'), 403, '403 Forbidden') ?? true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:verifies,id',
        ];
    }
}
