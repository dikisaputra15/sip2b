@extends('layouts.master')

@section('title','Form Permintaan')

@section('conten')

<div class="card">
    <div class="card-header bg-white">
        <h3>Form Pemesanan Barang</h3>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ url('admin/storepermintaan') }}">
            @csrf

            <div class="row mb-3">
                <label for="fullname" class="col-md-4 col-form-label text-md-end">Tanggal Pesan</label>
                <div class="col-md-6">
                    <input id="tanggal" type="date" class="form-control" name="tanggal" required>
                </div>
            </div>

            <div class="row mb-3">
                <label for="occupation" class="col-md-4 col-form-label text-md-end">Supplier</label>
                <div class="col-md-6">
                    <select class="form-control" name="id_supplier">
                        <option value="0">-Pilih Supplier-</option>
                        @foreach($suppliers as $sup)
                            <option value="{{ $sup->id }}">{{ $sup->nama_supplier }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <label for="date_of_birtht" class="col-md-4 col-form-label text-md-end">Nama Pemesan</label>
                <div class="col-md-6">
                    <input id="keperluan_proyek" type="text" class="form-control" name="keperluan_proyek" required>
                </div>
            </div>

            <div class="row mb-3">
                <label for="occupation" class="col-md-4 col-form-label text-md-end">Email Pemesan</label>
                <div class="col-md-6">
                    <input id="lokasi_proyek" type="text" class="form-control" name="lokasi_proyek" required>
                </div>
            </div>

            <div class="row mb-3">
                <label for="occupation" class="col-md-4 col-form-label text-md-end">Alamat Pemesan</label>
                <div class="col-md-6">
                    <input id="nama_kagudang" type="text" class="form-control" name="nama_kagudang" required>
                </div>
            </div>

            <div class="control-group after-add-more10">
                      <div class="form-group">
                          <div class="col-xs-4">
                              <label for="first_name"><h4>Uraian Barang</h4></label>
                              <select class="form-control" name="barang[]">
                                    <option value="0">-Pilih Barang-</option>
                                @foreach($barangs as $brg)
                                    <option value="{{ $brg->id }}">{{ $brg->nama_barang }}</option>
                                @endforeach
                              </select>
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="col-xs-3">
                             <label for="mobile"><h4>Jumlah Diminta</h4></label>
                              <input type="text" class="form-control" name="diminta[]" id="diminta">
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="col-xs-4">
                              <label for="email"><h4>Keterangan</h4></label>
                              <input type="text" class="form-control" name="keterangan[]" id="keterangan">
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="col-xs-1">
                          <br><br>
                            <button class="btn btn-success add-more10" type="button">
                                <i class="glyphicon glyphicon-plus"></i>
                            </button>
                          </div>
                      </div>
            </div>

            <div class="form-group">
                <div class="col-xs-12">
                    <br>
                    <button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                </div>
            </div>
        </form>

        <div class="copy10 hide">
        <div class="control-group10">
        <div class="form-group">
            <div class="col-xs-4">
                <label for="first_name"><h4>Uraian Barang</h4></label>
                <select class="form-control" name="barang[]">
                        <option value="0">-Pilih Barang-</option>
                    @foreach($barangs as $brg)
                        <option value="{{ $brg->id }}">{{ $brg->nama_barang }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <div class="col-xs-3">
                <label for="mobile"><h4>Jumlah Diminta</h4></label>
                <input type="text" class="form-control" name="diminta[]" id="diminta">
            </div>
        </div>
        <div class="form-group">
            <div class="col-xs-4">
                <label for="email"><h4>Keterangan</h4></label>
                <input type="text" class="form-control" name="keterangan[]" id="keterangan">
            </div>
        </div>
        <div class="form-group">
            <div class="col-xs-1">
                <br><br>
                <button class="btn btn-danger remove10" type="button"><i class="glyphicon glyphicon-remove"></i></button>
            </div>
        </div>
        </div>
        </div>

    </div>
</div>


@endsection

@push('service')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function() {

        $(".add-more10").click(function(){
          var html10 = $(".copy10").html();
          $(".after-add-more10").after(html10);
        });

        // saat tombol remove dklik control group akan dihapus
        $("body").on("click",".remove10",function(){
            $(this).parents(".control-group10").remove();
        });

    });
</script>
@endpush
