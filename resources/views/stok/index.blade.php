@extends('layouts.index')

@section('title')
Stok
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Stok</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Stok Barang</li>
                    </ol>
                </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                @include('flash-message')
                <div class="row">
                    <div class="col-12">
                      <div class="card">
                        <div class="card-header">
                          <h3 class="card-title text-middle">
                              Stok Barang
                          </h3>

                          <div class="card-tools">
                            <form action="">
                              <div class="input-group input-group-sm mt-3" style="width: 250px;">
                                  <input type="text" name="cari" id="cari" class="form-control float-right" value="{{old('cari')}}" placeholder="Search">
  
                                  <div class="input-group-append">
                                      <button type="submit" class="btn btn-default">
                                          <i class="fas fa-search"></i>
                                      </button>
                                  </div>
                              </div>
                            </form>
                          </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-head-hover text-nowrap" id="table-stok">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Barang</th>
                                    <th>Stok</th>
                                    <th>Harga</th>
                                    <th>Diperbarui</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @forelse ($barang as $nbarang)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $nbarang->nama_barang }}</td>
                                            <td>{{ $nbarang->stok }}</td>
                                            <td>{{ $nbarang->harga }}</td>
                                            <td>{{ $nbarang->updated_at }}</td>
                                            <td>
                                                <a type="button" href="javascript:void(0)" onclick="tambah_stok({{ $nbarang->id }})" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Stok</a>
                                                <a type="button" href="javascript:void(0)" onclick="kurang_stok({{ $nbarang->id }})" class="btn btn-warning"><i class="fa fa-minus"></i> Kurangi Stok</a>
                                            </td>
                                        </tr>
                                        @empty
                                        <td class="text-center" colspan="10">DATA YANG ANDA CARI TIDAK DITEMUKAN!</td>
                                    @endforelse
                                </tbody>
                            </table>
                            <div class="row m-2">
                              <div class="col-md-3">
                                Showing {{ $barang->firstItem() }} to {{ $barang->lastItem() }} of {{ $barang->total() }} entries
                              </div>
                              <div class="col-md-9">
                                <span class="float-right">{!! $barang->links('bootstrap-4') !!}</span>
                              </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                      </div>
                      <!-- /.card -->
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>

        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    {{-- Modal Tambah Stok --}}
    <div class="modal fade" id="modal-tambah-stok">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Stok</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <!-- form start -->
            <form action="{{ route('stok.tambah_stok') }}" method="POST">
                <div class="modal-body">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                            <label for="NamaBarang">Nama Barang</label>
                            <input type="hidden" readonly class="form-control" id="tambah-id" name="id_barang" placeholder="Nama Barang">
                            <input type="text" readonly class="form-control" id="tambah-nama_barang" name="nama_barang" placeholder="Nama Barang">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                            <label for="StokSekarang">Stok Sekarang</label>
                            <input type="text" readonly class="form-control" id="tambah-stok_sekarang" name="stok_sekarang" placeholder="Stok Sekarang">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="Harga">Harga</label>
                            <input type="text" readonly class="form-control" id="tambah-harga" name="harga" placeholder="Harga">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="StokMasuk">Stok Masuk</label>
                            <input type="text" class="form-control" id="tambah-stok_masuk" name="stok_masuk" placeholder="Stok Masuk">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    {{-- Modal Kurang Stok --}}
    <div class="modal fade" id="modal-kurang-stok">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Kurang Stok</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <!-- form start -->
            <form action="{{ route('stok.kurang_stok') }}" method="POST">
                <div class="modal-body">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                            <label for="NamaBarang">Nama Barang</label>
                            <input type="hidden" readonly class="form-control" id="kurang-id" name="id_barang" placeholder="Nama Barang">
                            <input type="text" readonly class="form-control" id="kurang-nama_barang" name="nama_barang" placeholder="Nama Barang">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                            <label for="StokSekarang">Stok Sekarang</label>
                            <input type="text" readonly class="form-control" id="kurang-stok_sekarang" name="stok_sekarang" placeholder="Stok Sekarang">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="Harga">Harga</label>
                            <input type="text" readonly class="form-control" id="kurang-harga" name="harga" placeholder="Harga">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="StokMasuk">Kurangi Stok</label>
                            <input type="text" class="form-control" id="kurang-kurang_stok" name="kurang_stok" placeholder="Kurangi Stok">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
@endsection

@section('js')
    <script type="text/javascript">
        // tambah_stok();
        // function tambah_stok() {
        //     var table = document.getElementById('table-stok');
        //     var cells = table.getElementsByTagName('td');

        //     for (var i = 0; i < cells.length; i++) {
        //         // Take each cell
        //         var cell = cells[i];
        //         // do something on onclick event for cell
        //         cell.onclick = function () {
        //             // Get the row id where the cell exists
        //             var rowId = this.parentNode.rowIndex;
        //             var rowsNotSelected = table.getElementsByTagName('tr');
        //             var rowSelected = table.getElementsByTagName('tr')[rowId];
        //             document.getElementById('tambah-id').value = rowSelected.cells[0].innerHTML;
        //             document.getElementById('tambah-nama_barang').value = rowSelected.cells[1].innerHTML;
        //             document.getElementById('tambah-stok_sekarang').value = rowSelected.cells[2].innerHTML;
        //             document.getElementById('tambah-harga').value = rowSelected.cells[3].innerHTML;
        //         }
        //     }
        // };

        function tambah_stok(id){
            $.get('/stok/cari_stok/'+id, function(barang){
                $("#tambah-id").val(barang.id);
                $("#tambah-nama_barang").val(barang.nama_barang);
                $("#tambah-stok_sekarang").val(barang.stok);
                $("#tambah-harga").val(barang.harga);
                $("#modal-tambah-stok").modal('toggle');
            })
        }

        function kurang_stok(id){
            $.get('/stok/cari_stok/'+id, function(barang){
                $("#kurang-id").val(barang.id);
                $("#kurang-nama_barang").val(barang.nama_barang);
                $("#kurang-stok_sekarang").val(barang.stok);
                $("#kurang-harga").val(barang.harga);
                $("#modal-kurang-stok").modal('toggle');
            })
        }
    </script>
@endsection
