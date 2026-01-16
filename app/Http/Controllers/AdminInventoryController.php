<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminInventoryController extends Controller
{
    public function showInventory()
    {
        return view('admin.inventory');
    }

    public function showAddBook()
    {
        return view('admin.add-form');
    }

    public function showUpdateBook()
    {
        return view('admin.update-form');
    }
}
