<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BorrowRequest;

class BorrowRequestSeeder extends Seeder
{
    public function run(): void
    {
        BorrowRequest::insert([
            ['user_id'=>2,'book_id'=>5,'request_date'=>'2026-01-01','borrow_date'=>'2026-01-01','return_date'=>'2026-01-28','status'=>'pending'],
            ['user_id'=>3,'book_id'=>1,'request_date'=>'2026-01-02','borrow_date'=>'2026-01-02','return_date'=>'2026-01-23','status'=>'approved'],
            ['user_id'=>4,'book_id'=>7,'request_date'=>'2026-01-03','borrow_date'=>'2026-01-03','return_date'=>'2026-01-24','status'=>'pending'],
            ['user_id'=>5,'book_id'=>3,'request_date'=>'2026-01-04','borrow_date'=>'2026-01-04','return_date'=>'2026-01-25','status'=>'declined'],
            ['user_id'=>6,'book_id'=>9,'request_date'=>'2026-01-05','borrow_date'=>'2026-01-05','return_date'=>'2026-02-01','status'=>'cancelled'],
            // Add more rows as needed, all return_date <= borrow_date + 4 weeks
        ]);
    }
}
