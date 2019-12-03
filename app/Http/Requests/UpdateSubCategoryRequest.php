<?php

namespace App\Http\Requests;

use App\SubCategory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateSubCategoryRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('sub_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'main_category_id' => [
                'required',
                'integer',
            ],
            'sub_category'     => [
                'required',
            ],
        ];
    }
}
