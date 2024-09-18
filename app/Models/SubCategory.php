<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SubCategory extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /** 
     * Sub-Categories belongs to Category. 
     * BelongsTo relationship between SubCategory and Category Model.
    **/
    public function category(): BelongsTo
    {
       return $this->belongsTo(Category::class);
    }
    
}
