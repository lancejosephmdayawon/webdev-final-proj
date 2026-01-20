<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminInventoryController extends Controller
{
    public function showInventory()
    {
        $categories = Category::with('books')->get();
        return view('admin.inventory', compact('categories'));
    }

    public function showAddBook()
    {
        return view('admin.add-form');
    }

    public function showUpdateBook()
    {
        return view('admin.update-form');
    }
    
    public function deleteBook($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return redirect()->route('admin.inventory')->with('success', 'Book deleted successfully.');
    }
}
