<?php

namespace App\Http\Requests;

use App\HolidayMaster;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateHolidayMasterRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('holiday_master_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'reason'       => [
                'required',
            ],
            'holiday_date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
        ];
    }
}
