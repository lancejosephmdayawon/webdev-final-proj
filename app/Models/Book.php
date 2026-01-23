<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'isbn',
        'title',
        'author',
        'category_id',
        'stock_qty',
        'description',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

        public function borrowRequests()
    {
        return $this->hasMany(BorrowRequest::class, 'book_id');
    }
}
