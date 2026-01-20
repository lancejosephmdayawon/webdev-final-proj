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

    public function showUpdateBook($id)
    {
        $book = Book::findOrFail($id);
        $categories = Category::all(); // for select dropdown
        return view('admin.update-form', compact('book', 'categories'));
    }

    public function updateBook(Request $request, $id)
    {
        $book = Book::findOrFail($id);

        // Only allow fillable fields
        $data = $request->only(['isbn', 'title', 'author', 'category_id', 'stock_qty', 'description']);

        // Cast numeric fields manually to match DB
        if (isset($data['stock_qty'])) {
            $data['stock_qty'] = (int) $data['stock_qty'];
        }

        // Compare original values
        $original = $book->only(array_keys($data));

        $book->fill($data);

        if ($original == $book->only(array_keys($original))) {
            return response()->json(['message' => 'Nothing to be saved']);
        }

        $book->save();

        return response()->json(['message' => 'Book updated successfully']);
    }

    public function deleteBook($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return redirect()->route('admin.inventory')->with('success', 'Book deleted successfully.');
    }
}
