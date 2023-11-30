

<div class="card">
    <div class="card-body">
    <div class="card">

            <h3 align="center">Laporan Pemesanan Barang</h3>
            <hr />
            <table>
                <tr>
                    <td>Tanggal Pemesanan</td>
                    <td>:</td>
                    <td>{{$minta->tgl_pesan}}</td>
                </tr>
                <tr>
                    <td>Supplier</td>
                    <td>:</td>
                    <td>{{$supplier->nama_supplier}}</td>
                </tr>
                <tr>
                    <td>Nama Pemesan</td>
                    <td>:</td>
                    <td>{{$minta->nama_pemesan}}</td>
                </tr>
                <tr>
                    <td>Email Pemesan</td>
                    <td>:</td>
                    <td>{{$minta->email_pemesan}}</td>
                </tr>
                <tr>
                    <td>Alamat Pemesan</td>
                    <td>:</td>
                    <td>{{$minta->alamat_pemesan}}</td>
                </tr>
                <tr>
                    <td>Keterangan</td>
                    <td>:</td>
                    <td>{{$minta->keterangan}}</td>
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
                    @foreach($listdetail as $list)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $list->nama_barang }}</td>
                            <td>{{ $list->jml_barang }}</td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>

    </div>
</div>





