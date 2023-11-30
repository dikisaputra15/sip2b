@extends('layouts.master')

@section('title','Pengambilan Barang')

@section('conten')

<div class="card">
    <div class="card-header bg-white">
        <h3>Pengambilan Barang</h3>
    </div>
    <div class="card-body">
    <div class="card">
              <div class="card-header">
                <h3 class="card-title">Pengambilan Barang</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <a href="/admin/addbarangmasuk" class="btn btn-primary">+Add Pengambilan Barang</a></br></br>
                <table id="example" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Tanggal Ambil</th>
                    <th>Nama Ka Gudang</th>
                    <th>Keperluan Proyek</th>
                    <th>Lokasi Proyek</th>
                    <th>Nama Pengambil</th>
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
                        <td>
                            <a href="/admin/{{ $bm->id }}/detailbm" title="View Detail"><i class="fa fa-eye"></i></a>
                            <a href="/admin/{{ $bm->id }}/editambil" title="Edit"><i class="fa fa-edit"></i></a>
                            <a href="/admin/delbm/<?php echo $bm->id ?>" onclick="return confirm('Are you sure to delete this ?');" title="Delete"><i class="fa fa-trash"></i></a>
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


