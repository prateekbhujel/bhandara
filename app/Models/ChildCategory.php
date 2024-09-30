<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ChildCategory extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /** 
     * BelongsTo relationship between ChildCategory and Category Model.
     **/
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }//End Method

     /** 
     * Child Categories belongs to Sub Category. 
     * BelongsTo relationship between ChildCategory and SubCategory Model.
    **/
    public function SubCategory(): BelongsTo
    {
       return $this->belongsTo(SubCategory::class);
    }//End Method
}
