<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'author',
        'description',
        'price',
        'category_id',
        'book_file',
        'picture',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
