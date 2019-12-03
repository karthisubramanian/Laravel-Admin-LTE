<?php

namespace App\Http\Requests;

use App\HolidayMaster;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyHolidayMasterRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('holiday_master_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:holiday_masters,id',
        ];
    }
}
