<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HolidayMaster extends Model
{
    use SoftDeletes;

    public $table = 'holiday_masters';

    protected $dates = [
        'updated_at',
        'created_at',
        'deleted_at',
        'holiday_date',
    ];

    protected $fillable = [
        'reason',
        'created_at',
        'updated_at',
        'deleted_at',
        'holiday_date',
    ];

    public function getHolidayDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setHolidayDateAttribute($value)
    {
        $this->attributes['holiday_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }
}
