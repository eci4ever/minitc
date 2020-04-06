<?php

namespace App\Http\Requests;

use App\Announcement;
use Illuminate\Foundation\Http\FormRequest;

class StoreAnnouncementRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('announcement_create');
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
