<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Models\ReturnLog;

class BorrowTransaction extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'request_id',
        'date_borrowed',
        'status',
    ];

    protected $casts = [
        'date_borrowed' => 'date',
    ];

    public function borrowRequest()
    {
        return $this->belongsTo(BorrowRequest::class, 'request_id');
    }

    // Borrow book
    public function markBorrowed()
    {
        $this->status = 'borrowed';
        $this->date_borrowed = Carbon::now();
        $this->save();
    }

    // Return book
    public function markReturned()
    {
        $this->status = 'returned';
        $this->save();

        // Insert into return_logs
        ReturnLog::create([
            'transaction_id' => $this->id,
            'return_date' => Carbon::now(),
        ]);
    }

    public function markOverdue()
    {
        $this->status = 'overdue';
        $this->save();
    }

    public function cancel()
    {
        $this->status = 'cancelled';
        $this->save();
    }
}
