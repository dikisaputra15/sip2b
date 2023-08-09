<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barangkeluar;

class BkController extends Controller
{
    public function index()
    {
        $bks = Barangkeluar::all();
        return view('admin.barangkeluar', compact('bks'));
    }
}
