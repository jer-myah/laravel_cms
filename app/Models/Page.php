<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'meta_title',
        'meta_description',
        'meta_keywords',
    ];

    public function category () {
        return $this->hasOneThrough(Category::class, CategoryPage::class, 'page_id', 'id');
    }
}
