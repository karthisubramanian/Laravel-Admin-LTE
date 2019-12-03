@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.holidayMaster.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.holiday-masters.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.holidayMaster.fields.id') }}
                        </th>
                        <td>
                            {{ $holidayMaster->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.holidayMaster.fields.reason') }}
                        </th>
                        <td>
                            {{ $holidayMaster->reason }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.holidayMaster.fields.holiday_date') }}
                        </th>
                        <td>
                            {{ $holidayMaster->holiday_date }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.holiday-masters.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>


    </div>
</div>
@endsection