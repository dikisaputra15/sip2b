<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barangkeluar;
use App\Models\Detailbarangkeluar;
use App\Models\Barang;
use Illuminate\Support\Facades\DB;

class BkController extends Controller
{
    public function index()
    {
        $bks = Barangkeluar::all();
        return view('admin.barangkeluar', compact('bks'));
    }

    public function addbarangkeluar()
    {
        $barangs = Barang::all();
        return view('admin.addbarangkeluar', compact('barangs'));
    }

    public function storebarangkeluar(Request $request)
    {

        $bk = Barangkeluar::create([
                    'tgl_barang_keluar' => $request->tgl_barang_keluar,
                    'nama_petugas' => $request->nama_petugas
                ]);

        if($bk){
            $barang = $request->barang;
            $last_id = Barangkeluar::latest()->first();
            $id_barang_keluar = $last_id->id;
            $jml_barang_keluar = $request->diminta;

            for($i=0; $i<count($barang); $i++){
                Detailbarangkeluar::create([
                    'id_barang_keluar' => $id_barang_keluar,
                    'id_barang' => $barang[$i],
                    'jml_barang_keluar' => $jml_barang_keluar[$i]
                ]);
            }
        }

        return redirect('admin/barangkeluar');
    }

    public function detailbk($id)
    {
        $bk = DB::table('detailbarangkeluars')
        ->join('barangkeluars', 'detailbarangkeluars.id_barang_keluar', '=', 'barangkeluars.id')
        ->join('barangs', 'detailbarangkeluars.id_barang', '=', 'barangs.id')
        ->select('detailbarangkeluars.*', 'barangkeluars.*', 'barangs.*')
        ->where('detailbarangkeluars.id_barang_keluar', $id)
        ->get();
        return view('admin.detailbk', compact('bk'));
    }
}
