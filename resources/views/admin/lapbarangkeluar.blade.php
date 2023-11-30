@extends('layouts.master')

@section('title','Pengambilan Barang')

@section('conten')

<div class="card">
    <div class="card-header bg-white">
        <h3>Laporan Pengambilan Barang</h3>
    </div>
    <div class="card-body">
    <div class="card">
              <div class="card-header">
                <h3 class="card-title">Laporan Pengambilan Barang</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Tanggal Ambil</th>
                    <th>Nama Ka Gudang</th>
                    <th>Keperluan Proyek</th>
                    <th>Lokasi Proyek</th>
                    <th>Nama Pengambil</th>
                    <th>Keterangan</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @php($i = 1)
                    @foreach($bms as $bm)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $bm->tgl_ambil }}</td>
                        <td>{{ $bm->nama_kagudang }}</td>
                        <td>{{ $bm->keperluan_proyek }}</td>
                        <td>{{ $bm->lokasi_proyek }}</td>
                        <td>{{ $bm->nama_pengambil }}</td>
                        <td>{{ $bm->keterangan }}</td>
                        <td>
                            <a href="/admin/{{ $bm->id }}/pdfkeluar" title="View PDF" target="__blank"><i class="fa fa-eye"></i></a>
                        </td>
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

@push('service')
<script>
$(document).ready(function(){
    $('#example').DataTable({
        "pageLength": 10,
        "ordering": false,
    })

});
</script>
@endpush


