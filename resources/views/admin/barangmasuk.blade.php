@extends('layouts.master')

@section('title','Barang')

@section('conten')

<div class="card">
    <div class="card-header bg-white">
        <h3>Barang Masuk</h3>
    </div>
    <div class="card-body">
    <div class="card">
              <div class="card-header">
                <h3 class="card-title">Barang Masuk</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <a href="/admin/addbarangmasuk" class="btn btn-primary">+Add Barang Masuk</a></br></br>
                <table id="example" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Tanggal Barang Masuk</th>
                    <th>Nama Penerima</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @php($i = 1)
                    @foreach($bms as $bm)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $bm->tgl_barang_masuk }}</td>
                        <td>{{ $bm->nama_penerima }}</td>
                        <td>
                            <a href="/admin/{{ $bm->id }}/detailbm" title="Detail"><i class="fa fa-eye"></i></a>
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


