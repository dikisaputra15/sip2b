@extends('layouts.master')

@section('title','Laporan Pemesanan Barang')

@section('conten')

<div class="card">
    <div class="card-header bg-white">
        <h3>Laporan Pemesanan Barang</h3>
    </div>
    <div class="card-body">
    <div class="card">
              <div class="card-header">
                <h3 class="card-title">Laporan Pemesanan Barang</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Tanggal Pesan</th>
                    <th>Nama Supplier</th>
                    <th>Nama Pemesan</th>
                    <th>Email Pemesan</th>
                    <th>Alamat Pemesan</th>
                    <th>Keterangan</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @php($i = 1)
                    @foreach($mintas as $minta)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $minta->tgl_pesan }}</td>
                        <td>{{ $minta->nama_supplier }}</td>
                        <td>{{ $minta->nama_pemesan }}</td>
                        <td>{{ $minta->email_pemesan }}</td>
                        <td>{{ $minta->alamat_pemesan }}</td>
                        <td>{{ $minta->keterangan }}</td>
                        <td>
                            <a href="/admin/{{ $minta->id }}/pdfmasuk" title="View PDF" target="__blank"><i class="fa fa-eye"></i></a>
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


