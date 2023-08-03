@extends('layouts.master')

@section('title','Minta Barang')

@section('conten')

<div class="card">
    <div class="card-header bg-white">
        <h3>Permintaan Barang</h3>
    </div>
    <div class="card-body">
    <div class="card">
              <div class="card-header">
                <h3 class="card-title">Permintaan Barang</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <a href="/admin/addpermintaan" class="btn btn-primary">+Add Permohonan</a></br></br>
                <table id="example" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Keperluan Proyek</th>
                    <th>Lokasi Proyek</th>
                    <th>Kode</th>
                    <th>Nama Kepala Gudang</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @php($i = 1)
                    @foreach($mintas as $minta)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $minta->tanggal }}</td>
                        <td>{{ $minta->keperluan_proyek }}</td>
                        <td>{{ $minta->lokasi_proyek }}</td>
                        <td>{{ $minta->kode }}</td>
                        <td>{{ $minta->nama_kagudang }}</td>
                        <td>
                            <a href="/admin/{{ $minta->id }}/editminta" title="Update"><i class="fa fa-edit"></i></a>
                            <a href="/admin/delminta/<?php echo $minta->id ?>" onclick="return confirm('Are you sure to delete this ?');" title="Delete"><i class="fa fa-trash"></i></a>
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


