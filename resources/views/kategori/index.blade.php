@extends('layouts.index')

@section('title')
Kategori
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Kategori Barang</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Kategori Barang</li>
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
                    <div class="col-9">
                      <div class="card">
                        <div class="card-header">
                          <h3 class="card-title text-middle">
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
                          </h3>

                          <div class="card-tools">
                            <a class="btn btn-app btn-sm bg-primary" data-toggle="modal" data-target="#modal-tambah">
                                <i class="fas fa-plus"></i> Tambah Kategori
                            </a>
                          </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-head-hover text-nowrap" id="table-kategori">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse ($kategori as $nkategori)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $nkategori->nama }}</td>
                                        <td>
                                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-edit-kategori"><i class="fa fa-edit"></i> Ubah</button>
                                            <a href="{{ url('/kategori/delete/'.$nkategori->id) }}" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
                                        </td>
                                    </tr>
                                    @empty
                                    <td class="text-center" colspan="10">DATA YANG ANDA CARI TIDAK DITEMUKAN!</td>
                                @endforelse
                                </tbody>
                            </table>
                            <div class="row m-2">
                              <div class="col-md-3">
                                Showing {{ $kategori->firstItem() }} to {{ $kategori->lastItem() }} of {{ $kategori->total() }} entries
                              </div>
                              <div class="col-md-9">
                                <span class="float-right">{!! $kategori->links('bootstrap-4') !!}</span>
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



    <div class="modal fade" id="modal-tambah">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Kategori</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="{{ route('kategori.store') }}" method="POST">
                <div class="modal-body">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="Nama">Nama Kategori</label>
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama">
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

    <div class="modal fade" id="modal-edit-kategori">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Ubah Kategori</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="{{ route('kategoriedit') }}" method="POST">
                <div class="modal-body">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                            <label for="Nama">Nama Kategori</label>
                            <input type="hidden" class="form-control" readonly id="editk-id" name="id" placeholder="Nama">
                            <input type="text" class="form-control" id="editk-nama" name="nama" placeholder="Nama">
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
        highlight_row();
        function highlight_row() {
            var table = document.getElementById('table-kategori');
            var cells = table.getElementsByTagName('td');

            for (var i = 0; i < cells.length; i++) {
                // Take each cell
                var cell = cells[i];
                // do something on onclick event for cell
                cell.onclick = function () {
                    // Get the row id where the cell exists
                    var rowId = this.parentNode.rowIndex;
                    var rowsNotSelected = table.getElementsByTagName('tr');
                    var rowSelected = table.getElementsByTagName('tr')[rowId];
                    document.getElementById('editk-id').value = rowSelected.cells[0].innerHTML;
                    document.getElementById('editk-nama').value = rowSelected.cells[1].innerHTML;
                }
            }
        }
    </script>
@endsection

