

<div class="card">
    <div class="card-body">
    <div class="card">
              <div class="card-header">
                <h3 class="card-title">Laporan Stok Barang</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered table-hover" border="1">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Satuan</th>
                    <th>Harga Satuan</th>
                    <th>Stok Barang</th>
                  </tr>
                  </thead>
                  <tbody>
                    @php($i = 1)
                    @foreach($barangs as $brg)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $brg->nama_barang }}</td>
                        <td>{{ $brg->satuan }}</td>
                        <td>{{ $brg->harga_satuan }}</td>
                        <td>{{ $brg->stok }}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
    </div>
</div>




