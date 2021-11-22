@extends('layouts.index')

@section('content_header')
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Supplier</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Supplier</li>
                    </ol>
                </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                      <div class="card">
                        <div class="card-header">
                          <h3 class="card-title text-middle">
                            <div class="input-group input-group-sm mt-3" style="width: 250px;">
                                <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                          </h3>

                          <div class="card-tools">
                            <a class="btn btn-app btn-sm bg-primary" data-toggle="modal" data-target="#modal-default">
                                <i class="fas fa-plus"></i> Tambah Supplier
                            </a>
                          </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0" style="height: 300px;">
                            <table class="table table-head-fixed text-nowrap" id="display-table">
                                <thead>
                                <tr>
                                    <th>Kode Supplier</th>
                                    <th>Nama</th>
                                    <th>Telepon</th>
                                    <th>Alamat</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($supplier as $supplier)
                                    <tr>
                                        <td>{{ $supplier->kode_supplier }}</td>
                                        <td>{{ $supplier->nama }}</td>
                                        <td>{{ $supplier->telepon }}</td>
                                        <td>{{ $supplier->alamat }}</td>
                                        <td hidden>{{ $supplier->id }}</td>
                                        <td>
                                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-edit-supplier"><i class="fa fa-edit"></i> Ubah</button>
                                            <a href="javascript:void(0)" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
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

    {{-- Modal Tambah --}}
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Supplier</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <!-- form start -->
            <form action="{{ route('supplier.store') }}" method="POST">
                <div class="modal-body">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="KodeSupplier">Kode Supplier</label>
                            <input type="text" readonly class="form-control" name="kode_supplier" value="S{{ $kode+1 }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="Nama">Nama</label>
                            <input type="text" class="form-control" name="nama" placeholder="Nama">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="Telepon">Telepon</label>
                            <input type="text" class="form-control" name="telepon" placeholder="Telepon">
                            </div>
                        </div>
                        <div class="col-sm-6">
                        <!-- textarea -->
                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea class="form-control" rows="3" name="alamat" placeholder="Alamat supplier"></textarea>
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

    {{-- Modal Ubah --}}
    <div class="modal fade" id="modal-edit-supplier">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Ubah Supplier</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <!-- form start -->
            <form action="{{ route('supplieredit') }}" method="POST">
                <div class="modal-body">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                <label for="KodeSupplier">Kode Supplier</label>
                                <input type="hidden" class="form-control" id="id" name="id" placeholder="Kode Supplier">
                                <input type="text" disabled class="form-control" id="kode_supplier" name="kode_supplier" placeholder="Kode Supplier">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                <label for="Nama">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                <label for="Telepon">Telepon</label>
                                <input type="text" class="form-control" id="telepon" name="telepon" placeholder="Telepon">
                                </div>
                            </div>
                            <div class="col-sm-6">
                            <!-- textarea -->
                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea class="form-control" rows="3" id="alamat" name="alamat" placeholder="Alamat supplier"></textarea>
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
            var table = document.getElementById('display-table');
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
                    document.getElementById('id').value = rowSelected.cells[4].innerHTML;
                    document.getElementById('kode_supplier').value = rowSelected.cells[0].innerHTML;
                    document.getElementById('nama').value = rowSelected.cells[1].innerHTML;
                    document.getElementById('telepon').value = rowSelected.cells[2].innerHTML;
                    document.getElementById('alamat').value = rowSelected.cells[3].innerHTML;
                }
            }
        }
    </script>
@endsection
