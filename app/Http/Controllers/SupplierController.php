<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use Illuminate\Support\Facades\DB;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::all();
        return view('admin.supplier', compact('suppliers'));
    }

    public function addsupplier()
    {
        return view('admin.addsupplier');
    }

    public function storesupplier(Request $request)
    {

        Supplier::create([
            'nama_supplier' => $request->nama_supplier,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat
        ]);

        return redirect('admin/supplier');
    }

    public function destroysup($id)
    {
        DB::table('suppliers')->where('id', $id)->delete();
        return redirect("admin/supplier");
    }

    public function editsupplier($id)
    {
        $sup = Supplier::find($id);
        return view('admin.editsup', compact(['sup']));
    }

    public function updatesupplier(Request $request)
    {
        $id = $request->id_supplier;

        DB::table('suppliers')->where('id',$id)->update([
            'nama_supplier' => $request->nama_supplier,
			'no_hp' => $request->no_hp,
            'alamat' => $request->alamat
		]);

        return redirect("admin/supplier");
    }
}
