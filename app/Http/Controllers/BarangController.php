<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use Illuminate\Support\Facades\DB;

use PDF;

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
            'harga_satuan' => $request->harga_satuan,
            'stok' => 0
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
            'harga_satuan' => $request->harga_satuan,
            'stok' => 0
		]);

        return redirect("admin/barang");
    }

    public function stokbarang()
    {
        $barangs = Barang::all();
        return view('admin.stokbarang', compact('barangs'));
    }

    public function lapstok()
    {
        $barangs = Barang::all();
        return view('admin.lapstok', compact('barangs'));
    }

    public function pdfstok()
    {
        $barangs = Barang::all();

        $pdf = PDF::loadView('stokpdf', compact('barangs'));
        $pdf->setPaper('A4', 'potrait');
        return $pdf->stream('lapstok.pdf');
    }

    public function lapbarangmasuk()
    {
        return view('admin.lapbarangmasuk');
    }

    public function lapbarangkeluar()
    {
        return view('admin.lapbarangkeluar');
    }

    public function pdfmasuk(Request $request)
    {
        
        $tgl1 = $request->tgl1;
        $tgl2 = $request->tgl2;

        $data = DB::table('detailbarangmasuks')
        ->join('barangmasuks', 'detailbarangmasuks.id_barang_masuk', '=', 'barangmasuks.id')
        ->join('barangs', 'detailbarangmasuks.id_barang', '=', 'barangs.id')
        ->select('detailbarangmasuks.*', 'barangmasuks.*', 'barangs.*')
        ->whereBetween('barangmasuks.tgl_barang_masuk', [$tgl1, $tgl2])
        ->get();

        $pdf = PDF::loadView('pdfmasuk', compact('data'));
        $pdf->setPaper('A4', 'potrait');
        return $pdf->stream('pdfmasuk.pdf');

    }

    public function pdfkeluar(Request $request)
    {
        
        $tgl1 = $request->tgl1;
        $tgl2 = $request->tgl2;

        $data = DB::table('detailbarangkeluars')
        ->join('barangkeluars', 'detailbarangkeluars.id_barang', '=', 'barangkeluars.id')
        ->join('barangs', 'detailbarangkeluars.id', '=', 'barangs.id')
        ->select('detailbarangkeluars.*', 'barangkeluars.*', 'barangs.*')
        ->whereBetween('barangkeluars.tgl_barang_keluar', [$tgl1, $tgl2])
        ->get();

        $pdf = PDF::loadView('pdfkeluar', compact('data'));
        $pdf->setPaper('A4', 'potrait');
        return $pdf->stream('pdfkeluar.pdf');

    }

}
