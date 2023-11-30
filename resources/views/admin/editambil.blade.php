@extends('layouts.master')

@section('title','Edit Pengambilan Barang')

@section('conten')

<div class="card">
    <div class="card-header bg-white">
        <h3>Edit Pengambilan Barang</h3>
    </div>
    <div class="card-body">
    <form method="POST" action="{{ url('admin/updateambil') }}">
            @csrf

            <div class="row mb-3" hidden>
                <label for="id_ambil" class="col-md-4 col-form-label text-md-end">Id Ambil</label>
                <div class="col-md-6">
                    <input id="id_ambil" type="text" class="form-control" name="id_ambil" value="{{$ambil->id}}">
                </div>
            </div>

            <div class="row mb-3">
                <label for="fullname" class="col-md-4 col-form-label text-md-end">Tanggal Ambil</label>
                <div class="col-md-6">
                    <input id="tgl_ambil" type="date" class="form-control" name="tgl_ambil" value="{{$ambil->tgl_ambil}}">
                </div>
            </div>


            <div class="row mb-3">
                <label for="date_of_birtht" class="col-md-4 col-form-label text-md-end">Nama Kepala Gudang</label>
                <div class="col-md-6">
                    <input id="nama_kagudang" type="text" class="form-control" name="nama_kagudang" value="{{$ambil->nama_kagudang}}">
                </div>
            </div>

            <div class="row mb-3">
                <label for="occupation" class="col-md-4 col-form-label text-md-end">Keperluan Proyek</label>
                <div class="col-md-6">
                    <input id="keperluan_proyek" type="text" class="form-control" name="keperluan_proyek" value="{{$ambil->keperluan_proyek}}">
                </div>
            </div>

            <div class="row mb-3">
                <label for="occupation" class="col-md-4 col-form-label text-md-end">Lokasi Proyek</label>
                <div class="col-md-6">
                    <input id="lokasi_proyek" type="text" class="form-control" name="lokasi_proyek" value="{{$ambil->lokasi_proyek}}">
                </div>
            </div>

            <div class="row mb-3">
                <label for="occupation" class="col-md-4 col-form-label text-md-end">Nama Pengambil</label>
                <div class="col-md-6">
                    <input id="nama_pengambil" type="text" class="form-control" name="nama_pengambil" value="{{$ambil->nama_pengambil}}">
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
        <h3>Edit List Pengambilan</h3>
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
                            <a href="/admin/{{ $list->id }}/editlistambil" title="Edit"><i class="fa fa-edit"></i></a>
                            <a href="/admin/dellistambil/<?php echo $list->id ?>" onclick="return confirm('Are you sure to delete this ?');" title="Delete"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                  </tbody>
        </table>
    </div>
</div>


@endsection

