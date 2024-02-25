<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Ambilbarang;
use App\Models\Pesanbarang;
use App\Models\Supplier;
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
        $mintas = DB::table('pesanbarangs')
                    ->join('suppliers', 'pesanbarangs.id_supplier', '=', 'suppliers.id')
                    ->select('suppliers.*', 'pesanbarangs.*')
                    ->get();
        return view('admin.lapbarangmasuk', compact('mintas'));
    }

    public function lapbarangkeluar()
    {
        $bms = Ambilbarang::all();
        return view('admin.lapbarangkeluar', compact('bms'));
    }

    public function pdfmasuk($id)
    {

        $minta = Pesanbarang::find($id);
        $id_supplier = $minta->id_supplier;
        $supplier = Supplier::find($id_supplier);
        $listdetail = DB::table('detailpesans')
        ->join('barangs', 'detailpesans.id_barang', '=', 'barangs.id')
        ->join('pesanbarangs', 'pesanbarangs.id', '=', 'detailpesans.id_pesan_barang')
        ->select('barangs.*', 'detailpesans.*', 'pesanbarangs.*')
        ->where('pesanbarangs.id', $id)
        ->get();

        $pdf = PDF::loadView('pdfmasuk', compact(['listdetail','minta','supplier']));
        $pdf->setPaper('A4', 'potrait');
        return $pdf->stream('pdfmasuk.pdf');

    }

    public function pdfkeluar($id)
    {

        $ambil = Ambilbarang::find($id);
        $bm = DB::table('detailambils')
        ->join('barangs', 'detailambils.id_barang', '=', 'barangs.id')
        ->join('ambilbarangs', 'ambilbarangs.id', '=', 'detailambils.id_ambil_barang')
        ->select('barangs.*', 'detailambils.*', 'ambilbarangs.*')
        ->where('ambilbarangs.id', $id)
        ->get();

        $pdf = PDF::loadView('pdfkeluar', compact('bm','ambil'));
        $pdf->setPaper('A4', 'potrait');
        return $pdf->stream('pdfkeluar.pdf');

    }

    public function cetaksj($id)
    {

        $minta = Pesanbarang::find($id);
        $id_supplier = $minta->id_supplier;
        $supplier = Supplier::find($id_supplier);
        $listdetail = DB::table('detailpesans')
        ->join('barangs', 'detailpesans.id_barang', '=', 'barangs.id')
        ->join('pesanbarangs', 'pesanbarangs.id', '=', 'detailpesans.id_pesan_barang')
        ->select('barangs.*', 'detailpesans.*', 'pesanbarangs.*')
        ->where('pesanbarangs.id', $id)
        ->get();

        $pdf = PDF::loadView('cetaksj', compact(['listdetail','minta','supplier']));
        $pdf->setPaper('A4', 'potrait');
        return $pdf->stream('cetaksj.pdf');

    }

}
