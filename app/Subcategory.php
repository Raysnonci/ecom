<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    protected $fillable = ['category_id', 'name'];

    /* Pake Eloquent
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    */
}
