@extends('layouts.master')

@section('title','Supplier')

@section('conten')

<div class="card">
    <div class="card-header bg-white">
        <h3>Supplier</h3>
    </div>
    <div class="card-body">
    <div class="card">
              <div class="card-header">
                <h3 class="card-title">Supplier</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <a href="/admin/addsupplier" class="btn btn-primary">+Add Supplier</a></br></br>
                <table id="example" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Supplier</th>
                    <th>No Handphone</th>
                    <th>Alamat</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @php($i = 1)
                    @foreach($suppliers as $slp)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $slp->nama_supplier }}</td>
                        <td>{{ $slp->no_hp }}</td>
                        <td>{{ $slp->alamat }}</td>
                        <td>
                            <a href="/admin/{{ $slp->id }}/editsupplier" title="Update"><i class="fa fa-edit"></i></a>
                            <a href="/admin/delsupplier/<?php echo $slp->id ?>" onclick="return confirm('Are you sure to delete this ?');" title="Delete"><i class="fa fa-trash"></i></a>
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


