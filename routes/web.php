<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::post('users/parse-csv-import', 'UsersController@parseCsvImport')->name('users.parseCsvImport');
    Route::post('users/process-csv-import', 'UsersController@processCsvImport')->name('users.processCsvImport');
    Route::resource('users', 'UsersController');

    // Categories
    Route::delete('categories/destroy', 'CategoriesController@massDestroy')->name('categories.massDestroy');
    Route::post('categories/parse-csv-import', 'CategoriesController@parseCsvImport')->name('categories.parseCsvImport');
    Route::post('categories/process-csv-import', 'CategoriesController@processCsvImport')->name('categories.processCsvImport');
    Route::resource('categories', 'CategoriesController');

    // Sub Categories
    Route::delete('sub-categories/destroy', 'SubCategoryController@massDestroy')->name('sub-categories.massDestroy');
    Route::post('sub-categories/parse-csv-import', 'SubCategoryController@parseCsvImport')->name('sub-categories.parseCsvImport');
    Route::post('sub-categories/process-csv-import', 'SubCategoryController@processCsvImport')->name('sub-categories.processCsvImport');
    Route::resource('sub-categories', 'SubCategoryController');

    // Holiday Masters
    Route::delete('holiday-masters/destroy', 'HolidayMasterController@massDestroy')->name('holiday-masters.massDestroy');
    Route::post('holiday-masters/parse-csv-import', 'HolidayMasterController@parseCsvImport')->name('holiday-masters.parseCsvImport');
    Route::post('holiday-masters/process-csv-import', 'HolidayMasterController@processCsvImport')->name('holiday-masters.processCsvImport');
    Route::resource('holiday-masters', 'HolidayMasterController');

    // Task Statuses
    Route::delete('task-statuses/destroy', 'TaskStatusController@massDestroy')->name('task-statuses.massDestroy');
    Route::resource('task-statuses', 'TaskStatusController');

    // Task Tags
    Route::delete('task-tags/destroy', 'TaskTagController@massDestroy')->name('task-tags.massDestroy');
    Route::resource('task-tags', 'TaskTagController');

    // Tasks
    Route::delete('tasks/destroy', 'TaskController@massDestroy')->name('tasks.massDestroy');
    Route::post('tasks/media', 'TaskController@storeMedia')->name('tasks.storeMedia');
    Route::resource('tasks', 'TaskController');

    // Tasks Calendars
    Route::resource('tasks-calendars', 'TasksCalendarController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);
});
