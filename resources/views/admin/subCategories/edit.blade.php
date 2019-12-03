@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.subCategory.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.sub-categories.update", [$subCategory->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="main_category_id">{{ trans('cruds.subCategory.fields.main_category') }}</label>
                <select class="form-control select2 {{ $errors->has('main_category') ? 'is-invalid' : '' }}" name="main_category_id" id="main_category_id" required>
                    @foreach($main_categories as $id => $main_category)
                        <option value="{{ $id }}" {{ ($subCategory->main_category ? $subCategory->main_category->id : old('main_category_id')) == $id ? 'selected' : '' }}>{{ $main_category }}</option>
                    @endforeach
                </select>
                @if($errors->has('main_category_id'))
                    <span class="text-danger">{{ $errors->first('main_category_id') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.subCategory.fields.main_category_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="sub_category">{{ trans('cruds.subCategory.fields.sub_category') }}</label>
                <input class="form-control {{ $errors->has('sub_category') ? 'is-invalid' : '' }}" type="text" name="sub_category" id="sub_category" value="{{ old('sub_category', $subCategory->sub_category) }}" required>
                @if($errors->has('sub_category'))
                    <span class="text-danger">{{ $errors->first('sub_category') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.subCategory.fields.sub_category_helper') }}</span>
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