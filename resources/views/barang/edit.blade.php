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
                    <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item">Barang</li>
                    <li class="breadcrumb-item active">Ubah</li>
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
                        <!-- general form elements -->
                        <div class="card card-warning">
                          <div class="card-header">
                            <h3 class="card-title"><b>Ubah Barang</h3>
                          </div><!-- /.card-header -->

                            <form action="{{ url('/barang/'.$barang->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row m-2">
                                    <div class="col-md-6">
                                        <img src="{{ asset('foto/barang/'.$barang->gambar) }}" height="200" alt="">
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="customFile">Gambar</label>

                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="tambahb-customFile" name="file">
                                                <label class="custom-file-label" for="customFile">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                        <label for="KodeBarang">Kode Barang</label>
                                        <input type="text" disabled class="form-control" id="kode_barang" name="kode_barang" value="{{ $barang->kode_barang }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                        <label for="Nama">Nama</label>
                                        <input type="text" class="form-control" id="nama" name="nama" value="{{ $barang->nama_barang }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                    <!-- select -->
                                    <div class="form-group">
                                        <label>Kategori</label>
                                        <select class="form-control" name="kategori">
                                            @foreach ($kategori as $kategori)
                                                @if ($kategori->id == $barang->id_kategori)
                                                    <option value="{{ $barang->id }}">{{ $kategori->nama }}</option>
                                                @else
                                                    <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                        <label for="Keterangan">Keterangan</label>
                                        <input type="text" class="form-control" id="keterangan" name="keterangan" value="{{ $barang->deskripsi }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-right">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
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
@endsection
