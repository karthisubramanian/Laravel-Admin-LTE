<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    public $table = 'categories';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'updated_at',
        'created_at',
        'deleted_at',
        'category_name',
    ];

    public function subCategories()
    {
        return $this->hasMany(SubCategory::class, 'main_category_id', 'id');
    }
}
