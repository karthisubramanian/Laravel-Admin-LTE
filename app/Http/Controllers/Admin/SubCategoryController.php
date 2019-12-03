<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroySubCategoryRequest;
use App\Http\Requests\StoreSubCategoryRequest;
use App\Http\Requests\UpdateSubCategoryRequest;
use App\SubCategory;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class SubCategoryController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = SubCategory::with(['main_category'])->select(sprintf('%s.*', (new SubCategory)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'sub_category_show';
                $editGate      = 'sub_category_edit';
                $deleteGate    = 'sub_category_delete';
                $crudRoutePart = 'sub-categories';

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
            $table->addColumn('main_category_category_name', function ($row) {
                return $row->main_category ? $row->main_category->category_name : '';
            });

            $table->editColumn('sub_category', function ($row) {
                return $row->sub_category ? $row->sub_category : "";
            });

            $table->rawColumns(['actions', 'placeholder', 'main_category']);

            return $table->make(true);
        }

        return view('admin.subCategories.index');
    }

    public function create()
    {
        abort_if(Gate::denies('sub_category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $main_categories = Category::all()->pluck('category_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.subCategories.create', compact('main_categories'));
    }

    public function store(StoreSubCategoryRequest $request)
    {
        $subCategory = SubCategory::create($request->all());

        return redirect()->route('admin.sub-categories.index');
    }

    public function edit(SubCategory $subCategory)
    {
        abort_if(Gate::denies('sub_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $main_categories = Category::all()->pluck('category_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $subCategory->load('main_category');

        return view('admin.subCategories.edit', compact('main_categories', 'subCategory'));
    }

    public function update(UpdateSubCategoryRequest $request, SubCategory $subCategory)
    {
        $subCategory->update($request->all());

        return redirect()->route('admin.sub-categories.index');
    }

    public function show(SubCategory $subCategory)
    {
        abort_if(Gate::denies('sub_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $subCategory->load('main_category');

        return view('admin.subCategories.show', compact('subCategory'));
    }

    public function destroy(SubCategory $subCategory)
    {
        abort_if(Gate::denies('sub_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $subCategory->delete();

        return back();
    }

    public function massDestroy(MassDestroySubCategoryRequest $request)
    {
        SubCategory::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
