<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class UserHomeController extends Controller
{
    public function showHome()
    {
        $books = Book::with('category')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('user.home', compact('books'));
    }

    public function showBookDetails($id)
    {
        $book = Book::findOrFail($id);
        $categories = Category::all();
        return view('user.book-details', compact('book', 'categories'));
    }

    public function showBorrowForm()
    {
        return view('user.borrow');
    }
}
