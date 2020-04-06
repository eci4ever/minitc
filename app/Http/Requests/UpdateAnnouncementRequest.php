<?php

namespace App\Http\Requests;

use App\Announcement;
use Illuminate\Foundation\Http\FormRequest;

class UpdateAnnouncementRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('announcement_edit');
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
