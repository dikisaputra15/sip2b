<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barangmasuk;
use App\Models\Detailbarangmasuk;
use App\Models\Barang;

class BmController extends Controller
{
    public function index()
    {
        $bms = Barangmasuk::all();
        return view('admin.barangmasuk', compact('bms'));
    }

    public function addbarangmasuk()
    {
        $barangs = Barang::all();
        return view('admin.addbarangmasuk', compact('barangs'));
    }

    public function storebarangmasuk(Request $request)
    {

        $bm = Barangmasuk::create([
                    'tgl_barang_masuk' => $request->tgl_barang_masuk,
                    'nama_penerima' => $request->nama_penerima
                ]);

        if($bm){
            $barang = $request->barang;
            $last_id = Barangmasuk::latest()->first();
            $id_barang_masuk = $last_id->id;
            $jml_barang_masuk = $request->diminta;

            for($i=0; $i<count($barang); $i++){
                Detailbarangmasuk::create([
                    'id_barang_masuk' => $id_barang_masuk,
                    'id_barang' => $barang[$i],
                    'jml_barang_masuk' => $jml_barang_masuk[$i]
                ]);
            }
        }

        return redirect('admin/barangmasuk');
    }
}
