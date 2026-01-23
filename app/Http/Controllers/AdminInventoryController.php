<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminInventoryController extends Controller
{
    public function showInventory()
    {
        $books = Book::with('category')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.inventory', compact('books'));
    }


    public function showAddBook()
    {
        $categories = Category::all();
        return view('admin.add-form', compact('categories'));
    }

    public function storeBook(Request $request)
    {
        $request->validate([
            'isbn' => 'required|unique:books,isbn|min:14|max:20',
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'stock_qty' => 'required|integer|min:0',
            'description' => 'nullable|string',
        ]);

        Book::create([
            'isbn' => $request->isbn,
            'title' => $request->title,
            'author' => $request->author,
            'category_id' => $request->category_id,
            'stock_qty' => $request->stock_qty,
            'description' => $request->description,
        ]);

        return response()->json(['message' => 'Book added successfully']);
    }

    public function showUpdateBook($id)
    {
        $books = Book::findOrFail($id);
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

        return response()->json([
            'success' => true,
            'message' => 'Book deleted successfully'
        ]);
    }
}
