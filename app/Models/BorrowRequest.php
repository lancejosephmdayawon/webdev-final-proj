<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class BorrowRequest extends Model
{
    public $timestamps = false; // no created_at/updated_at

    protected $fillable = [
        'user_id',
        'book_id',
        'request_date',
        'borrow_date',
        'return_date',
        'status',
    ];

    protected $casts = [
        'request_date' => 'date',
        'borrow_date' => 'date',
        'return_date' => 'date',
    ];

    protected static function booted()
    {
        static::creating(function ($borrow) {
            // auto-set return_date if not provided
            if (!$borrow->return_date) {
                $borrow->return_date = Carbon::parse($borrow->borrow_date)->addWeeks(4);
            }

            // enforce max 4 weeks
            $maxReturn = Carbon::parse($borrow->borrow_date)->addWeeks(4);
            if ($borrow->return_date > $maxReturn) {
                $borrow->return_date = $maxReturn;
            }
        });

        static::updating(function ($borrow) {
            $maxReturn = Carbon::parse($borrow->borrow_date)->addWeeks(4);
            if ($borrow->return_date > $maxReturn) {
                $borrow->return_date = $maxReturn;
            }
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function transaction()
    {
        return $this->hasOne(BorrowTransaction::class, 'request_id');
    }
}
