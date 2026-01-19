<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReturnLog extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'transaction_id',
        'date_returned',
    ];

    protected $casts = [
        'date_returned' => 'date', // updated cast
    ];

    // Relationship to the borrow transaction
    public function transaction()
    {
        return $this->belongsTo(BorrowTransaction::class, 'transaction_id');
    }
}
