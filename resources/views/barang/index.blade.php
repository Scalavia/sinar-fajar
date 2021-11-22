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
                    <h1 class="m-0">Barang</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Barang</li>
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
                                <i class="fas fa-plus"></i> Tambah Barang
                            </a>
                          </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0" style="height: 300px;">
                            <table class="table table-head-fixed text-nowrap">
                                <thead>
                                <tr>
                                    <th>Gambar</th>
                                    <th>Kode Barang</th>
                                    <th>Nama</th>
                                    <th>Kategori</th>
                                    <th>Keterangan</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($barang as $barang)
                                    <tr>
                                        <td><img src="{{ asset('foto/barang/'.$barang->gambar) }}" height="75" alt=""></td>
                                        <td>{{ $barang->kode_barang }}</td>
                                        <td>{{ $barang->nama_barang }}</td>
                                        <td>{{ $barang->kategori->nama }}</td>
                                        <td>{{ $barang->deskripsi }}</td>
                                        <td>
                                            <a href="{{ url('/barang/'.$barang->id.'/edit') }}" class="btn btn-warning"><i class="fa fa-edit"></i> Ubah</a>
                                            <a href="{{ url('/barang/delete/'.$barang->id) }}" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
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

    {{-- Modal --}}
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Barang</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <!-- form start -->
                <form action="{{ route('barang.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                              <label for="KodeBarang">Kode Barang</label>
                              <input type="text" readonly class="form-control" id="tambahb-kode_barang" name="kode_barang" placeholder="Kode Barang" value="BR{{ $kode+1 }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                              <label for="Nama">Nama</label>
                              <input type="text" class="form-control" id="tambahb-nama" name="nama" placeholder="Nama">
                            </div>
                        </div>
                        <div class="col-sm-6">
                          <!-- select -->
                          <div class="form-group">
                            <label>Kategori</label>
                            <select class="form-control" name="kategori">
                                <option value=""> - Pilih Kategori - </option>
                                @foreach ($kategori as $kategori)
                                    <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                                @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                              <label for="Keterangan">Keterangan</label>
                              <input type="text" class="form-control" id="tambahb-keterangan" name="keterangan" placeholder="Keterangan">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                              <label for="Stok">Stok</label>
                              <input type="text" class="form-control" id="tambahb-stok" name="stok" placeholder="Stok">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                              <label for="Harga">Harga</label>
                              <input type="text" class="form-control" id="tambahb-harga" name="harga" placeholder="Harga">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                              <label for="customFile">Gambar</label>

                              <div class="custom-file">
                                <input type="file" class="custom-file-input" id="tambahb-customFile" name="file">
                                <label class="custom-file-label" for="customFile"></label>
                              </div>
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
