<?php

namespace App\Http\Requests;

use App\MediaLibrary;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyMediaLibraryRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('media_library_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:media_libraries,id',
        ];
    }
}
