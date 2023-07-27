<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'image',
        'content',
        'meta_title',
        'meta_description',
        'meta_keywords',
    ];

    public function categories () {
        return $this->belongsToMany(Category::class, 'category_pages');
    }
}
