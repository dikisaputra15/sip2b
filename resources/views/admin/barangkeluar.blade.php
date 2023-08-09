@extends('layouts.master')

@section('title','Barang')

@section('conten')

<div class="card">
    <div class="card-header bg-white">
        <h3>Barang Keluar</h3>
    </div>
    <div class="card-body">
    <div class="card">
              <div class="card-header">
                <h3 class="card-title">Barang Kelaur</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <a href="/admin/addbarangkeluar" class="btn btn-primary">+Add Barang Keluar</a></br></br>
                <table id="example" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Tanggal Barang Keluar</th>
                    <th>Nama Petugas</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @php($i = 1)
                    @foreach($bks as $bk)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $bk->tgl_barang_keluar }}</td>
                        <td>{{ $bk->nama_petugas }}</td>
                        <td>
                            <a href="/admin/{{ $bk->id }}/detailbk" title="Detail"><i class="fa fa-eye"></i></a>
                            <a href="/admin/delbk/<?php echo $bk->id ?>" onclick="return confirm('Are you sure to delete this ?');" title="Delete"><i class="fa fa-trash"></i></a>
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


