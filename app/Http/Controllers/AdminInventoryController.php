<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminInventoryController extends Controller
{
    public function showInventory()
    {
        return view('iskolib.admin.inventory');
    }
}
