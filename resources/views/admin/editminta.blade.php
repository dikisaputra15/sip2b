@extends('layouts.master')

@section('title','Edit Pemesanan')

@section('conten')

<div class="card">
    <div class="card-header bg-white">
        <h3>Edit Pemesanan</h3>
    </div>
    <div class="card-body">
    <form method="POST" action="{{ url('admin/updatepesan') }}">
            @csrf

            <div class="row mb-3" hidden>
                <label for="date_of_birtht" class="col-md-4 col-form-label text-md-end">Id Pesan</label>
                <div class="col-md-6">
                    <input id="id_pesan" type="text" class="form-control" name="id_pesan" value="{{$minta->id}}">
                </div>
            </div>

            <div class="row mb-3">
                <label for="fullname" class="col-md-4 col-form-label text-md-end">Tanggal Pesan</label>
                <div class="col-md-6">
                    <input id="tanggal" type="date" class="form-control" name="tanggal" value="{{$minta->tgl_pesan}}">
                </div>
            </div>


            <div class="row mb-3">
                <label for="date_of_birtht" class="col-md-4 col-form-label text-md-end">Nama Pemesan</label>
                <div class="col-md-6">
                    <input id="nama_pemesan" type="text" class="form-control" name="nama_pemesan" value="{{$minta->nama_pemesan}}">
                </div>
            </div>

            <div class="row mb-3">
                <label for="occupation" class="col-md-4 col-form-label text-md-end">Email Pemesan</label>
                <div class="col-md-6">
                    <input id="email_pemesan" type="email" class="form-control" name="email_pemesan" value="{{$minta->email_pemesan}}">
                </div>
            </div>

            <div class="row mb-3">
                <label for="occupation" class="col-md-4 col-form-label text-md-end">Alamat Pemesan</label>
                <div class="col-md-6">
                    <input id="alamat_pemesan" type="text" class="form-control" name="alamat_pemesan" value="{{$minta->alamat_pemesan}}">
                </div>
            </div>



            <div class="form-group">
                <div class="col-xs-12">
                    <br>
                    <button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Update</button>
                </div>
            </div>
        </form>


    </div>
</div>

<div class="card">
    <div class="card-header bg-white">
        <h3>Edit List Pemesanan</h3>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Jumlah Barang</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @php($i = 1)
                    @foreach($listbar as $list)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $list->nama_barang }}</td>
                        <td>{{ $list->jml_barang }}</td>
                        <td>
                            <a href="/admin/{{ $list->id }}/editlistpesan" title="Update"><i class="fa fa-edit"></i></a>
                            <a href="/admin/dellistpesan/<?php echo $list->id ?>" onclick="return confirm('Are you sure to delete this ?');" title="Delete"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                  </tbody>
        </table>
    </div>
</div>


@endsection

