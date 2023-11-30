<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barangmasuk;
use App\Models\Detailbarangmasuk;
use App\Models\Barang;
use App\Models\Ambilbarang;
use App\Models\Detailambil;
use Illuminate\Support\Facades\DB;

class BmController extends Controller
{
    public function index()
    {
        $bms = Ambilbarang::all();
        return view('admin.barangmasuk', compact('bms'));
    }

    public function addbarangmasuk()
    {
        $barangs = Barang::all();
        return view('admin.addbarangmasuk', compact('barangs'));
    }

    public function storebarangmasuk(Request $request)
    {

        $bm = Ambilbarang::create([
                    'tgl_ambil' => $request->tgl_ambil,
                    'nama_kagudang' => $request->nama_kagudang,
                    'keperluan_proyek' => $request->keperluan_proyek,
                    'lokasi_proyek' => $request->lokasi_proyek,
                    'nama_pengambil' => $request->nama_pengambil,
                    'keterangan' => 'pengambilan barang diproses'
                ]);

        if($bm){
            $barang = $request->barang;
            $last_id = Ambilbarang::latest()->first();
            $id_ambil_barang = $last_id->id;
            $jml_barang = $request->diminta;

            for($i=0; $i<count($barang); $i++){
                Detailambil::create([
                    'id_ambil_barang' => $id_ambil_barang,
                    'id_barang' => $barang[$i],
                    'jml_barang' => $jml_barang[$i]
                ]);
            }
        }

        return redirect('admin/barangmasuk');
    }

    public function detailbm($id)
    {
        $ambil = Ambilbarang::find($id);
        $bm = DB::table('detailambils')
        ->join('barangs', 'detailambils.id_barang', '=', 'barangs.id')
        ->join('ambilbarangs', 'ambilbarangs.id', '=', 'detailambils.id_ambil_barang')
        ->select('barangs.*', 'detailambils.*', 'ambilbarangs.*')
        ->where('ambilbarangs.id', $id)
        ->get();

        return view('admin.detailbm', compact('bm','ambil'));
    }

    public function destroybm($id)
    {
        DB::table('ambilbarangs')->where('id', $id)->delete();
        DB::table('detailambils')->where('id_ambil_barang', $id)->delete();
        return redirect("admin/barangmasuk");
    }

    public function editambil($id)
    {
        $ambil = Ambilbarang::find($id);
        $listbar = DB::table('detailambils')
        ->join('barangs', 'detailambils.id_barang', '=', 'barangs.id')
        ->select('barangs.*', 'detailambils.*')
        ->get();
        return view('admin.editambil', compact(['ambil','listbar']));
    }

    public function updateambil(Request $request)
    {
        $id = $request->id_ambil;

        DB::table('ambilbarangs')->where('id',$id)->update([
            'tgl_ambil' => $request->tgl_ambil,
			'nama_kagudang' => $request->nama_kagudang,
            'keperluan_proyek' => $request->keperluan_proyek,
            'lokasi_proyek' => $request->lokasi_proyek,
            'nama_pengambil' => $request->nama_pengambil
		]);

        return redirect("admin/barangmasuk");
    }

    public function destroylistambil($id)
    {
        $id_ambil = Detailambil::find($id);

        DB::table('detailambils')->where('id', $id)->delete();
        return redirect("admin/$id_ambil->id_ambil_barang/editambil");
    }

    public function editlistambil($id)
    {
        $listambil = Detailambil::find($id);
        $barangs = Barang::all();
        return view('admin.editlistambil', compact(['listambil','barangs']));
    }

    public function updatelistambil(Request $request)
    {
        $id = $request->id_detail_ambil;
        $id_ambil = Detailambil::find($id);

        DB::table('detailambils')->where('id',$id)->update([
            'id_barang' => $request->id_barang,
            'jml_barang' => $request->jml_barang
		]);

        return redirect("admin/$id_ambil->id_ambil_barang/editambil");
    }

    public function konfirambil($id)
    {

        $baru = DB::table('detailambils')
                ->where('detailambils.id_ambil_barang', $id)
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

                $sisa = $jml_lama - $jml_baru;
                DB::table('barangs')->where('id',$id_barang)->update([
                    'stok' => $sisa
                ]);
            }

        }

        DB::table('ambilbarangs')->where('id',$id)->update([
            'keterangan' => "barang sudah dikeluarkan darigudang"
        ]);

        return redirect("admin/barangmasuk");

    }
}
