@extends('layouts.master')

@section('title','Edit Permintaan')

@section('conten')

<div class="card">
    <div class="card-header bg-white">
        <h3>Edit Permintaan</h3>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ url('admin/updatepermintaan') }}">
            @csrf

            <div class="row mb-3" hidden>
                <label for="fullname" class="col-md-4 col-form-label text-md-end">Id minta</label>
                <div class="col-md-6">
                    <input id="id_minta" type="text" class="form-control" name="id_minta" value="{{ $minta->id; }}">
                </div>
            </div>

            <div class="row mb-3">
                <label for="fullname" class="col-md-4 col-form-label text-md-end">Tanggal</label>
                <div class="col-md-6">
                    <input id="tanggal" type="date" class="form-control" name="tanggal" value="{{ $minta->tanggal; }}">
                </div>
            </div>

            <div class="row mb-3">
                <label for="date_of_birtht" class="col-md-4 col-form-label text-md-end">Keperluan Proyek</label>
                <div class="col-md-6">
                    <input id="keperluan_proyek" type="text" class="form-control" name="keperluan_proyek" value="{{ $minta->keperluan_proyek; }}">
                </div>
            </div>

            <div class="row mb-3">
                <label for="occupation" class="col-md-4 col-form-label text-md-end">Lokasi Proyek</label>
                <div class="col-md-6">
                    <input id="lokasi_proyek" type="text" class="form-control" name="lokasi_proyek" value="{{ $minta->lokasi_proyek; }}">
                </div>
            </div>

            <div class="row mb-3">
                <label for="occupation" class="col-md-4 col-form-label text-md-end">Kode</label>
                <div class="col-md-6">
                    <select class="form-control" name="kode">
                        <option value="0">-Pilih Kode-</option>
                        <?php if($minta->kode == "pengambilan"){ ?>
                            <option value="pengambilan" selected>Pengambilan</option>
                        <?php }else{ ?>
                            <option value="pengambilan">Pengambilan</option>
                        <?php } ?>

                        <?php if($minta->kode == "pengembalian"){ ?>
                            <option value="pengembalian" selected>Pengembalian</option>
                        <?php }else{ ?>
                            <option value="pengembalian">Pengembalian</option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <label for="occupation" class="col-md-4 col-form-label text-md-end">Nama Kepala Gudang</label>
                <div class="col-md-6">
                    <input id="nama_kagudang" type="text" class="form-control" name="nama_kagudang" value="{{ $minta->nama_kagudang; }}">
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

