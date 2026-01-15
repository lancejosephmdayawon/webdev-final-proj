<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminInventoryController extends Controller
{
    public function showInventory()
    {
        return view('iskolib.admin.inventory');
    }

    public function showAddBook()
    {
        return view('iskolib.admin.add-form');
    }

    public function showUpdateBook()
    {
        return view('iskolib.admin.update-form');
    }
}
