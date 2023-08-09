@extends('layouts.master')

@section('title','Barang')

@section('conten')

<div class="card">
    <div class="card-header bg-white">
        <h3>Barang</h3>
    </div>
    <div class="card-body">
    <div class="card">
              <div class="card-header">
                <h3 class="card-title">Barang</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
            
                <table id="example" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Satuan</th>
                    <th>Harga Satuan</th>
                    <th>Stok Barang</th>
                  </tr>
                  </thead>
                  <tbody>
                    @php($i = 1)
                    @foreach($barangs as $brg)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $brg->nama_barang }}</td>
                        <td>{{ $brg->satuan }}</td>
                        <td>{{ $brg->harga_satuan }}</td>
                        <td>{{ $brg->stok }}</td>
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


