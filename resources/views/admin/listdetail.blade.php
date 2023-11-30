@extends('layouts.master')

@section('title','Pemesanan Barang')

@section('conten')

<div class="card">
    <div class="card-header bg-white">
        <h3>List Pemesanan Barang</h3>
    </div>
    <div class="card-body">
    <div class="card">

            <h5 align="center">Pemesanan Barang</h5>
            <hr />
            <table>
                <tr>
                    <td>Tanggal Pemesanan</td>
                    <td>:</td>
                    <td>{{$minta->tgl_pesan}}</td>
                </tr>
                <tr>
                    <td>Supplier</td>
                    <td>:</td>
                    <td>{{$supplier->nama_supplier}}</td>
                </tr>
                <tr>
                    <td>Nama Pemesan</td>
                    <td>:</td>
                    <td>{{$minta->nama_pemesan}}</td>
                </tr>
                <tr>
                    <td>Email Pemesan</td>
                    <td>:</td>
                    <td>{{$minta->email_pemesan}}</td>
                </tr>
                <tr>
                    <td>Alamat Pemesan</td>
                    <td>:</td>
                    <td>{{$minta->alamat_pemesan}}</td>
                </tr>
                <tr>
                    <td>Keterangan</td>
                    <td>:</td>
                    <td>{{$minta->keterangan}}</td>
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
                    @foreach($listdetail as $list)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $list->nama_barang }}</td>
                            <td>{{ $list->jml_barang }}</td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>

            <a href="/admin/konfir_sup/{{$minta->id}}" onclick="return confirm('Apakah Pemesanan Sudah Sesuai ?');" class="btn btn-primary">Konfirmasi Supplier</a>
    </div>
</div>

@endsection




