@extends('layouts.master')

@section('title','User Management')

@section('conten')

<div class="card">
    <div class="card-header bg-white">
        <h3>User Management</h3>
    </div>
    <div class="card-body">
        <div class="form-group row">
            <a href="{{ url('admin/adduser') }}" class="btn btn-primary">+Add User</a>
        </div>
            <table id="example" class="table" style="width:100%">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php($i = 1)
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <a href="/admin/{{ $user->id }}/edituser" title="Update"><i class="fa fa-edit"></i></a>
                            <a href="/admin/deluser/<?php echo $user->id ?>" onclick="return confirm('Are you sure to delete this ?');" title="Delete"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                  </tbody>
                 
            </table>
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