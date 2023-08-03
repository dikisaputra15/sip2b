<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mintabarang;
use App\Models\Barang;
use App\Models\Barangdetail;
use Illuminate\Support\Facades\DB;

class MintaController extends Controller
{
    public function index()
    {
        $mintas = Mintabarang::all();
        return view('admin.mintabarang', compact('mintas'));
    }

    public function addpermintaan()
    {
        $barangs = Barang::all();
        return view('admin.addpermintaan', compact('barangs'));
    }

    public function storepermintaan(Request $request)
    {

        $minta = Mintabarang::create([
                    'tanggal' => $request->tanggal,
                    'keperluan_proyek' => $request->keperluan_proyek,
                    'lokasi_proyek' => $request->lokasi_proyek,
                    'kode' => $request->kode,
                    'nama_kagudang' => $request->nama_kagudang
                ]);

        if($minta){
            $barang = $request->barang;
            $last_id = Mintabarang::latest()->first();
            $id_minta = $last_id->id;
            $jml_diminta = $request->diminta;
            $keterangan = $request->keterangan;

            for($i=0; $i<count($barang); $i++){
                Barangdetail::create([
                    'id_minta' => $id_minta,
                    'id_barang' => $barang[$i],
                    'jml_diminta' => $jml_diminta[$i],
                    'jml_dipenuhi' => 0,
                    'keterangan' => $keterangan[$i]
                ]);
            }
        }

        return redirect('admin/mintabrg');
    }

    public function destroyminta($id)
    {
        DB::table('mintabarangs')->where('id', $id)->delete();
        DB::table('barangdetails')->where('id_minta', $id)->delete();
        return redirect("admin/mintabrg");
    }

    public function editminta($id)
    {
        $minta = Mintabarang::find($id);
        return view('admin.editminta', compact(['minta']));
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
}
