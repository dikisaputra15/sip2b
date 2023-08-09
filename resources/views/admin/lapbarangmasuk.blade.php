@extends('layouts.master')

@section('title','Laporan')

@section('conten')

<div class="card">
    <div class="card-header bg-white">
        <h3>Laporan Barang Masuk Berdasarkan Tanggal</h3>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ url('admin/pdfmasuk') }}" target="__blank">
            @csrf

            <div class="row mb-3">
                <label for="fullname" class="col-md-4 col-form-label text-md-end">Tanggal</label>
                <div class="col-md-6">
                    <input id="tgl1" type="date" class="form-control" name="tgl1" required>
                </div>
            </div>

            <div class="row mb-3">
                <label for="date_of_birtht" class="col-md-4 col-form-label text-md-end">Sampai dengan Tanggal</label>
                <div class="col-md-6">
                    <input id="tgl2" type="date" class="form-control" name="tgl2" required>
                </div>
            </div>
           

            <div class="row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        Lihat
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>


@endsection

