@extends('layouts.master')

@section('title','Barang')

@section('conten')

<div class="card">
    <div class="card-header bg-white">
        <h3>Detail Barang Masuk</h3>
    </div>
    <div class="card-body">
    <div class="card">
              <div class="card-header">
                <h3 class="card-title">Detail Barang Masuk</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Tanggal Barang Masuk</th>
                    <th>Nama Barang</th>
                    <th>Satuan</th>
                    <th>Harga Satuan</th>
                  </tr>
                  </thead>
                  <tbody>
                    @php($i = 1)
                    @foreach($bm as $bmasuk)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $bmasuk->tgl_barang_masuk }}</td>
                            <td>{{ $bmasuk->nama_barang }}</td>
                            <td>{{ $bmasuk->satuan }}</td>
                            <td>{{ $bmasuk->harga_satuan }}</td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
    </div>
</div>

@endsection




