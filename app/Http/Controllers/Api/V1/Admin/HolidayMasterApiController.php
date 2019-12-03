<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\HolidayMaster;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreHolidayMasterRequest;
use App\Http\Requests\UpdateHolidayMasterRequest;
use App\Http\Resources\Admin\HolidayMasterResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HolidayMasterApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('holiday_master_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new HolidayMasterResource(HolidayMaster::all());
    }

    public function store(StoreHolidayMasterRequest $request)
    {
        $holidayMaster = HolidayMaster::create($request->all());

        return (new HolidayMasterResource($holidayMaster))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(HolidayMaster $holidayMaster)
    {
        abort_if(Gate::denies('holiday_master_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new HolidayMasterResource($holidayMaster);
    }

    public function update(UpdateHolidayMasterRequest $request, HolidayMaster $holidayMaster)
    {
        $holidayMaster->update($request->all());

        return (new HolidayMasterResource($holidayMaster))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(HolidayMaster $holidayMaster)
    {
        abort_if(Gate::denies('holiday_master_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $holidayMaster->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
