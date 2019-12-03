@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.holidayMaster.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.holiday-masters.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="reason">{{ trans('cruds.holidayMaster.fields.reason') }}</label>
                <input class="form-control {{ $errors->has('reason') ? 'is-invalid' : '' }}" type="text" name="reason" id="reason" value="{{ old('reason', '') }}" required>
                @if($errors->has('reason'))
                    <span class="text-danger">{{ $errors->first('reason') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.holidayMaster.fields.reason_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="holiday_date">{{ trans('cruds.holidayMaster.fields.holiday_date') }}</label>
                <input class="form-control date {{ $errors->has('holiday_date') ? 'is-invalid' : '' }}" type="text" name="holiday_date" id="holiday_date" value="{{ old('holiday_date') }}" required>
                @if($errors->has('holiday_date'))
                    <span class="text-danger">{{ $errors->first('holiday_date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.holidayMaster.fields.holiday_date_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>


    </div>
</div>
@endsection