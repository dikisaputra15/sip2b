@extends('layouts.master')

@section('title','Edit Supplier')

@section('conten')

<div class="card">
    <div class="card-header bg-white">
        <h3>Edit Supplier</h3>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ url('admin/updatesupplier') }}">
            @csrf

            <div class="row mb-3" hidden>
                <label for="fullname" class="col-md-4 col-form-label text-md-end">id supplier</label>
                <div class="col-md-6">
                    <input id="id_supplier" type="text" class="form-control" name="id_supplier" value="{{ $sup->id }}">
                </div>
            </div>

            <div class="row mb-3">
                <label for="fullname" class="col-md-4 col-form-label text-md-end">Nama Supplier</label>
                <div class="col-md-6">
                    <input id="nama_supplier" type="text" class="form-control" name="nama_supplier"  value="{{ $sup->nama_supplier }}">
                </div>
            </div>

            <div class="row mb-3">
                <label for="date_of_birtht" class="col-md-4 col-form-label text-md-end">No Handphone</label>
                <div class="col-md-6">
                    <input id="no_hp" type="text" class="form-control" name="no_hp"  value="{{ $sup->no_hp }}">
                </div>
            </div>

            <div class="row mb-3">
                <label for="occupation" class="col-md-4 col-form-label text-md-end">Alamat</label>
                <div class="col-md-6">
                    <input id="alamat" type="text" class="form-control" name="alamat"  value="{{ $sup->alamat }}">
                </div>
            </div>

            <div class="row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        Update
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>


@endsection

