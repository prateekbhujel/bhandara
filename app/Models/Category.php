<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /** 
     * Reverse function : Categories has many subcategories. 
    **/
    public function subCategories(): HasMany
    {
        return $this->hasMany(SubCategory::class);
    }//End Method

    /** 
     * Reverse function : childCategories has many subcategories. 
    **/
    public function childCategories(): HasMany
    {
        return $this->hasMany(ChildCategory::class);
    }//End Method
}
