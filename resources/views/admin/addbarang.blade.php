@extends('layouts.master')

@section('title','Tambah Barang')

@section('conten')

<div class="card">
    <div class="card-header bg-white">
        <h3>Tambah Barang</h3>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ url('admin/storebarang') }}">
            @csrf

            <div class="row mb-3">
                <label for="fullname" class="col-md-4 col-form-label text-md-end">Nama Barrang</label>
                <div class="col-md-6">
                    <input id="nama_barang" type="text" class="form-control" name="nama_barang" required>
                </div>
            </div>

            <div class="row mb-3">
                <label for="date_of_birtht" class="col-md-4 col-form-label text-md-end">Satuan</label>
                <div class="col-md-6">
                    <input id="satuan" type="text" class="form-control" name="satuan" required>
                </div>
            </div>

            <div class="row mb-3">
                <label for="occupation" class="col-md-4 col-form-label text-md-end">Harga Satuan</label>
                <div class="col-md-6">
                    <input id="harga_satuan" type="text" class="form-control" name="harga_satuan" required>
                </div>
            </div>

            <div class="row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        Tambah
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>


@endsection

