

<div class="card">
    <div class="card-body">
    <div class="card">

            <h3 align="center">Laporan Pengambilan Barang</h3>
            <hr />
            <table>
                <tr>
                    <td>Tanggal Ambil</td>
                    <td>:</td>
                    <td>{{$ambil->tgl_ambil}}</td>
                </tr>
                <tr>
                    <td>Nama Kepala Gudang</td>
                    <td>:</td>
                    <td>{{$ambil->nama_kagudang}}</td>
                </tr>
                <tr>
                    <td>Keperluan Proyek</td>
                    <td>:</td>
                    <td>{{$ambil->keperluan_proyek}}</td>
                </tr>
                <tr>
                    <td>Lokasi Proyek</td>
                    <td>:</td>
                    <td>{{$ambil->lokasi_proyek}}</td>
                </tr>
                <tr>
                    <td>Nama Pengambil</td>
                    <td>:</td>
                    <td>{{$ambil->nama_pengambil}}</td>
                </tr>
                <tr>
                    <td>Keterangan</td>
                    <td>:</td>
                    <td>{{$ambil->keterangan}}</td>
                </tr>
            </table><br><br>

              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered table-hover" border="1">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Jumlah Brang</th>
                  </tr>
                  </thead>
                  <tbody>
                    @php($i = 1)
                    @foreach($bm as $b)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $b->nama_barang }}</td>
                            <td>{{ $b->jml_barang }}</td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
    </div>
</div>





