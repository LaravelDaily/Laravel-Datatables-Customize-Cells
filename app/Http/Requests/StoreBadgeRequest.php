<?php

namespace App\Http\Requests;

use App\Badge;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreBadgeRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('badge_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'name' => [
                'required',
            ],
            'icon' => [
                'required',
            ],
        ];
    }
}
