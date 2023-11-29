@extends('layouts.master')

@section('title','Edit Pemesanan')

@section('conten')

<div class="card">
    <div class="card-header bg-white">
        <h3>Edit List Pesan</h3>
    </div>
    <div class="card-body">
    <form method="POST" action="{{ url('admin/updatelistpesan') }}">
            @csrf

            <div class="row mb-3" hidden>
                <label for="id_detailpes" class="col-md-4 col-form-label text-md-end">Id Detail Pesan</label>
                <div class="col-md-6">
                    <input id="id_detailpes" type="text" class="form-control" name="id_detailpes" value="{{$listpesan->id}}">
                </div>
            </div>

            <div class="row mb-3" hidden>
                <label for="id_pesanbarang" class="col-md-4 col-form-label text-md-end">Id pesan barang</label>
                <div class="col-md-6">
                    <input id="id_pesan_barang" type="text" class="form-control" name="id_pesan_barang" value="{{$listpesan->id_pesan_barang}}">
                </div>
            </div>

            <div class="row mb-3">
                            <label for="services" class="col-md-4 col-form-label text-md-end">Barang</label>
                            <div class="col-md-6">
                                <select class="form-control" name="id_barang">
                                            <option value="0">-Pilih Barang-</option>
                                    @foreach ($barangs as $brg)
                                        @if ($listpesan->id_barang == $brg->id)
                                            <option value="{{ $brg->id }}" selected>{{ $brg->nama_barang }}</option>
                                        @else
                                            <option value="{{ $brg->id }}">{{ $brg->nama_barang }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
            </div>


            <div class="row mb-3">
                <label for="date_of_birtht" class="col-md-4 col-form-label text-md-end">Jumlah Barang</label>
                <div class="col-md-6">
                    <input id="jml_barang" type="text" class="form-control" name="jml_barang" value="{{$listpesan->jml_barang}}">
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


@endsection

