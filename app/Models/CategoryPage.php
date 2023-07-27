<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryPage extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'page_id'
    ];

    public function category () {
        return $this->hasOne(Category::class);
    }

}
