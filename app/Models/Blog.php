<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $guarded = ['id','created_at','updated_at'];

    protected $with=['category'];

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id','id');
    }

    // public function categories()
    // {
    //     return $this->belongsToMany(Category::class,'blogs_categories','blog_id','category_id');
    // }

}
