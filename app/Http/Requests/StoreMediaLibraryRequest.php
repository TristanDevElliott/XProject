<?php

namespace App\Http\Requests;

use App\MediaLibrary;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreMediaLibraryRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('media_library_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'users.*' => [
                'integer',
            ],
            'users'   => [
                'array',
            ],
        ];
    }
}
