<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mintabarang;
use App\Models\Barang;
use App\Models\Barangdetail;
use App\Models\Pesanbarang;
use App\Models\Supplier;
use App\Models\Detailpesan;
use Illuminate\Support\Facades\DB;

class MintaController extends Controller
{
    public function index()
    {
        $mintas = DB::table('pesanbarangs')
                    ->join('suppliers', 'pesanbarangs.id_supplier', '=', 'suppliers.id')
                    ->select('suppliers.*', 'pesanbarangs.*')
                    ->get();
        return view('admin.mintabarang', compact('mintas'));
    }

    public function addpermintaan()
    {
        $barangs = Barang::all();
        $suppliers = Supplier::all();
        return view('admin.addpermintaan', compact('barangs','suppliers'));
    }

    public function storepermintaan(Request $request)
    {

        $minta = Pesanbarang::create([
                    'tgl_pesan' => $request->tanggal,
                    'id_supplier' => $request->id_supplier,
                    'nama_pemesan' => $request->nama_pemesan,
                    'email_pemesan' => $request->email_pemesan,
                    'alamat_pemesan' => $request->alamat_pemesan,
                    'keterangan' => 'proses pemesanan'
                ]);

        if($minta){
            $barang = $request->barang;
            $last_id = Pesanbarang::latest()->first();
            $id_minta = $last_id->id;
            $jml_diminta = $request->diminta;
            $keterangan = $request->keterangan;

            for($i=0; $i<count($barang); $i++){
                Detailpesan::create([
                    'id_pesan_barang' => $id_minta,
                    'id_barang' => $barang[$i],
                    'jml_barang' => $jml_diminta[$i]
                ]);
            }
        }

        return redirect('admin/mintabrg');
    }

    public function destroyminta($id)
    {
        DB::table('pesanbarangs')->where('id', $id)->delete();
        DB::table('detailpesans')->where('id_pesan_barang', $id)->delete();
        return redirect("admin/mintabrg");
    }

    public function editminta($id)
    {
        $minta = Pesanbarang::find($id);
        $listbar = DB::table('detailpesans')
        ->join('barangs', 'detailpesans.id_barang', '=', 'barangs.id')
        ->select('barangs.*', 'detailpesans.*')
        ->get();
        return view('admin.editminta', compact(['minta','listbar']));
    }

    public function updatepermintaan(Request $request)
    {
        $id = $request->id_minta;

        DB::table('mintabarangs')->where('id',$id)->update([
            'tanggal' => $request->tanggal,
			'keperluan_proyek' => $request->keperluan_proyek,
            'lokasi_proyek' => $request->lokasi_proyek,
            'kode' => $request->kode,
            'nama_kagudang' => $request->nama_kagudang
		]);

        return redirect("admin/mintabrg");
    }

    public function destroylistpesan($id)
    {
        $id_pes = Detailpesan::find($id);

        DB::table('detailpesans')->where('id', $id)->delete();
        return redirect("admin/$id_pes->id_pesan_barang/editminta");
    }

    public function editlistpesan($id)
    {
        $listpesan = Detailpesan::find($id);
        $barangs = Barang::all();
        return view('admin.editlistpesan', compact(['listpesan','barangs']));
    }

    public function updatelistpesan(Request $request)
    {
        $id = $request->id_detailpes;
        $id_pes = Detailpesan::find($id);

        DB::table('detailpesans')->where('id',$id)->update([
            'id_barang' => $request->id_barang,
            'jml_barang' => $request->jml_barang
		]);

        return redirect("admin/$id_pes->id_pesan_barang/editminta");
    }

    public function detailpesan($id)
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

        return view('admin.listdetail', compact(['listdetail','minta','supplier']));
    }

    public function konfirsup($id)
    {

        $baru = DB::table('detailpesans')
                ->where('detailpesans.id_pesan_barang', $id)
                ->get();

        foreach($baru as $te)
        {
            $id_barang = $te->id_barang;

            $lama = DB::table('barangs')
            ->where('id', $id_barang)
            ->get();

            foreach($lama as $la)
            {
                $jml_lama = $la->stok;
                $jml_baru = $te->jml_barang;

                $sisa = $jml_lama + $jml_baru;
                DB::table('barangs')->where('id',$id_barang)->update([
                    'stok' => $sisa
                ]);
            }

        }

        DB::table('pesanbarangs')->where('id',$id)->update([
            'keterangan' => "Pesanan diterima supplier dan diantar menuju gudang"
        ]);

        return redirect("admin/mintabrg");

    }

    public function suratjalan()
    {
        $mintas = DB::table('pesanbarangs')
        ->join('suppliers', 'pesanbarangs.id_supplier', '=', 'suppliers.id')
        ->select('suppliers.*', 'pesanbarangs.*')
        ->get();
        return view('admin.suratjalan', compact('mintas'));
    }
}
