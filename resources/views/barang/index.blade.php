@extends('layouts.index')

@section('title')
Barang
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
              @include('flash-message')
                <div class="row">
                    <div class="col-12">
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
                            <a class="btn btn-app btn-sm bg-primary" data-toggle="modal" data-target="#modal-default">
                                <i class="fas fa-plus"></i> Tambah Barang
                            </a>
                          </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
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
                                    @forelse ($barang as $nbarang)
                                    <tr>
                                        <td><img src="{{ asset('foto/barang/'.$nbarang->gambar) }}" height="75" alt=""></td>
                                        <td>{{ $nbarang->kode_barang }}</td>
                                        <td>{{ $nbarang->nama_barang }}</td>
                                        <td>{{ $nbarang->kategori->nama }}</td>
                                        <td>{{ $nbarang->deskripsi }}</td>
                                        <td>
                                            <a href="{{ url('/barang/'.$nbarang->id.'/edit') }}" class="btn btn-warning"><i class="fa fa-edit"></i> Ubah</a>
                                            <a href="{{ url('/barang/delete/'.$nbarang->id) }}" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
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
