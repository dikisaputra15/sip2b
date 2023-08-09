

<div class="card">
    <div class="card-body">
    <div class="card">
              <div class="card-header">
                <h3 class="card-title">Laporan Barang Masuk</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered table-hover" border="1">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Tanggal Barang Masuk</th>
                    <th>Nama Barang</th>
                    <th>Jumlah Barang Masuk</th>
                  </tr>
                  </thead>
                  <tbody>
                    @php($i = 1)
                    @foreach($data as $dat)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $dat->tgl_barang_masuk }}</td>
                        <td>{{ $dat->nama_barang }}</td>
                        <td>{{ $dat->jml_barang_masuk }}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
    </div>
</div>




