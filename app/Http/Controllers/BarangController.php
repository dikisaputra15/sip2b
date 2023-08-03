<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use Illuminate\Support\Facades\DB;

class BarangController extends Controller
{
    public function index()
    {
        $barangs = Barang::all();
        return view('admin.barang', compact('barangs'));
    }

    public function addbarang()
    {
        return view('admin.addbarang');
    }

    public function storebarang(Request $request)
    {

        Barang::create([
            'nama_barang' => $request->nama_barang,
            'satuan' => $request->satuan,
            'harga_satuan' => $request->harga_satuan
        ]);

        return redirect('admin/barang');
    }

    public function destroybrg($id)
    {
        DB::table('barangs')->where('id', $id)->delete();
        return redirect("admin/barang");
    }

    public function editbrg($id)
    {
        $brg = Barang::find($id);
        return view('admin.editbrg', compact(['brg']));
    }

    public function updatebarang(Request $request)
    {
        $id = $request->id_barang;

        DB::table('barangs')->where('id',$id)->update([
            'nama_barang' => $request->nama_barang,
			'satuan' => $request->satuan,
            'harga_satuan' => $request->harga_satuan
		]);

        return redirect("admin/barang");
    }

}
