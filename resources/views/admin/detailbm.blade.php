@extends('layouts.master')

@section('title','Pemesanan Barang')

@section('conten')

<div class="card">
    <div class="card-header bg-white">
        <h3>List Pengambilan Barang</h3>
    </div>
    <div class="card-body">
    <div class="card">

            <h5 align="center">Pengambilan Barang</h5>
            <hr />
            <table>
                <tr>
                    <td>Tanggal Ambil</td>
                    <td>:</td>
                    <td>{{$ambil->tgl_ambil}}</td>
                </tr>
                <tr>
                    <td>Nama Kepala Gudang</td>
                    <td>:</td>
                    <td>{{$ambil->nama_kagudang}}</td>
                </tr>
                <tr>
                    <td>Keperluan Proyek</td>
                    <td>:</td>
                    <td>{{$ambil->keperluan_proyek}}</td>
                </tr>
                <tr>
                    <td>Lokasi Proyek</td>
                    <td>:</td>
                    <td>{{$ambil->lokasi_proyek}}</td>
                </tr>
                <tr>
                    <td>Nama Pengambil</td>
                    <td>:</td>
                    <td>{{$ambil->nama_pengambil}}</td>
                </tr>
                <tr>
                    <td>Keterangan</td>
                    <td>:</td>
                    <td>{{$ambil->keterangan}}</td>
                </tr>
            </table>

              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Jumlah Brang</th>
                  </tr>
                  </thead>
                  <tbody>
                    @php($i = 1)
                    @foreach($bm as $b)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $b->nama_barang }}</td>
                            <td>{{ $b->jml_barang }}</td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>

            <a href="/admin/konfir_ambil/{{$ambil->id}}" onclick="return confirm('Apakah Pengambilan Sudah Sesuai ?');" class="btn btn-primary">Konfirmasi Gudang</a>
    </div>
</div>

@endsection




