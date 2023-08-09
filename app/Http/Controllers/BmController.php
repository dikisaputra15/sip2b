<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barangmasuk;

class BmController extends Controller
{
    public function index()
    {
        $bms = Barangmasuk::all();
        return view('admin.barangmasuk', compact('bms'));
    }
}
