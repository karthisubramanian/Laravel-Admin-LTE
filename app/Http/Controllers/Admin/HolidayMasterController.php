<?php

namespace App\Http\Controllers\Admin;

use App\HolidayMaster;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyHolidayMasterRequest;
use App\Http\Requests\StoreHolidayMasterRequest;
use App\Http\Requests\UpdateHolidayMasterRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class HolidayMasterController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = HolidayMaster::query()->select(sprintf('%s.*', (new HolidayMaster)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'holiday_master_show';
                $editGate      = 'holiday_master_edit';
                $deleteGate    = 'holiday_master_delete';
                $crudRoutePart = 'holiday-masters';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : "";
            });
            $table->editColumn('reason', function ($row) {
                return $row->reason ? $row->reason : "";
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.holidayMasters.index');
    }

    public function create()
    {
        abort_if(Gate::denies('holiday_master_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.holidayMasters.create');
    }

    public function store(StoreHolidayMasterRequest $request)
    {
        $holidayMaster = HolidayMaster::create($request->all());

        return redirect()->route('admin.holiday-masters.index');
    }

    public function edit(HolidayMaster $holidayMaster)
    {
        abort_if(Gate::denies('holiday_master_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.holidayMasters.edit', compact('holidayMaster'));
    }

    public function update(UpdateHolidayMasterRequest $request, HolidayMaster $holidayMaster)
    {
        $holidayMaster->update($request->all());

        return redirect()->route('admin.holiday-masters.index');
    }

    public function show(HolidayMaster $holidayMaster)
    {
        abort_if(Gate::denies('holiday_master_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.holidayMasters.show', compact('holidayMaster'));
    }

    public function destroy(HolidayMaster $holidayMaster)
    {
        abort_if(Gate::denies('holiday_master_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $holidayMaster->delete();

        return back();
    }

    public function massDestroy(MassDestroyHolidayMasterRequest $request)
    {
        HolidayMaster::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
